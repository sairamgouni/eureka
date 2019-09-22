<template>
    <div id="newsfeed-items-grid">
        <!--        <div class="ui-block" v-for="(item, index) in challenges" :key="index">-->
        <!--			<span>-->
        <!--					<article class="hentry post video">-->

        <!--						<div class="post__author author vcard inline-items">-->
        <!--							<img :src="item.user.image" :alt="item.user.name">-->

        <!--							<div class="author-date">-->

        <!--								 <router-link-->
        <!--                                     :to="{ name: 'ProfileEuraka', params: { id: item.user.id, slug: item.user.slug } }"-->
        <!--                                     class="h6 post__author-name fn">-->


        <!--									{{item.user.name}}-->
        <!--								</router-link>-->

        <!--								<div class="post__date">-->
        <!--									<time class="published" datetime="2004-07-24T18:18">-->
        <!--										{{item.created_at}}-->
        <!--									</time>-->
        <!--								</div>-->
        <!--							</div>-->
        <!--							<br>-->
        <!--						</div>-->

        <!--						<div class="post-video">-->
        <!--							<div class="video-thumb">-->
        <!--								<img class="challenge-image" :src="item.image" :alt="item.title">-->

        <!--							</div>-->

        <!--							<div class="video-content">-->
        <!--								<router-link-->
        <!--                                    :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }"-->
        <!--                                    class="h4 title">-->
        <!--								{{item.title}}-->
        <!--							</router-link>-->
        <!--								<p>{{item.description}}-->
        <!--								</p>-->
        <!--                                &lt;!&ndash; <a href="#" class="link-site">YOUTUBE.COM</a> &ndash;&gt;-->
        <!--							</div>-->
        <!--						</div>-->

        <!--						<div class="post-additional-info inline-items">-->

        <!--							<a href="javascript:void(0);" @click="updateLike(item.id);"-->
        <!--                               class="post-add-icon inline-items"-->
        <!--                               v-bind:class="{ active: (item.isUserLiked==1)? true : false }"-->
        <!--                            >-->
        <!--								<svg class="olymp-heart-icon"><use-->
        <!--                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>-->
        <!--								<span>{{item.likes}}</span>-->
        <!--							</a>-->

        <!--							<div class="comments-shared">-->
        <!--								<a href="javascript:void(0);" class="post-add-icon inline-items">-->
        <!--									<svg class="olymp-speech-balloon-icon"><use-->
        <!--                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>-->
        <!--									<span>{{item.comments}}</span>-->
        <!--								</a>-->
        <!--							</div>-->
        <!--						</div>-->

        <!--						<div class="control-block-button post-control-button">-->

        <!--							<a href="javascript:void(0);" class="btn btn-control"-->
        <!--                               @click="updateLike(item.id);"-->
        <!--                               v-bind:class="{ active_bg: (item.isUserLiked==1)? true : false }">-->
        <!--								<svg class="olymp-like-post-icon"><use-->
        <!--                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>-->
        <!--							</a>-->

        <!--                            	<router-link-->
        <!--                                    :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }"-->
        <!--                                    class="btn btn-control">-->
        <!--                                    <svg class="olymp-comments-post-icon">-->
        <!--                                        <use-->
        <!--                                            xlink:href="assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>-->

        <!--							</router-link>-->
        <!--						</div>-->

        <!--					</article>-->
        <!--					</span>-->
        <!--        </div>-->


        <div class="ui-block" v-for="(item, index) in challenges" :key="index">

            <article class="hentry post has-post-thumbnail">

                <div class="post__author author vcard inline-items">
                    <img :src="item.user.image" :alt="item.user.name">

                    <div class="author-date">
                        <router-link
                            :to="{ name: 'ProfileEuraka', params: { id: item.user.id, slug: item.user.slug } }"
                            class="h6 post__author-name fn">


                            {{item.user.name}}
                        </router-link>
                        <div class="post__date">
                            <time class="published" datetime="2004-07-24T18:18">
                                {{item.created_at}}
                            </time>
                        </div>
                    </div>

                    <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        <ul class="more-dropdown">
                            <li>
                                <a href="#">Edit Post</a>
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
                <router-link :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }" class="h4 title">
                    {{item.title}}
                </router-link>
                <p>{{item.description}}
                </p>

                <div class="post-thumb">
                    <img :src="item.image" :alt="item.title">
                </div>

                <div class="post-additional-info inline-items">



                    <a href="javascript:void(0);" @click="updateLike(item.id);"
                       class="post-add-icon inline-items"
                       v-bind:class="{ active: (item.isUserLiked==1)? true : false }"
                    >
                        <svg class="olymp-heart-icon"><use
                            xlink:href="assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                        <span>{{item.likes}}</span>
                    </a>




                    <!--                    <div class="names-people-likes">-->
                    <!--                        <a href="#">Jimmy</a>, <a href="#">Andrea</a> and-->
                    <!--                        <br>47 more liked this-->
                    <!--                    </div>-->


                    <div class="comments-shared">
                        <a href="javascript:void(0);" class="post-add-icon inline-items">
                            <svg class="olymp-speech-balloon-icon"><use
                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                            <span>{{item.comments}}</span>
                        </a>
                    </div>


                </div>


                <div class="control-block-button post-control-button">

                    <a href="javascript:void(0);" class="btn btn-control"
                       @click="updateLike(item.id);"
                       v-bind:class="{ active_bg: (item.isUserLiked==1)? true : false }">
                        <svg class="olymp-like-post-icon"><use
                            xlink:href="assets/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                    </a>

                    <router-link
                        :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }"

                        class="btn btn-control">
                        <svg class="olymp-comments-post-icon">
                            <use
                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>

                    </router-link>

                </div>
            </article>
        </div>

        <!--        <infinite-loading @infinite="infiniteHandler"></infinite-loading>-->

    </div>
</template>

<script>
    export default {
        name: 'ActivityItem',
        props: ['CurrentUser', 'isUserLoggedIn',
            'isSameUser', 'loadCurrentUserActivity',
            'profileIdToLoad', 'specificUserRecords'],
        data() {
            return {
                userLogin: USER ? true : false,
                userId: USER ? USER.id : '',
                userSlug: USER ? USER.slug : '',
                userName: USER ? USER.username : '',
                userImage: USER ? USER.image : '',
                userBackgroundImage: USER ? USER.background_image : '',
                challenges: [],
                page: 1,
                type: 'all',
                recordsUserId: '',
                sort_by: 'desc',
                hasMore: false,
                infinite: false

            }
        },
        created() {
            // this.userLogin = this.$store.getters.getLogin;
            // this.userId = this.$store.getters.getUserId;

            this.$store.commit('setLogin', true);
            this.$store.commit('setUserId', this.userId);
            this.$store.commit('setUserName', this.username);
            // this.$store.commit('setUserImage', response.data.user.image);
            this.$store.commit('setUserEmail', USER ? USER.email : '');
            this.$store.commit('setUserSlug', this.userSlug);
            this.$store.commit('setUserNickname', USER ? USER.nickname : '');
            this.$store.commit('setUserAbout', USER ? USER.about : '');
            this.$store.commit('setUserLevel', USER ? USER.level : '');

            this.$store.commit('setUserImage', this.UserImage);
            this.$store.commit('setUserBackgroundImage', this.userBackgroundImage);
            //
            this.loadPosts();
        },
        mounted() {
            window.onscroll = (ev) => {

                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    if (this.hasMore && this.infinite) {
                        this.loadPosts(this.page);
                    }
                }
            };
        },
        beforeDestroy() {
            this.hasMore = false;
            $(window).off('scroll');
        },
        methods: {
            loadPosts(page = '1') {
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                this.recordsUserId = this.userId;
                this.type = 'all';

                if (this.isSameUser != undefined) {
                    this.recordsUserId = this.profileIdToLoad;
                }

                if (this.specificUserRecords != undefined) {
                    if (this.specificUserRecords)
                        this.type = 'specific';
                }

                if (!this.infinite && page != '1')
                    return false;

                this.infinite = false;


                this.axios.get(`${APP.baseUrl}/challenges/getlist?userId=${this.recordsUserId}&recordsType=${this.type}&sort_by=${this.sort_by}&page=${page}`)
                    .then((response) => {
                        loader.hide();

                        if (response.status == 200) {
                            if (response.data.current_page == 1) {
                                this.challenges = response.data.data;
                            } else {
                                this.challenges = [...this.challenges, ...response.data.data];
                            }
                            this.hasMore = response.data.has_more;
                            this.infinite = this.hasMore;
                            this.page = response.data.next_page;

                        } else if (response.status == 401) {
                            // console.log('in 401 response');
                            // this.$store.dispatch('destroyAccess');
                            this.$toast.open({
                                message: 'Please login to continue',
                                type: 'success'
                            });
                            this.$router.push('/login');
                        } else {
                            // console.log('inelse boy');
                        }
                    })
                    .catch(function (response) {
                        loader.hide();
                    });
            },
            infiniteHandler($state) {

                if (this.challenges.length == 0) {
                    // $state.loaded();
                    $state.complete();
                    return;
                }
                this.axios.get('challenges/getlist?userId=' + this.recordsUserId + '&type=' + this.type, {
                    params: {
                        page: this.page
                    },
                }).then((response) => {

                    if (response.status == 200) {
                        this.page += 1;
                        this.challenges.push(...new Set([...this.challenges, ...response.data.list]));

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
                bodyFormData.set('userId', this.userId);
                this.axios({
                    method: 'post',
                    url: 'challenges/toggle-like',
                    data: bodyFormData
                })
                    .then((response) => {
                        // loader.hide();
                        let like_value = response.data;

                        // console.log('liked: '+itemId);
                        for (let index = 0; index < this.challenges.length; index++) {

                            // console.log('in loop with index: '+this.challenges[index].id);
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
                        console.log('in ativityItemView Exception');
                        // console.log(response);
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

    .active_bg {
        background: #e91d24;
    }

    .challenge-image {
        width: 197px;
        height: 194px;
    }
</style>
