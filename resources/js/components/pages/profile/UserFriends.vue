<template>
	
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Following ({{totalFollowings}})</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Faved-Page -->
					
					<ul class="widget w-faved-page js-zoom-gallery">
						<li v-for="(item, index) in firendsList">
							  <router-link  
                                        :to="{ name: 'ProfileEuraka', params: { id: item.id, slug: item.slug } }"
                                          class="h6 notification-friend">
								<img :src="item.image" :alt="item.name" class="avatar" :title="item.name">
							</router-link>
						</li>
						 
						<li class="all-users" v-if="remainingFriends>0">
							<a href="#">+{{remainingFriends}}</a>
						</li>
					</ul>
					
					<!-- .. end W-Faved-Page -->
				</div>
			</div>

</template>

<script>
	export default {
		name: 'UserFriends',
		  props: ['totalItems','CurrentUser', 'isUserLoggedIn', 'isSameUser'],
			data() {
            return {
                baseUrl: '',
                userLogin: false,
                userId:'',
                userSlug:'',
                userImage:'',
                userName:'',
                firendsList: [],
                totalFollowings:0,
                remainingFriends:0,
            }
		},
		methods: {
			loadUserFriends() {
				var bodyFormData = new FormData();
                 // bodyFormData.set('email', this.form.username);
                // bodyFormData.set('password', this.form.password);
                this.axios({
                        method: 'get',
                        url: this.baseUrl + 'friends/getFriendsList/'+this.totalItems+'?userId='+this.CurrentUser.userId,
                        data: bodyFormData
                    })
                    .then((response) => {
                    	if(response.status==200)
                    	{
                    		this.firendsList = response.data.list;
                    		this.totalFollowings = response.data.totalFollowings;
                    		this.remainingFriends = parseInt(this.totalFollowings) -  parseInt(this.firendsList.length);
                    		
                    		// console.log('remaining: '+this.remainingFriends);
                    	}
                        // console.log(response);
                       // this.$store.dispatch('destroyAccess');
                       // if(response.data.success==1)
                       //  this.$router.push('/login');
                    // console.log('yep boy');
                    });
			},
		},
		created(){
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.userSlug = this.$store.getters.getUserSlug;
            this.userImage = this.$store.getters.getUserImage;
            this.userName = this.$store.getters.getUserName;
            this.loadUserFriends();
        }
	}
</script>