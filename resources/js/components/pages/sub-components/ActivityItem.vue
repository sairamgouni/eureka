<template>
    <div id="newsfeed-items-grid">
        <div class="ui-block" v-for="(item, index) in challenges" :key="index">

            <article class="hentry post has-post-thumbnail thumb-full-width">

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

                    <div class="more" v-if="item.user.id == userId"><svg class="olymp-three-dots-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        <ul class="more-dropdown">
                            <li>
                                <a href="javascript:;" @click="postChallengeedit(item.id)">Edit Post</a>
                            </li>
                            <li v-if="item.comments == 0">
                                <a href="javascript:;" @click="deleteChallenge(item.id)" >Delete Post</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <a href="javascript:;" @click="challengedetail(item)" class="h4 title">
                    {{item.title}}
                </a>
                <p  v-if="item.active_to < item.today">

                    Expired on: <a href="javascript:;" style="color:#000000;">{{moment(item.active_to).format('DD MMMM YYYY')}}</a>
                </p>
                <p v-else>

                    Expiring on: <a href="javascript:;" style="color:#000000;">{{moment(item.active_to).format('DD MMMM YYYY')}} (+{{item.daysleft}})</a>

                </p>

                <p>
                    <read-more more-str="See more" :text="item.description" less-str="See less" :max-chars="300"></read-more>
                </p>

                <div class="post-thumb">
                    <img :src="item.image" :alt="item.title">
                </div>

                <div class="post-additional-info inline-items">



                    <a href="javascript:void(0);" @click="updateLike(item.id)"
                       class="post-add-icon inline-items"
                       v-bind:class="{ active: (item.isUserLiked==1)? true : false }"
                    >
                        <svg class="olymp-heart-icon"><use
                            xlink:href="assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                        <span>{{item.likes}}</span>
                    </a>

                    <div class="comments-shared">
                        <a
                            href="javascript:;"
                            @click="challengemessage(item)"
                            class="post-add-icon inline-items">
                            <svg class="olymp-speech-balloon-icon">
                                <use
                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                            <span>{{item.comments}}</span>
                        </a>


                    </div>


                </div>


                <div class="control-block-button post-control-button">

                    <a href="javascript:void(0);" class="btn btn-control"
                       @click="updateLike(item.id)"
                       v-bind:class="{ active_bg: (item.isUserLiked==1)? true : false }">
                        <svg class="olymp-like-post-icon"><use
                            xlink:href="assets/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                    </a>

                    <a
                        href="javascript:;"
                        @click="challengemessage(item)"
                        class="btn btn-control">
                        <svg class="olymp-comments-post-icon">
                            <use
                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>

                    </a>

                </div>
            </article>
        </div>

        <!--        <infinite-loading @infinite="infiniteHandler"></infinite-loading>-->
<challenge-edit-form ref="challengeedit" v-on:output="output" :actionObject="actionObject"></challenge-edit-form>
    </div>
</template>

<script>
    import ChallengeEditForm from '../challenges/ChallengeEditForm';
    export default {

        name: 'ActivityItem',
        props: ['CurrentUser', 'isUserLoggedIn',
            'isSameUser', 'loadCurrentUserActivity',
            'profileIdToLoad', 'specificUserRecords'],
        data() {
            return {
                userLogin: USER ? true : false,
                userId: this.$store.state.userId,
                userSlug:this.$store.state.slug,
                userName: this.$store.state.username ,
                userImage: this.$store.state.image,
                userBackgroundImage: this.$store.state.background_image,
                challenges: [],
                page: 1,
                type: 'all',
                recordsUserId: '',
                sort_by: 'desc',
                hasMore: false,
                infinite: false,

                actionObject: {
                    id: null
                },
            }
        },
        components:{
            ChallengeEditForm
        },
        created() {
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
            moment(date) {
                return moment(date);
            },
            deleteChallenge(itemid) {
                this.$swal({
                    title: "<h5>Are you sure you want to delete this Challenge?</h5>",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.value) {
                            this.axios.post('challenges/delete/' + itemid).then((response) => {
                                if (response.status == '200') {
                                    this.$parent.$refs.activityItem.loadPosts();
                                    loader.hide();
                                    this.$toast.open({
                                        message: 'challenge deleted successfully',
                                        type: 'info'
                                    });
                                } else {
                                    loader.hide();
                                }
                            }).catch((error) => {

                            })
                    }
                });

            },
            postChallengeedit(itemid) {
                this.actionObject.id = itemid;
                this.$refs.challengeedit.showModal();
            },
            output(massege) {
                this.loadPosts();
            },
            challengedetail(item) {
                this.$store.commit('setIsPost', 'yes' );
                this.$router.push({name: 'ChallengeDetails', params: { id: item.id, slug: item.slug }});
            },
            challengemessage(item) {
                this.$store.commit('setIsPost', 'no' );
                this.$router.push({ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } });
            },
            loadPosts(page = '1') {
                console.log('loadposts');
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
        },
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
