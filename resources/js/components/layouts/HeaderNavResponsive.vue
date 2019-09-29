<template>
    <header class="header header-responsive" id="site-header-responsive">

        <div class="header-content-wrapper">
            <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
                <Notifications :notifications="notifications"/>

            </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content tab-content-responsive">

            <div class="tab-pane " id="request" role="tabpanel">



            </div>





            <div class="tab-pane " id="search" role="tabpanel">


                <form class="search-bar w-search notification-list friend-requests">
                    <div class="form-group with-button">
                        <input class="form-control js-user-search" placeholder="Search here people or pages..."
                               type="text">
                    </div>
                </form>


            </div>

        </div>
        <!-- ... end  Tab panes -->

    </header>
</template>

<script>
    import Notifications from '../pages/sub-components/Notifications';
    export default {
        name: "HeaderNavResponsive",
        components: {
            Notifications,

        },
        data() {
            return {
                baseUrl: '',
                userLogin: false,
                userId: '',
                userSlug: '',
                userImage: '',
                userName: '',
                userLevel: '',
                notifications: [],
            }
        },
        methods: {
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
        created() {
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.userSlug = this.$store.getters.getUserSlug;
            this.userImage = this.$store.getters.getUserImage;
            this.userName = this.$store.getters.getUserName;
            this.userLevel = this.$store.getters.getUserLevel;
            this.userCampaign = this.$store.getters.getUserCampaign;
            this.getNotifications();
        }
    }
</script>

<style scoped>

</style>
