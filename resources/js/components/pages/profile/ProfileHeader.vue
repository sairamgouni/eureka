<template>
	<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img  class="top-header-thumb" :src="user.background_image" :alt="user.name">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										   <router-link  to="/profile" class="nav-link">
											Timeline
                        					</router-link>
									</li>

									<li>
										<router-link

										 :to="{ name: 'Friends',
										 params: { id: user.id, slug: user.slug } }" >

										Friends
										</router-link>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button" v-if="isSameUser">
<!--                            		<span class="notification-icon"  @click="toggleFollow(item.id)" >-->
<!--							<a href="javascript:void(0);" class="accept-request" :class="{ follow: (item.is_following==0) ? true : false, unfollow: (item.is_following==1) ? true : false,  }">-->
<!--								<span class="icon-add without-text" >-->
<!--									<svg class="olymp-happy-face-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>-->
<!--								</span>-->
<!--							</a>-->
<!--						</span>-->


							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">

									<li>
										<router-link to="/change-password" class="nav-link">
										Change Password
										</router-link>
									</li>
									<li>
										<router-link to="/edit-profile" class="nav-link">
											Edit Personal Information
										</router-link>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="javascript:void(0);" class="author-thumb">
							<img class="user-thumb" :src="user.image" :alt="user.name">
						</a>
						<div class="author-content">
							<a href="#" class="h4 author-name">{{user.name}}</a>
							<div class="country">{{user.location}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->
</template>
<script>
	export default {
		name: 'ProfileHeader',
		props:['CurrentUser', 'isUserLoggedIn', 'isSameUser'],
			data() {
            return {
 				currentProfileId:'',
 				user:{},
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
                    	this.user = response.data;

                    })
                    .catch(function(response) {
                    	console.log('in profile header exception');
                    	// console.log(response);
                        // loader.hide();
                    });
			}

		},
		created(){
 			this.currentProfileId = this.$route.params.id;
 			this.getUserDetails(this.currentProfileId);
        }
	}
</script>


