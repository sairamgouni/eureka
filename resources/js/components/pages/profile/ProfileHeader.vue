<template>
	<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img  class="top-header-thumb" :src="user.background_image" :alt="user.name" style="height: 400px">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">

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

						<div class="control-block-button">
                            		<span class="notification-icon"  @click="toggleFollow(user.id)" v-if=" $store.state.userId !== user.id">
							<a href="javascript:void(0);" class="accept-request" :class="{ follow: (user.is_following==0) ? true : false, unfollow: (user.is_following==1) ? true : false,  }">
								<span class="icon-add without-text" >
									<svg class="olymp-happy-face-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>


							<div class="btn btn-control bg-primary more"  v-if="isSameUser">
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
            toggleFollow(userId) {
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });
                // console.log('index '+index);
                var bodyFormData = new FormData();
                bodyFormData.set('item_id', userId);
                this.axios({
                    method: 'post',
                    url: 'friends/toggle-follow',
                    data: bodyFormData
                })
                    .then((response) => {
                        loader.hide();
                        let like_value = response.data;
                        if(this.user.id==userId)
                        {
                            if(like_value==1)
                            {
                                this.user.is_following = 1;
                                this.$toast.open({
                                    message: 'Following Updated',
                                    type: 'success'
                                });
                            }
                            else
                            {
                                this.user.is_following = 0;
                                this.$toast.open({
                                    message: 'Unfollowing Updated',
                                    type: 'success'
                                });
                            }
                        }
                    })
                    .catch(function(response) {
                        console.log('in response methods');
                        console.log(response);
                      loader.hide();
                    });
            },
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
<style scoped>
    .unfollow{ background-color: #9ca0a3; }
    .follow{ background-color: #38a9ff; }
</style>