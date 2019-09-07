<template>
<span>

<ProfileHeader :CurrentUser="user" :isUserLoggedIn="userLogin" :isSameUser="isSameUser"  />

<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<ActivityItem 
				:CurrentUser="user" 
				:isUserLoggedIn="userLogin" 
				:isSameUser="isSameUser" 
				:loadCurrentUserActivity="true" 
				:profileIdToLoad="currentProfileId"
				:specificUserRecords="true"
			/>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
				</svg>
			</a>
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

			<ProfileIntro  :CurrentUser="user" :isUserLoggedIn="userLogin" :isSameUser="isSameUser"/>

			<!-- <UserBadges /> -->


		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">


			<UserFriends totalItems="4" :CurrentUser="user" :isUserLoggedIn="userLogin" :isSameUser="isSameUser"/>
	 		 

		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>


</span>
</template>

<script>
	import ProfileHeader from './ProfileHeader';
	import ProfileIntro from './ProfileIntro';
	import UserBadges from './UserBadges';
	import UserFriends from './UserFriends';
	//import LastPhotos from './LastPhotos';
	import ActivityItem from '../sub-components/ActivityItem';
	export default {
		name: 'ProfileEuraka',
		components: {
						ProfileHeader,
						ActivityItem,
						ProfileIntro,
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
            }
		},
		methods: {
			getUserDetails(userId) {
				 var bodyFormData = new FormData();
            	 bodyFormData.set('userId', userId);
            	 this.axios({
                        method: 'get',
                        url: 'user/get-profile/'+userId,
                        data: bodyFormData
                    })
                    .then((response) => {
                    	if(response.status==200)
 						{
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
	            this.user.userBackgroundImage = this.$store.getters.getUserBackgroundImage;	
			}
			else {
				this.getUserDetails(this.currentProfileId);
			}
        }
	}
</script>
