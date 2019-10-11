<template>
    <div class="fixed-sidebar fixed-sidebar-responsive">

        <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
            <a href="#" class="logo js-sidebar-open">
                <img :src="`assets/img/eureka/eureka-logo.png`" alt="Eureka">
            </a>

        </div>

        <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
            <a href="#" class="logo">
                <div class="img-wrap">
                    <img :src="`assets/img/eureka/eureka-logo.png`" alt="Eureka">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">eureka</h6>
                </div>
            </a>

            <div class="mCustomScrollbar" data-mcs-theme="dark">

                <div class="control-block">
                    <div class="author-page author vcard inline-items">
                        <div class="author-thumb">
                            <img :alt="userName" :src="userImage" class="avatar">
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

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">MAIN SECTIONS</h6>
                </div>

                <ul class="left-menu">
                    <li>
                        <a href="#" class="js-sidebar-open">
                            <svg class="olymp-close-icon left-menu-icon">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-close-icon`"></use>
                            </svg>
                            <span class="left-menu-title">Collapse Menu</span>
                        </a>
                    </li>
                    <li>
                        <router-link  to="/" class="nav-link">
                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="NEWSFEED">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-newsfeed-icon`"></use>
                            </svg>
                            <span class="left-menu-title">Newsfeed</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/home" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="CHALLENGES">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-calendar-icon`"></use>
                            </svg>
                            <span class="left-menu-title">Challenges</span>
                        </router-link>

                    </li>
                    <li>
                        <router-link  to="/contributors" class="nav-link">


                            <svg version="1.1" class="left-menu-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" data-toggle="tooltip" data-placement="right"   data-original-title="Contributors">
						<g>
							<path d="M22.25,20.47c-0.54-0.39-1.83-0.85-4.67-1.79l-0.45-0.15c-0.48-0.16-0.9-0.3-1.04-0.36c-0.04-0.02-0.1-0.04-0.11-0.05
								c0,0-0.02-0.04-0.01-0.14c0.06-0.14,0.36-0.6,0.56-0.89c0.79-1.19,1.99-2.98,1.99-4.98c0-3.99-2.8-7.24-6.24-7.24
								c-3.44,0-6.24,3.25-6.24,7.24c0,1.98,1.18,3.76,2,4.99c0.19,0.28,0.5,0.74,0.54,0.83c0.02,0.15,0.01,0.19,0.01,0.19
								c-0.01,0.01-0.07,0.04-0.12,0.06C8.33,18.23,8,18.34,7.6,18.47l-0.63,0.21c-2.85,0.94-4.13,1.4-4.67,1.79
								c-1.77,1.28-2.17,5.75-2.25,7.61c-0.01,0.35,0.11,0.68,0.35,0.94c0.24,0.26,0.56,0.41,0.95,0.42c0.7,0,1.27-0.55,1.31-1.25
								c0.09-2.16,0.65-5.23,1.15-5.59c0.13-0.08,0.78-0.4,3.98-1.43l0.34-0.12c0.68-0.23,1.09-0.36,1.31-0.45
								c1.31-0.54,1.93-1.67,1.7-3.11c-0.09-0.6-0.49-1.18-0.94-1.85c-0.62-0.92-1.56-2.3-1.56-3.53c0-2.5,1.66-4.62,3.63-4.62
								s3.63,2.11,3.63,4.62c0,1.21-0.9,2.55-1.56,3.54c-0.49,0.74-0.85,1.27-0.94,1.84c-0.22,1.43,0.4,2.57,1.71,3.11
								c0.28,0.11,0.83,0.3,1.65,0.56c0.88,0.29,3.57,1.17,3.96,1.43c0.56,0.4,1.09,3.63,1.17,5.61c0.02,0.7,0.6,1.25,1.36,1.25
								c0.35-0.01,0.67-0.16,0.91-0.42c0.24-0.26,0.36-0.59,0.34-0.93c0-0.02-0.05-2.2-0.3-3.58C23.82,22.47,23.18,21.14,22.25,20.47z"/>
                            <path d="M31.65,22.2L31.65,22.2c-0.39-2.06-1.02-3.38-1.94-4.05c-0.54-0.39-1.77-0.82-4.67-1.79l-0.44-0.14
								c-0.47-0.16-0.91-0.3-1.06-0.36c-0.04-0.02-0.1-0.04-0.11-0.04c0,0-0.02-0.04-0.01-0.15c0.06-0.14,0.37-0.6,0.56-0.89
								c0.79-1.19,1.99-2.98,1.99-4.98c0-3.99-2.8-7.24-6.24-7.24c-1.06,0-2.1,0.32-3.04,0.92c-0.61,0.42-0.78,1.22-0.39,1.83
								c0.38,0.57,1.12,0.78,1.81,0.39c0.52-0.33,1.06-0.5,1.61-0.5c1.97,0,3.63,2.11,3.63,4.62c0,1.2-0.9,2.54-1.56,3.54
								c-0.5,0.74-0.85,1.27-0.94,1.84c-0.22,1.43,0.4,2.57,1.71,3.11c0.28,0.11,0.83,0.3,1.65,0.56c0.88,0.29,3.57,1.17,3.96,1.43
								c0.56,0.4,1.09,3.63,1.17,5.61c0.02,0.7,0.6,1.25,1.36,1.25c0.35-0.01,0.67-0.16,0.91-0.42c0.24-0.26,0.36-0.59,0.34-0.93
								C31.95,25.76,31.9,23.58,31.65,22.2z"/>
						</g>
						</svg>
                            <span class="left-menu-title">Contributors</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/approach" class="nav-link">


                            <svg version="1.1" class="left-menu-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" data-toggle="tooltip" data-placement="right"   data-original-title="EUREKA Approach">
						<g>
							<path class="st0" d="M14.23,10.56c0.06,0.11,0.11,0.23,0.17,0.31c0.06,0.09,0.14,0.17,0.2,0.26c0.09,0.09,0.17,0.17,0.29,0.26
								c0.09,0.06,0.2,0.14,0.34,0.17c0.11,0.06,0.23,0.09,0.37,0.11c0.14,0.03,0.26,0.03,0.37,0.03c0.11,0,0.26,0,0.37-0.03
								c0.11-0.03,0.23-0.06,0.31-0.11h0.03c0.11-0.06,0.23-0.11,0.34-0.2c0.09-0.06,0.17-0.14,0.26-0.23l0.03-0.03
								c0.09-0.09,0.14-0.17,0.2-0.26c0.06-0.09,0.11-0.17,0.14-0.29c0-0.03,0-0.03,0.03-0.06c0.06-0.11,0.09-0.26,0.11-0.37
								c0.03-0.11,0.03-0.26,0.03-0.37s0-0.26-0.03-0.37c-0.03-0.11-0.06-0.23-0.11-0.37c-0.09-0.2-0.2-0.37-0.34-0.51
								c-0.03-0.03-0.03-0.03-0.06-0.06C17.2,8.36,17.12,8.3,17,8.22c-0.11-0.06-0.2-0.11-0.31-0.17s-0.23-0.09-0.34-0.11
								C16.2,7.9,16.09,7.9,15.97,7.9c-0.11,0-0.26,0-0.37,0.03c-0.11,0.03-0.23,0.06-0.34,0.11h-0.03C15.11,8.1,15,8.16,14.91,8.22
								c-0.11,0.09-0.2,0.14-0.29,0.23c-0.09,0.09-0.17,0.17-0.23,0.26c-0.06,0.09-0.11,0.2-0.17,0.31c-0.06,0.11-0.09,0.23-0.11,0.34
								c-0.03,0.14-0.03,0.26-0.03,0.37c0,0.11,0,0.26,0.03,0.37C14.14,10.34,14.2,10.45,14.23,10.56z"/>
                            <path class="st0" d="M18.2,21.04h-0.66v-7.01c0-0.4-0.31-0.74-0.74-0.74h-3c-0.4,0-0.74,0.31-0.74,0.74v1.54
								c0,0.4,0.31,0.74,0.74,0.74h0.6v4.75h-0.6c-0.4,0-0.74,0.31-0.74,0.74v1.54c0,0.4,0.31,0.74,0.74,0.74h4.41
								c0.4,0,0.74-0.31,0.74-0.74V21.8C18.95,21.38,18.6,21.04,18.2,21.04z"/>
                            <path class="st0" d="M16,0.1C7.23,0.1,0.1,7.23,0.1,16c0,8.77,7.13,15.9,15.9,15.9c8.77,0,15.9-7.13,15.9-15.9
								C31.9,7.23,24.77,0.1,16,0.1z M16,29.34C8.64,29.34,2.66,23.36,2.66,16S8.64,2.66,16,2.66S29.34,8.64,29.34,16
								S23.36,29.34,16,29.34z"/>
						</g>
						</svg>
                            <span class="left-menu-title">Eureka Approach</span>
                        </router-link>
                    </li>

                </ul>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">YOUR ACCOUNT</h6>
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
</template>

<script>
    export default {
        name: "LeftSideBarFixed",
        data() {
            return {
                baseUrl: '',
                userLogin: false,
                userId: '',
                userSlug: '',
                userImage: '',
                userName: '',
                userLevel: '',
                name:'',
            }
        },
        methods:{

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
                        this.$store.dispatch('destroyAccess');
                        if (response.data.success == 1)
                            this.$router.push('/');
                        this.$router.go();
                    });
                // console.log('logout ended');
            },

        },
        created() {
            console.log(this.$store.getters.getName,'usernamehere');
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.userSlug = this.$store.getters.getUserSlug;
            this.userImage = this.$store.getters.getUserImage;
            this.userName = this.$store.getters.getUserName;
            this.userLevel = this.$store.getters.getUserLevel;
            this.name = this.$store.getters.getName;
            this.userCampaign = this.$store.getters.getUserCampaign;
        }
    }
</script>

<style scoped>
    .author-thumb img {
        width: 35px !important;
    }
</style>
