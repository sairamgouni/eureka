<template>
		<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions</h6>
					<!-- <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a> -->
				</div>

				
				
				<!-- W-Action -->
				
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items" v-for="(item,index) in list" :key="index">
						<div class="author-thumb">
							<img :src="item.image" :alt="item.name" class="avatar" :title="item.name">
						</div>
						<div class="notification-event">
						  <router-link  
                                        :to="{ name: 'ProfileEuraka', params: { id: item.id, slug: item.slug } }"
                                          class="h6 notification-friend">
                                          {{item.name}}
                                </router-link>
							<span class="chat-message-item">8 Friends in Common</span>
						</div>
						<span class="notification-icon"  @click="toggleFollow(item.id)" >
							<a href="javascript:void(0);" class="accept-request" :class="{ follow: (item.is_following==0) ? true : false, unfollow: (item.is_following==1) ? true : false,  }">
								<span class="icon-add without-text" >
									<svg class="olymp-happy-face-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>
					</li>
 
				
				</ul>
				
				<!-- ... end W-Action -->
			</div>

</template>

<script>
	export default {
		name: 'FriendSuggestions',
		data() {
			return {
				list:[],
				selectedId:'',
				userLogin:false,
			}
		},
		methods: {
			toggleFollow(itemId) {
				 // console.log('index '+index);
            	if(!this.userLogin)
            	{
            		 this.$toast.open({
                        message: 'Please login to like',
                        type: 'info'
                        });
            		 return;
            	}
            	 var bodyFormData = new FormData();
            	 bodyFormData.set('item_id', itemId);
            	 this.axios({
                        method: 'post',
                        url: 'friends/toggle-follow',
                        data: bodyFormData
                    })
                    .then((response) => {
                        // loader.hide();
                        let like_value = response.data;

                        console.log('liked: '+itemId);
                        for(let index = 0; index<this.list.length; index++)
                        {
                        	
                        	console.log('in loop with index: '+this.list[index].id);
                        	if(this.list[index].id==itemId)
                        	{
                        		
                        		if(like_value==1)
                        		{
                        			this.list[index].is_following = 1;
                        			 this.$toast.open({
						                                message: 'Following Updated',
						                                type: 'success'
						                            });
                        			break;
                        		}
                        		else
                        		{
                        			if(this.list[index].is_following==1)
                        			{
                        				this.list[index].is_following = 0;
                        				 this.$toast.open({
							                                message: 'UnFollowing Updated',
							                                type: 'success'
							                            });

                        			}
                        		}
                        	}
                        }
 
                    })
                    .catch(function(response) {
                    	console.log('in response methods');
                    	console.log(response);
                        // loader.hide();
                    });
			},
			getFriends() {
				let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });
                var bodyFormData = new FormData();

                this.axios({
                        method: 'get',
                        url: 'friends/getSuggestions/5',
                        data: bodyFormData
                    })
                    .then((response) => {
                        loader.hide();

                        if (response.status==200) {
                         	this.list = response.data;
                         	
                        } 
                        else if(response.status==401)
                        {
                        	console.log('in 401 response');
                        	  this.$store.dispatch('destroyAccess');
                        	    this.$toast.open({
                                message: 'Please login to continue',
                                type: 'success'
                            });
		                      this.$router.push('/login');
                        }
                        else {
                           console.log('inelse boy');
                        }
                    })
                    .catch(function(response) {
                        loader.hide();
                    });
			},
		},
		created() {
			this.userLogin = this.$store.getters.getLogin;
			this.userId = this.$store.getters.getUserId;
			this.getFriends();
		}
	}
</script>

<style scoped>
.unfollow{ background-color: #9ca0a3; }
.follow{ background-color: #38a9ff; }
</style>