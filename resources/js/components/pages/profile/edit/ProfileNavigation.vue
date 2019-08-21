<template>
				<div class="ui-block">

				<!-- Your Profile  -->
				
				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Your PROFILE</h6>
					</div>
				
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Profile Settings
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>
				
							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										<router-link to="/edit-profile" class="nav-link">
											Personal Information
										</router-link>
									</li>
									
									<li>
										<router-link to="/change-password" class="nav-link">
											Change Password
										</router-link>
									</li>
								</ul>
							</div>
						</div>
					</div>
				
					<div class="ui-block-title">
						<router-link to="/notifications" class="h6 title">
							Notifications
						</router-link>
						<a href="javascript:void(0);" class="items-round-little bg-primary">8</a>
					</div>
					  
					<div class="ui-block-title">
						<router-link to="/" class="h6 title">
							Create Challange
						</router-link>
					</div>
				</div>
				
				<!-- ... end Your Profile  -->

			</div>
</template>
<script>
	export default {
		name : 'ProfileNavigation'
	}
</script>