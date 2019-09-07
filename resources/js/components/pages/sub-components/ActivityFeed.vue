<template>
				<div class="ui-block">

				<div class="ui-block-title">
					<h6 class="title">Activity Feed</h6>
					<!-- <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a> -->
				</div>


				<!-- W-Activity-Feed -->

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
							 {{item.message}}

							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">{{item.created_at}}</time></span>

						</div>
					</li>



				</ul>

				<!-- .. end W-Activity-Feed -->
			</div>
</template>

<script>
	export default {
		name: 'ActivityFeed',
		data(){
			return {
				activities:[],
			}
		},
		methods: {
			loadActivities() {
				var bodyFormData = new FormData();
                // bodyFormData.set('challent_id', this.comment_type_id);
            	     this.axios({
                        method: 'get',
                         url: APP.baseUrl + '/activities/get-list',
                         data: bodyFormData
                    })
                    .then((response) => {

                        console.log(response.data.success);
                        console.log(response);

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
		 created() {

		 	this.loadActivities();
		 }
	}
</script>
