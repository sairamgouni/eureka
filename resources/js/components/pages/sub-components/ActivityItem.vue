<template>
				<div id="newsfeed-items-grid">



				<div class="ui-block" v-for="(item, index) in challenges" :key="index"
				>



			<span >

					<article class="hentry post video">

						<div class="post__author author vcard inline-items">
							<img :src="item.user.image" :alt="item.user.name">

							<div class="author-date">

								 <router-link
                                        :to="{ name: 'ProfileEuraka', params: { id: item.user.id, slug: item.user.slug } }"
                                          class="h6 post__author-name fn">


									{{item.user.name}}
								</router-link>

								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										{{item.created_at}}
									</time>
								</div>
							</div>
							<br>


						</div>


						<div class="post-video">
							<div class="video-thumb">
								<img class="challenge-image" :src="item.image" :alt="item.title">

							</div>

							<div class="video-content">
								<router-link :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }" class="h4 title">
								{{item.title}}
							</router-link>
								<p>{{item.description}}
								</p>
								<!-- <a href="#" class="link-site">YOUTUBE.COM</a> -->
							</div>
						</div>

						<div class="post-additional-info inline-items">

							<a href="javascript:void(0);" @click="updateLike(item.id);"
							class="post-add-icon inline-items"
							v-bind:class="{ active: (item.isUserLiked==1)? true : false }"
							>
								<svg class="olymp-heart-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>{{item.likes}}</span>
							</a>



							<div class="comments-shared">
								<a href="javascript:void(0);"

								class="post-add-icon inline-items"

								>
									<svg class="olymp-speech-balloon-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>

									<span>{{item.comments}}</span>
								</a>


							</div>


						</div>

						<div class="control-block-button post-control-button" >

							<a href="javascript:void(0);" class="btn btn-control"
							 @click="updateLike(item.id);"
							v-bind:class="{ active_bg: (item.isUserLiked==1)? true : false }"
							>
								<svg class="olymp-like-post-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

                            	<router-link :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }" class="btn btn-control">
															<svg class="olymp-comments-post-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>

							</router-link>




						</div>

					</article>
					</span>

				</div>

				   <infinite-loading @infinite="infiniteHandler"></infinite-loading>

			</div>
</template>

<script>
	export default {
		name: 'ActivityItem',
		 props: ['CurrentUser', 'isUserLoggedIn',
		 		'isSameUser', 'loadCurrentUserActivity',
		 		'profileIdToLoad', 'specificUserRecords'],
		data(){
			return {
				userLogin:false,
				userId:'',
				userSlug:'',
				userImage:'',
				userName:'',
				userImage:'',
				userBackgroundImage:'',
				challenges:[],
				 page: 1,
				 type:'all',
				 recordsUserId:'',

			}
		},
		created(){
			this.userLogin = this.$store.getters.getLogin;
			this.userId = this.$store.getters.getUserId;


			this.loadPosts();
		},
		methods : {
			loadPosts() {
					   let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                var bodyFormData = new FormData();
                this.recordsUserId = this.userId;
                this.type = 'all';

                if(this.isSameUser!=undefined)
                {
                	this.recordsUserId = this.profileIdToLoad;
                }

				if(this.specificUserRecords!=undefined)
                {
                	if(this.specificUserRecords)
                		this.type = 'specific';
                }

            	 this.axios({
                        method: 'get',
                        url: 'challenges/getlist?userId='+this.recordsUserId+'&recordsType='+this.type,
                        data: bodyFormData
                    })
                    .then((response) => {
                        loader.hide();
                         if (response.status==200) {
                         	this.challenges = response.data.list;

                         	    if(response.data.user && !this.userLogin)
                  				{

			                  	this.$store.commit('setLogin', true );
			                    this.$store.commit('setUserId', response.data.user.id );
			                    this.$store.commit('setUserName', response.data.user.name );
			                            // this.$store.commit('setUserImage', response.data.user.image);
			                    this.$store.commit('setUserEmail', response.data.user.email);
			                    this.$store.commit('setUserSlug', response.data.user.slug);
			                    this.$store.commit('setUserNickname', response.data.user.nickname);
			                    this.$store.commit('setUserAbout', response.data.user.about);
			                    this.$store.commit('setUserLevel', response.data.level);

			                    this.$store.commit('setUserImage', response.data.user.image);
			                    this.$store.commit('setUserBackgroundImage', response.data.user.background_image);

			                    this.userLogin = this.$store.getters.getLogin;
					            this.userId = this.$store.getters.getUserId;
					            this.userSlug = this.$store.getters.getUserSlug;
					            this.userImage = this.$store.getters.getUserImage;
					            this.userName = this.$store.getters.getUserName;
					            this.userImage = this.$store.getters.getUserImage;
					            this.userBackgroundImage = this.$store.getters.getUserBackgroundImage;
					            this.$router.go();
			                  }


                        }
                        else if(response.status==401)
                        {
                        	// console.log('in 401 response');
                        	  this.$store.dispatch('destroyAccess');
                        	    this.$toast.open({
                                message: 'Please login to continue',
                                type: 'success'
                            });
		                      this.$router.push('/login');
                        }
                        else {
                           // console.log('inelse boy');
                        }
                    })
                    .catch(function(response) {
                        loader.hide();
                    });
			},
			infiniteHandler($state) {

 			     if(this.challenges.length==0 )
                {
                	 // $state.loaded();
                	 $state.complete();
                	return;
                }
              this.axios.get('challenges/getlist?userId='+this.recordsUserId+'&type='+this.type, {
                params: {
                  page: this.page
                },
              }).then((response) => {

                if (response.status==200) {
                  this.page += 1;
                  this.challenges.push(...new Set([...this.challenges,...response.data.list]));

                  $state.loaded();
                } else {
                  $state.complete();
                }
              });
            },

            updateLike(itemId) {
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
            	 bodyFormData.set('userId', this.userId);
            	 this.axios({
                        method: 'post',
                        url: 'challenges/toggle-like',
                        data: bodyFormData
                    })
                    .then((response) => {
                        // loader.hide();
                        let like_value = response.data;

                        // console.log('liked: '+itemId);
                        for(let index = 0; index<this.challenges.length; index++)
                        {

                        	// console.log('in loop with index: '+this.challenges[index].id);
                        	if(this.challenges[index].id==itemId)
                        	{
                        		console.log('like_value: '+like_value);
                        		if(like_value==1)
                        		{
                        			this.challenges[index].likes += 1;
                        			this.challenges[index].isUserLiked = 1;
                        			break;
                        		}
                        		else
                        		{
                        			if(this.challenges[index].likes>0)
                        			{
                        				this.challenges[index].likes -= 1;
                        				this.challenges[index].isUserLiked = 0;

                        			}
                        		}
                        	}
                        }

                    })
                    .catch(function(response) {
                    	console.log('in ativityItemView Exception');
                    	// console.log(response);
                        // loader.hide();
                    });
            },
		}

	}
</script>

<style scoped>
.active{
	fill: #e91d24;
    color: #e91d24;
}
.active_bg{
	background: #e91d24;
}
.challenge-image{
	width:197px;
	height:194px;
}
</style>
