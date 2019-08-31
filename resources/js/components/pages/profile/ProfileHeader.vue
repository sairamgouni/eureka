<template>
	<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img  class="bg-image" :src="CurrentUser.userBackgroundImage" :alt="CurrentUser.userName">
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
										<router-link  to="/friends" class="nav-link">
										My Challenges
										</router-link>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">

									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button" v-if="isSameUser">


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
							<img class="user-thumb" :src="CurrentUser.userImage" :alt="CurrentUser.userName">
						</a>
						<div class="author-content">
							<a href="#" class="h4 author-name">{{CurrentUser.userName}}</a>
							<div class="country">{{CurrentUser.userLocation}}</div>
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
 
            }
		},
		methods: {
 

		},
		created(){
 
            
        }
	}
</script>

 
