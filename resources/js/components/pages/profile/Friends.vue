<template>
<span>	
 
<ProfileHeader />

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title"
					style="cursor: pointer;" 
					:class="{active_title:showFollowers}"
					@click="updateList('followers')"
					>Followers ({{followers.length}})</div>
					<div 
					style="cursor: pointer;" 
					@click="updateList('followings')"
					class="h6 title" :class="{active_title:!showFollowers}">Followers ({{followings.length}})</div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<!-- <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a> -->
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Friends -->

<div class="container">
	<div class="row">
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12" v-for="(item, index) in list">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item" >
					<div class="friend-header-thumb">
						<img style="width: 293px; height: 112px;" 
						:src="item.background_image" 
						:alt="item.name">
					</div>
				
					<div class="friend-item-content">
				
<!-- 						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div> -->
						<div class="friend-avatar">
								 
							<div class="author-thumb">
								<img 
								 style="width: 100px; height: 100px;"
								:src="item.image" :alt="item.name">
							</div>
							<div class="author-content">
								<router-link  
                                    :to="{ 	name: 'ProfileEuraka', 
                                    		params: { id: item.id, slug: item.slug } }"
                                          class="h5 author-name">
								{{item.name}}
								</router-link>
								<div class="country">{{item.location}}</div>
							</div>
						
						</div>
				
						<div class="swiper-container" data-slide="fade">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="javascript:void(0);" class="friend-count-item">
											<div class="h6">{{item.following}}</div>
											<div class="title">Following</div>
										</a>
										<a href="javascript:void(0);" class="friend-count-item">
											<div class="h6">{{item.followers}}</div>
											<div class="title">Followers</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">{{item.challenges}}</div>
											<div class="title">Challenges</div>
										</a>
									</div>
<!-- 									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div> -->
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										{{item.about}}
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">{{item.member_from}}</div>
										<!-- <div class="h6">December 2014</div> -->
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
		 
 
	</div>
</div>

<!-- ... end Friends -->
 
 
</span>
</template>

<script>
	import ProfileHeader from './ProfileHeader';

	export default {
		name: 'ProfileEuraka',
		components: { 
						ProfileHeader,
					},
		data() {
			return {
				currentProfileId:'',
				followers:[],
				followings:[],
				showFollowers:true,
				list:[],
			}
		},
		methods: {
			loadRecords() {
 
			 this.axios({
                        method: 'get',
                        url: 'user/followers-list?userId='+this.currentProfileId,
                         
                    })
                    .then((response) => {
                        // loader.hide();
                        this.followers = response.data.followers;
                        this.followings = response.data.following;
                        this.list = this.followers;
                        console.log(this.followers);
                        console.log(this.followings);
                        
                    })
                    .catch(function(response) {
                        // loader.hide();
                    });
			},

			updateList(itemType) {
				if(itemType=='followers')
				{
					this.showFollowers = true;
					this.list = this.followers;
				}
				else {
					this.showFollowers = false;
					this.list = this.followings;	
				}
			},
		},
		created(){
			this.currentProfileId = this.$route.params.id;
			console.log('in friends list');
			this.loadRecords();
		},
	}
</script>

<style scoped>
.active_title{
	color:#e91d24;
}
</style>