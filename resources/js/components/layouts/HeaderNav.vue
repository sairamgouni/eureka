<template>
    <header class="header" id="site-header">

        <div class="page-title">
            <h6>{{$route.meta.title || 'Eureka'}}</h6>
        </div>

        <div class="header-content-wrapper">
            <form class="search-bar w-search notification-list friend-requests">
                <div class="form-group with-button">
                    <input class="form-control js-user-search" placeholder="Search People or Challenges"
                           type="text">
                </div>
            </form>


            <!--              <router-link   to="/post-challenge">-->
            <!--                    <a href="javascript:void(0);" class="btn btn-primary btn-md-1 mt-1">Post Challenge</a>-->
            <!--              </router-link>  -->

            <div class="control-block">

                <!--    <Events /> -->


                <Notifications :notifications="notifications"/>

                <div class="author-page author vcard inline-items more">
                    <div class="author-thumb">
                        <img :alt="userName" :src="userImage" class="avatar">
                        <div class="more-dropdown more-with-triangle">
                            <div class="mCustomScrollbar" data-mcs-theme="dark">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">Your Account</h6>
                                </div>

                                <ul class="account-settings">
                                    <li>
                                        <router-link to="/edit-profile" class="nav-link">

                                            <svg class="olymp-menu-icon">
                                                <use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                            </svg>

                                            <span>Profile Settings</span>
                                        </router-link>
                                    </li>
                                    <li>
                                    </li>
                                    <li @click="logout()">
                                        <a href="javascript:void(0);">
                                            <svg class="olymp-logout-icon">
                                                <use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                                            </svg>

                                            Log Out

                                        </a>
                                    </li>
                                </ul>


                            </div>

                        </div>
                    </div>
                    <router-link
                        :to="{ name: 'ProfileEuraka', params: { id: userId, slug: userSlug } }"
                        class="nav-link author-name fn">

                        <div class="author-title">
                           {{name.length > 8 ? name.substring(0,8)+'..' : name}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                        </div>
                        <span class="author-subtitle">{{ userCampaign.campaign}}</span>
                    </router-link>

                </div>

            </div>
        </div>

    </header>
</template>

<script>
    import Notifications from '../pages/sub-components/Notifications';
    import Events from '../pages/sub-components/Events';

    require('selectize');

    export default {
        name: "HeaderNav",
        components: {
            Notifications,
            Events,
        },
        data() {
            return {
                baseUrl: '',
                userLogin: false,
                userId: '',
                userSlug: '',
                userImage: '',
                userName: '',
                name:'',
                userLevel: '',
                notifications: [],
            }
        },
        methods: {
            logout() {

                // evt.preventDefault();

                var bodyFormData = new FormData();
                // bodyFormData.set('email', this.form.username);
                // bodyFormData.set('password', this.form.password);
                this.axios({
                    method: 'post',
                    url: 'portal/logout',
                    data: bodyFormData
                })
                    .then((response) => {
                        console.log('logout');
                        this.$store.dispatch('destroyAccess');
                        window.localStorage.removeItem('vuex');
                        window.localStorage.removeItem('user');
                        if (response.data.success == 1)
                            this.$router.push('/');
                        this.$router.go();
                    });
                // console.log('logout ended');
            },
            getNotifications() {
                let data = {'userId': this.userId};
                this.axios({
                    method: 'post',
                    url: 'user/top-notifications',
                    data: data
                })
                    .then((response) => {
                        // console.log('got notifications');
                        this.notifications = response.data.notifications;
                        // console.log(response);
                    });
            },
        },
        mounted() {
            var topUserSearch = $('.js-user-search');

            if (topUserSearch.length) {
                topUserSearch.selectize({
                    persist: false,
                    maxItems: null,
                    valueField: 'id',
                    labelField: 'name',
                    searchField: ['name'],
                    render: {
                        option: function (item, escape) {
                            return `<div class="inline-items">
                                ${(item.image ? '<div class="author-thumb"><img height="40px" width="40px" src="' + escape(item.image) + '" alt="avatar"></div>' : '')}
                                <div class="notification-event">
                                ${(item.name ? '<span class="h6 notification-friend"></a>' + escape(item.name) + '</span>' : '')}
                                </div>
                                </div>`;
                        },
                        item: function (item, escape) {
                            let label = item.name;
                            let userType = item.hasOwnProperty('search_type') ? 'challenge' : 'user';
                            return '<div  data-type="' + userType + '" data-slug="' + item.slug + '">' +
                                '<span class="label">' + escape(label) + '</span>' +
                                '</div>';
                        }
                    },
                    load: (query, callback) => {
                        if (!query.length) return callback();

                        let formData = {
                            q: query,
                            page_limit: 10,
                        };
                        this.$http.post(`/search-user`, formData).then((response) => {
                            callback(response.data);
                            this.busy = false;
                        }, (reason) => {
                            callback();
                            this.busy = false;
                        });
                    },
                    onItemAdd: (value, $item) => {
                        console.log(value, $item, $($item).data());
                        this.$nextTick(() => {
                            let selectize = topUserSearch[0].selectize;
                            selectize.close();
                            selectize.clear();
                            if ($($item).data('type') === 'user')
                                this.$router.push({path: '/search/' + value});
                            else
                                this.$router.push({path: `/challenge-details/${value}/${$($item).data('slug')}`});
                        });
                    }
                });
            }
        },
        created() {
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.userSlug = this.$store.getters.getUserSlug;
            this.userImage = this.$store.getters.getUserImage;
            this.userName = this.$store.getters.getUserName;
            this.name = this.$store.getters.getName;
            this.userLevel = this.$store.getters.getUserLevel;
            this.userCampaign = this.$store.getters.getUserCampaign;
            this.getNotifications();
        }

    }
</script>

<style>
    .search-bar .form-group.with-button input {
        outline: none;
    }
    .selectize-input input{
             width: 255px!important;
    }
    .control-block {
        margin-right: 31px!important;
    }
</style>
