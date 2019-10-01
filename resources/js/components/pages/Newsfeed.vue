<template>

 <span>

<div class="container">
	<div class="row">

		<!-- Main Content -->

		<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="ui-block">

				<!-- News Feed Form  -->

				<div class="news-feed-form newsfeed-input">
					<!-- Nav tabs -->

                    <!-- Tab panes -->
                      <form>

								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Create Your Challenge here...</label>
									<textarea class="form-control" placeholder="" row="2" @click="postChallenge"></textarea>
								<span class="material-input"></span></div>


							</form>
                </div>

                <!-- ... end News Feed Form  -->			</div>
		<!--  <div role="tablist " v-if="userLogin">
		    <b-card no-body class="mb-1">
		      <b-card-header header-tag="header" class="p-1 " role="tab">
		        <b-button block href="#" v-b-toggle.accordion-1 variant="info" class="btn btn-purple btn-lg full-width color-white" style="color:white;">Post Challange</b-button>
		      </b-card-header>
		      <b-collapse id="accordion-1" accordion="my-accordion" role="tabpanel">
		        <b-card-body>
		          <PostStatus />
		        </b-card-body>
		      </b-collapse>
		    </b-card>
		  </div> -->
<!--    <router-link to="/post-challenge">-->
<!--                    <a href="javascript:void(0);" class="btn btn-primary btn-md-1 mt-1 post-button">Post Challenge</a>-->
<!--              </router-link>-->
		<ActivityItem ref="activityItem"/>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html"
               data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use
                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>

		</main>

        <!-- ... end Main Content -->


        <!-- Left Sidebar -->

		<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

	 	<FriendSuggestions></FriendSuggestions>

            <!-- <PagesMayLike /> -->
		</aside>

        <!-- ... end Left Sidebar -->


        <!-- Right Sidebar -->

		<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

		<!-- <Birthday /> -->


		<ActivityFeed ref="activityfeed"></ActivityFeed>



		</aside>

        <!-- ... end Right Sidebar -->

	</div>
</div>

<ChallengeForm ref="challenge" v-on:output="output"></ChallengeForm>

</span>
</template>


<script>

    import FriendSuggestions from './sub-components/FriendSuggestions';
    import ActivityFeed from './sub-components/ActivityFeed';
    import PagesMayLike from './sub-components/PagesMayLike';
    import PostStatus from './sub-components/PostStatus';
    import ActivityItem from './sub-components/ActivityItem';
    import PostChallenge from './challenges/PostChallenge';
    import ChallengeForm from './challenges/ChallengeForm';

    export default {
        name: 'Newsfeed',
        components: {
            ActivityFeed,
            FriendSuggestions,
            PagesMayLike,

            PostStatus,

            ActivityItem,
            PostChallenge,
            ChallengeForm
        },
        data() {
            return {
                userLogin: false,
            }
        },
        methods: {
            postChallenge() {
                this.$refs.challenge.showModal();
                // this.$router.push('/post-challenge');
            },
            output(massege) {
                console.log(massege,'inoutputmethod');
                this.$refs.activityItem.loadPosts();
            }
        },
        created() {
            this.userLogin = this.$store.getters.getLogin;
        },

    }
</script>

<style scoped>
    .post-button {
        line-height: 40px;
        width: 100%;
    }
    .news-feed-form textarea {
        min-height: 34px !important;
    }
    .label-floating.with-icon label.control-label, .label-placeholder.with-icon label.control-label {
        left: 30px !important;
    }
    .label-floating.with-icon .form-control, .label-floating.with-icon input, .label-floating.with-icon textarea {
        padding-left: 30px !important;
    }
</style>
