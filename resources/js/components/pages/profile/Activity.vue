<template>
<span>

<ProfileHeader :CurrentUser="user" :isUserLoggedIn="userLogin" :isSameUser="isSameUser"  />

<div class="container">
	<div class="row">

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
			<ul class="widget w-activity-feed notification-list">
					<li v-for="(item, index) in activities" :key="item.id">
						<div class="author-thumb">
							<img :src="item.image" :alt="item.username">
						</div>
						<div class="notification-event">
							  <router-link
                                  :to="{ name: 'ProfileEuraka', params: { id: item.user_id, slug: item.user_slug } }"
                                  class="h6 notification-friend">
						 							{{item.username}}
							</router-link>
                            <div v-html="item.message">

                            </div>

							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">{{item.created_at}}</time></span>

						</div>
					</li>



				</ul>
            </div>
		</div>

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
            <div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Profile Intro</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Personal-Info -->

					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">About Me:</span>
							<span class="text">{{user.userAbout}}</span>
						</li>

					</ul>


				</div>
			</div>

		</div>

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">


			<UserFriends totalItems="4" :CurrentUser="user" :isUserLoggedIn="userLogin" :isSameUser="isSameUser":currentProfileId="currentProfileId"/>

		</div>

	</div>
</div>


</span>
</template>

<script>
    import ProfileHeader from './ProfileHeader';
    import UserBadges from './UserBadges';
    import UserFriends from './UserFriends';
    //import LastPhotos from './LastPhotos';
    import ActivityItem from '../sub-components/ActivityItem';
    export default {
        name: 'ProfileEuraka',
        components: {
            ProfileHeader,
            ActivityItem,
            UserBadges,
            UserFriends,

        },
        data() {
            return {
                baseUrl: '',
                userLogin: false,
                user:{

                    userId:'',
                    userSlug:'',
                    userImage:'',
                    userName:'',
                    userBackgroundImage:'',
                    userAbout:'',
                    userLocation:'',
                },
                currentProfileId:'',
                isSameUser:false,
                activities:[],
            }
        },
        methods: {
            getUserDetails(userId) {
                var bodyFormData = new FormData();
                bodyFormData.set('userId', userId);
                this.axios({
                    method: 'get',
                    url: 'user/get-profile/'+currentProfileId,
                    data: bodyFormData
                })
                    .then((response) => {
                        if(response.status==200)
                        {
                            console.log('sai',response)
                            this.user.userId = response.data.id;
                            this.user.userSlug = response.data.slug;
                            this.user.userImage = response.data.image;
                            this.user.userName = response.data.name;
                            this.user.userAbout = response.data.about;
                            this.user.userLocation = response.data.location;
                            this.user.userBackgroundImage = response.data.background_image;
                        }
                    })
                    .catch(function(response) {
                        console.log('in profile exception');
                        // console.log(response);
                        // loader.hide();
                    });
            },
            loadActivities() {
                var bodyFormData = new FormData();
                // bodyFormData.set('challent_id', this.comment_type_id);
                this.axios({
                    method: 'get',
                    url: APP.baseUrl + '/activities/get-list/'+this.userId,
                    data: bodyFormData
                })
                    .then((response) => {

                        console.log(response.data.success);
                        console.log(response,'sai');

                        if (response.status==200) {

                            this.activities = response.data;
                            console.log('comments..');
                            console.log(this.activities);

                        } else {

                        }
                    })
                    .catch(function(response) {

                    });
            }
        },
        created(){
            this.currentProfileId = this.$route.params.id;
            this.userId = this.$store.getters.getUserId;

            if(this.userId == this.currentProfileId)
            {
                this.isSameUser = true;
                this.user.userId = this.$store.getters.getUserId;
                this.user.userSlug = this.$store.getters.getUserSlug;
                this.user.userImage = this.$store.getters.getUserImage;
                this.user.userName = this.$store.getters.getUserName;
                this.user.userImage = this.$store.getters.getUserImage;
                this.user.userAbout = this.$store.getters.getUserAbout;
                this.user.userBackgroundImage = this.$store.getters.getUserBackgroundImage;
            }
            else {
                this.getUserDetails(this.currentProfileId);
            }
            this.loadActivities();
        }
    }
</script>
<style>
    .top-header-author {
        max-width: 500px!important;
    }
</style>
