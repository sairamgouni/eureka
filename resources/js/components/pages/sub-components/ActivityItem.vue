<template>
    <div id="newsfeed-items-grid">


        <div class="ui-block" v-for="(item, index) in challenges" :key="index"
        >



			<span>

					<article class="hentry post video">

						<div class="post__author author vcard inline-items">
							<img src="assets/img/avatar7-sm.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="#">{{item.user.name}}</a> shared a <a href="#">link</a>

								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										{{item.created_at}}
									</time>
								</div>
							</div>
							<br>
							<router-link :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }">
							<p><strong>{{item.title}}</strong></p>
							<p>{{item.description}}</p>
							</router-link>

							<div
                                class="more"><svg class="olymp-three-dots-icon"><use
                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Edit Post11</a>
									</li>
									<li>
										<a href="#">Delete Post</a>
									</li>
									<li>
										<a href="#">Turn Off Notifications</a>
									</li>
									<li>
										<a href="#">Select as Featured</a>
									</li>
								</ul>
							</div>

						</div>


						<div class="post-video">
							<div class="video-thumb">
								<img src="assets/img/video-youtube1.jpg" alt="photo">
								<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
									<svg class="olymp-play-icon"><use
                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
								</a>
							</div>

							<div class="video-content">
								<a href="#" class="h4 title">{{item.title}}</a>
								<p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt
									ut labore et dolore magna aliqua...
								</p>
								<a href="#" class="link-site">YOUTUBE.COM</a>
							</div>
						</div>

						<div class="post-additional-info inline-items">

							<a href="javascript:void(0);" @click="updateLike(item.id);"
                               class="post-add-icon inline-items"
                               v-bind:class="{ active: (item.isUserLiked==1)? true : false }">
								<svg class="olymp-heart-icon"><use
                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>{{item.likes}}</span>
							</a>



							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use
                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>

									<span>{{item.comments}}</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use
                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>

									<span>16</span>
								</a>
							</div>


						</div>

						<div class="control-block-button post-control-button" v-if="item.isAuthor==1">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use
                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use
                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use
                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>

					</article>
					</span>

        </div>

        <infinite-loading @infinite="infiniteHandler"></infinite-loading>

    </div>
</template>

<script>
    export default {
        name: 'ActivityItem',
        data() {
            return {
                userLogin: false,
                userId: '',
                challenges: [],
                page: 1,
            }
        },
        created() {
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.loadPosts();
        },
        methods: {
            loadPosts() {
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                var bodyFormData = new FormData();

                this.axios({
                    method: 'get',
                    url: 'challenges/getlist',
                    data: bodyFormData
                })
                    .then((response) => {
                        loader.hide();
                        console.log(response);
                        if (response.status == 200) {
                            this.challenges = response.data;
                            console.log('yep boy');
                            console.log(this.challenges);
                            console.log('goint boy...');
                        } else if (response.status == 401) {
                            console.log('in 401 response');
                            this.$store.dispatch('destroyAccess');
                            this.$toast.open({
                                message: 'Please login to continue',
                                type: 'success'
                            });
                            this.$router.push('/login');
                        } else {
                            console.log('inelse boy');
                        }
                    })
                    .catch(function (response) {
                        loader.hide();
                    });
            },
            infiniteHandler($state) {
                this.axios.get('challenges/getlist', {
                    params: {
                        page: this.page,
                    },
                }).then((response) => {
                    console.log('yyoooo');
                    console.log(response);
                    if (response.status == 200) {
                        this.page += 1;
                        this.challenges.push(...new Set([...this.challenges, ...response.data]));
                        // this.challenges = this.challenges.concat(response.data);
                        console.log('challenges pushed');
                        console.log(this.challenges);
                        console.log('challenges pushed Ended');


                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                });
            },

            updateLike(itemId) {
                // console.log('index '+index);
                if (!this.userLogin) {
                    this.$toast.open({
                        message: 'Please login to like',
                        type: 'info'
                    });
                    return;
                }
                var bodyFormData = new FormData();
                bodyFormData.set('item_id', itemId);
                this.axios({
                    method: 'post',
                    url: 'challenges/toggle-like',
                    data: bodyFormData
                })
                    .then((response) => {
                        // loader.hide();
                        let like_value = response.data;

                        console.log('liked: ' + itemId);
                        for (let index = 0; index < this.challenges.length; index++) {

                            console.log('in loop with index: ' + this.challenges[index].id);
                            if (this.challenges[index].id == itemId) {
                                console.log('like_value: ' + like_value);
                                if (like_value == 1) {
                                    this.challenges[index].likes += 1;
                                    this.challenges[index].isUserLiked = 1;
                                    break;
                                } else {
                                    if (this.challenges[index].likes > 0) {
                                        this.challenges[index].likes -= 1;
                                        this.challenges[index].isUserLiked = 0;

                                    }
                                }
                            }
                        }

                    })
                    .catch(function (response) {
                        console.log('in response methods');
                        console.log(response);
                        // loader.hide();
                    });
            },
        }

    }
</script>

<style scoped>
    .active {
        fill: #e91d24;
        color: #e91d24;
    }
</style>
