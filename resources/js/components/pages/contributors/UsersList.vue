<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ui-block responsive-flex">
                        <div class="ui-block-title">
                            <div class="inline-items" v-if="country">
                                <div class="ui-block-title__icon">
                                    <img :src="country.icon"/>
                                </div>
                                <div class="h6 title">{{country.title}}</div>
                            </div>
                            <form class="w-search">
                                <div class="form-group with-button">
                                    <input class="form-control" type="text" placeholder="Search name..." v-model="search">
                                    <button  @click.prevent="searchusers()">
                                        <svg class="olymp-magnifying-glass-icon">
                                            <use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container" ref="usersList">
            <div class="row">
                <div class="col col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

                    <div class="ui-block">


                        <!-- Forums Table -->

                        <table class="forums-table user-list-table">

                            <thead>

                            <tr>

                                <th class="user-name">
                                    Name
                                </th>

                                <!--                                <th class="badges-achieved">-->
                                <!--                                    Badges Achieved-->
                                <!--                                </th>-->

                                <th class="total-points">
                                    Total Points
                                </th>

                            </tr>

                            </thead>

                            <tbody v-if="users && users.length">
                            <tr v-for="(user,index) in users" :key="user.id">
                                <td class="user-name">
                                    <div class="forum-item">
                                        <span>{{index+1}}</span>
                                        <div class="forum-item__thumb">
                                            <img :src="user.image" :alt="user.name">
                                        </div>
                                        <div class="content">
                                            <router-link
                                                :to="{ name: 'ProfileEuraka', params: { id:user.id, slug:user.slug } }"
                                                class="h6 post__author-name fn">


                                                {{user.name}}
                                            </router-link>
                                            <p class="text">Digital Lab, Malaysia</p>
                                        </div>
                                    </div>
                                </td>
                                <!--                                <td class="badges-achieved">-->
                                <!--                                    <ul class="contributor-badges">-->
                                <!--                                        <li><img src="assets/img/badge3.png" alt="author"></li>-->
                                <!--                                        <li><img src="assets/img/badge2.png" alt="author"></li>-->
                                <!--                                        <li><img src="assets/img/badge11.png" alt="author"></li>-->
                                <!--                                    </ul>-->
                                <!--                                </td>-->
                                <td class="total-points">
                                    <a href="#" class="h6 count">{{user.reputation}}</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- ... end Forums Table -->
                    </div>


                    <!-- Pagination -->

                    <!--                    <nav aria-label="Page navigation">-->
                    <!--                        <ul class="pagination justify-content-center">-->
                    <!--                            <li class="page-item disabled">-->
                    <!--                                <a class="page-link" href="#" tabindex="-1">Previous</a>-->
                    <!--                            </li>-->
                    <!--                            <li class="page-item"><a class="page-link" href="#">1-->
                    <!--                                <div class="ripple-container">-->
                    <!--                                    <div class="ripple ripple-on ripple-out"-->
                    <!--                                         style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div>-->
                    <!--                                </div>-->
                    <!--                            </a></li>-->
                    <!--                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                    <!--                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                    <!--                            <li class="page-item"><a class="page-link" href="#">...</a></li>-->
                    <!--                            <li class="page-item"><a class="page-link" href="#">12</a></li>-->
                    <!--                            <li class="page-item">-->
                    <!--                                <a class="page-link" href="#">Next</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </nav>-->

                    <!-- ... end Pagination -->

                </div>

                <div class="col col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <!--                    <div class="ui-block">-->
                    <!--                        <div class="ui-block-title">-->
                    <!--                            <h6 class="title">Other Countries</h6>-->
                    <!--                        </div>-->
                    <!--                        <div class="ui-block-content">-->


                    <!--                            <ul class="widget w-featured-countries">-->
                    <!--                                <li>-->
                    <!--                                    <div class="featured-countries__icon">-->
                    <!--                                        <img src="assets/img/eureka/contributors/flag-sg.png"/>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="featured-countries__title">Singapore</div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="featured-countries__icon">-->
                    <!--                                        <img src="assets/img/eureka/contributors/flag-th.png"/>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="featured-countries__title">Thailand</div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="featured-countries__icon">-->
                    <!--                                        <img src="assets/img/eureka/contributors/flag-ph.png"/>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="featured-countries__title">Philippines</div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="featured-countries__icon">-->
                    <!--                                        <img src="assets/img/eureka/contributors/flag-hk.png"/>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="featured-countries__title">Hong Kong</div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="featured-countries__icon">-->
                    <!--                                        <img src="assets/img/eureka/contributors/flag-cn.png"/>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="featured-countries__title">China</div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="featured-countries__icon">-->
                    <!--                                        <img src="assets/img/eureka/contributors/flag-jp.png"/>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="featured-countries__title">Japan</div>-->
                    <!--                                </li>-->
                    <!--                                <li>-->
                    <!--                                    <div class="featured-countries__icon">-->
                    <!--                                        <img src="assets/img/eureka/contributors/flag-es.png"/>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="featured-countries__title">Spain</div>-->
                    <!--                                </li>-->
                    <!--                            </ul>-->


                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Recent Challenges</h6>
                        </div>
                        <div class="ui-block-content">


                            <!-- Widget Recent Topics -->

                            <ul class="widget w-featured-topics" v-for="(item, index) in posts" :key="index">
                                <li>
                                    <div class="content">
                                        <router-link :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }" class="h6 title">
                                            {{item.title}}
                                        </router-link>
                                        <time class="entry-date updated" datetime="2017-06-24T18:18"> {{item.created_at}}
                                        </time>
                                    </div>
                                </li>
                            </ul>

                            <!-- ... end Widget Recent Topics -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'UsersList',
        data() {
            return {
                users: [],
                country: null,
                hasMore: false,
                page: 1,
                counter: 1,
                posts:[],
            }
        },
        created() {
            this.getUsers();
            this.getChallenges();
        },
        mounted() {
            window.onscroll = (ev) => {
                if (this.hasMore && (window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    this.getUserAbout(this.page);
                }
            };
        },
        beforeDestroy() {
            this.hasMore = false;
            $(window).off('scroll');
        },

        methods: {
            getUsers(page = 1) {
                let loader = this.$loading.show({
                    container: this.$refs.usersList
                });
                this.axios.get(`${APP.baseUrl}/users-list/${this.$route.params.country_id}?page=${page}`)
                    .then((response) => {
                        loader.hide();
                        this.hasMore = !!response.data.users.next_page_url;
                        if (page === 1)
                            this.country = response.data.country;
                        this.users = page === 1 ? response.data.users.data : [...this.users, ...response.data.users.data];

                    })
                    .catch((error) => {
                        loader.hide();
                    });
            },
            searchusers(){
                fetch('/userssearch?q='+this.search)
                    .then(res => res.json())
                    .then(res =>{
                        this.challenges = res;
                        this.search ='';

                    })
                    .catch(err => {
                        console.log(err);
                    });

            },
            getChallenges() {

                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });
                var bodyFormData = new FormData();

                this.axios({
                    method: 'get',
                    url: '/posts',
                    data: bodyFormData
                })
                    .then((response) => {
                        loader.hide();

                        if (response.status==200) {
                            // console.log(response);
                            // alert(response);
                            this.posts = response.data.list;

                            console.log("sairam",this.posts);

                        }
                        else if(response.status==401)
                        {
                            console.log('in 401 response');
                            this.$store.dispatch('destroyAccess');
                            this.$toast.open({
                                message: 'Please login to continue',
                                type: 'success'
                            });
                            this.$router.push('/login');
                        }
                        else {
                            console.log('inelse boy');
                        }
                    })
                    .catch(function(response) {
                        loader.hide();
                    });
            },
        }
    }
</script>
