<template>
    <header class="header" id="site-header">

        <div class="page-title">
            <h6>{{$route.meta.title || 'Eureka'}}</h6>
        </div>

        <div class="header-content-wrapper">
            <form class="search-bar w-search notification-list friend-requests">
                <div class="form-group with-button">
                    <input class="form-control js-user-search" placeholder="Search here people or pages..."
                           type="text">
                    <button>
                        <svg class="olymp-magnifying-glass-icon">
                            <use
                                :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon`"></use>
                        </svg>
                    </button>
                </div>
            </form>

            <a href="#" class="link-find-friend">Find Friends</a>


            <router-link to="/post-challenge">
                <a href="javascript:void(0);" class="btn btn-primary btn-md-1 mt-1">Post Challenge</a>
            </router-link>

            <div class="control-block">

                <Events/>


                <Notifications/>

                <div class="author-page author vcard inline-items more">
                    <div class="author-thumb">
                        <img :alt="userName" :src="userImage" class="avatar">
                        <span class="icon-status online"></span>
                        <div class="more-dropdown more-with-triangle">
                            <div class="mCustomScrollbar" data-mcs-theme="dark">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">Your Account</h6>
                                </div>

                                <ul class="account-settings">
                                    <li>
                                        <router-link
                                            :to="{ name: 'ProfileEuraka', params: { id: userId, slug: userSlug } }"
                                            class="nav-link">


                                            <svg class="olymp-menu-icon">
                                                <use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                            </svg>

                                            <span>Profile Settings</span>
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="/create-challenge" class="nav-link">
                                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip"
                                                 data-placement="right" data-original-title="FAV PAGE">
                                                <use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                            </svg>

                                            <span>Create Challenge</span>
                                        </router-link>
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


                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">About Olympus</h6>
                                </div>

                                <ul>
                                    <li>
                                        <a href="#">
                                            <span>Terms and Conditions</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>FAQs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Careers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Contact</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </header>
</template>

<script>
    import Notifications from '../pages/sub-components/Notifications';
    import Events from '../pages/sub-components/Events';

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
                    url: this.baseUrl + 'portal/logout',
                    data: bodyFormData
                })
                    .then((response) => {
                        this.$store.dispatch('destroyAccess');
                        if (response.data.success == 1)
                            this.$router.push('/');
                        this.$router.go();
                    });
                // console.log('logout ended');
            }
        },
        created() {
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.userSlug = this.$store.getters.getUserSlug;
            this.userImage = this.$store.getters.getUserImage;
            this.userName = this.$store.getters.getUserName;
        }

    }
</script>

<style>
    .avatar {
        height: 36px;
        width: 36px;
    }
</style>
