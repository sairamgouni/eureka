<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex1200">
                    <div class="ui-block-title">

                        <div class="w-select">
                            <div class="title">Filter By:</div>
                            <fieldset class="form-group">
                                <select class="selectpicker form-control" ref="category" v-model="selectedCategory">
                                    <option value="all">All Categories</option>
                                    <option :value="category.code" v-for="category in categories" :key="category.code">
                                        {{category.name}}
                                    </option>
                                    <!--                                    <option value="NU">Favourite</option>-->
                                    <!--                                    <option value="NU">Likes</option>-->
                                </select>
                            </fieldset>
                        </div>

                        <div class="w-select">
                            <fieldset class="form-group">
                                <select class="selectpicker form-control" ref="sortBy" v-model="selectedDate">
                                    <option value="desc">Date (Descending)</option>
                                    <option value="asc">Date (Ascending)</option>
                                </select>
                            </fieldset>
                        </div>

                        <a href="javascript:void(0)" class="btn btn-primary btn-md-2 mt-1" @click="loadPosts">Filter</a>


                        <div class="form-group with-button">
                            <input class="form-control" type="text" placeholder="Search" v-model="challengesSearch">
                            <button @click.prevent="searchChallenges()">
                                <svg class="olymp-magnifying-glass-icon">
                                    <use
                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                </svg>
                            </button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row sorting-container" id="posts-grid-1" data-layout="masonry" v-if="challenges && challenges.length">
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 sorting-item" v-for="(item, index) in challenges">
                <div class="ui-block">
                    <article class="hentry blog-post blog-post-v1">

                        <div class="post-ribbon" v-if="item.winner == 1">
                            <span>Completed</span>
                        </div>
                        <div class="post-thumb">

                            <img style="width: 337.98px; height: 240.36px;" :src="item.resizeImage" :alt="item.title">

                            <div class="post-content">
                                <a href="javascript:;" class="post-category bg-primary" v-for="category in item.categories" style="margin-right: 5px;">{{ category.title }}</a>
                                <router-link
                                    :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }"
                                    class="h4 post-title">
                                    {{item.title.length > 25 ? item.title.substring(0,45)+'..' : item.title}}
                                    <!--                                                                                {{item.title}}-->
                                </router-link>

                                <div class="author-date">
                                    by
                                    <a class="h6 post__author-name fn" href="#">{{item.user.name}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            {{item.created_at}}
                                        </time>
                                    </div>
                                </div>
                                <div class="author-date">
                                    <div class="post__location">{{item.campaign}}, {{item.location}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="post-additional-info inline-items">

                            <div class="friends-harmonic-wrap">
                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="javascript:void(0);" @click="updateLike(item.id);"
                                           class="post-add-icon inline-items"
                                           v-bind:class="{ active: (item.isUserLiked==1)? true : false }"
                                        >
                                            <svg class="olymp-heart-icon">
                                                <use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                            </svg>

                                        </a>
                                    </li>

                                </ul>
                                <div class="names-people-likes">
                                    {{item.likes}}
                                </div>
                            </div>

                            <div class="comments-shared">
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-speech-balloon-icon">
                                        <use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                    </svg>
                                    <span>{{item.comments}}</span>
                                </a>
                            </div>

                        </div>

                    </article>

                    <!-- ... end Post -->
                </div>
            </div>
        </div>

    </div>
</div>
</template>

<script>
    export default {
        name: "Home",
        data() {
            return {
                userLogin: false,
                userId: '',
                userSlug: '',
                userName: '',
                userImage: '',
                userBackgroundImage: '',
                challenges: [],
                page: 1,
                type: 'all',
                recordsUserId: '',
                categories: [],
                sort_by: 'desc',
                hasMore: false,
                infinite: false,
                selectedCategory: 'all',
                selectedDate: 'desc',
            }
        },
        created() {
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.loadPosts();
            this.loadCategories();
        },
        mounted() {
            $('.selectpicker').selectpicker();

            window.onscroll = (ev) => {

                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    if (this.hasMore && this.infinite) {
                        this.loadPosts(this.page);
                    } else {
                        // $state.complete();
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
            searchChallenges() {
                fetch('/challenge/search?q='+this.challengesSearch)
                    .then(res => res.json())
                    .then(res =>{
                        this.challenges = res;
                        this.challengesSearch ='';

                    })
                    .catch(err => {
                        console.log(err);
                    });

            },
            loadCategories() {
                this.axios.get(`${APP.baseUrl}/categories/getlist`)
                    .then((response) => {
                        this.categories = response.data.object;
                        this.$nextTick(() => {
                            $('.selectpicker').selectpicker('refresh');
                        })
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            loadPosts(page = '1') {
                // if (!this.infinite && page != '1')
                //     return false;

               this.infinite = false;

                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                var bodyFormData = new FormData();

                this.type = $(this.$refs.category).val() || 'all';
                this.sort_by = $(this.$refs.sortBy).val() || 'desc';


                this.axios({
                    method: 'get',
                    url: APP.baseUrl + '/challenges/getlist?&type=' + this.type + '&sort_by=' + this.sort_by + '&page=' + page,
                    data: bodyFormData
                }).then((response) => {
                    loader.hide();
                    console.log(response);
                    if (response.status == 200) {
                        if (response.data.current_page == 1) {
                            this.challenges = response.data.data;
                        } else {
                            this.challenges = [...this.challenges, ...response.data.data];
                            // this.challenges.push(...new Set([...this.challenges, ...response.data.data]));
                        }
                        this.hasMore = response.data.has_more;
                        this.infinite = this.hasMore;
                        this.page = response.data.next_page;
                    }

                }).catch(function (response) {
                    loader.hide();
                });
            },
            infiniteHandler($state) {

                // if (this.hasMore) {
                //     $state.loaded();
                //     this.loadPosts(this.page);
                // } else {
                //     $state.complete();
                // }

                return;

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
    .blog-post .post__location {
        margin-left: 0px;
    }
</style>
