<template>
	<span>
	<!-- Main Header Account -->
	<EditProfileHead/>
        <!-- ... end Main Header Account -->


        <!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Notifications</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use
                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>


                <!-- Notification List -->

				<ul class="notification-list" v-for="notification in notifications" :key="notification.ref_id">
					<li :class="{'un-read':notification.notifier_seen}">
						<div class="author-thumb">
<!--							<img src="assets/img/avatar1-sm.jpg" alt="author">-->

							 <router-link
                                 :to="{ name: 'ProfileEuraka', params: { id: notification.id, slug: notification.notifier_slug } }">
                                 <img :src="notification.notifier_image" alt="author" style="height: 40px">
                                 </router-link>
						</div>
						<div class="notification-event">


							   <router-link
                                   :to="{ name: 'ProfileEuraka', params: { id: notification.id, slug: notification.notifier_slug } }"
                                   class="h6 notification-friend">
                                    {{notification.notifier_name}}
                                </router-link> {{notification.message}} <a
                            href="#" class="notification-link">{{notification.item_title}}</a>.
							<span class="notification-date">
                                <time class="entry-date updated"
                                      datetime="2004-07-24T18:18">{{notification.created_at}}</time>
                            </span>
						</div>
						<span class="notification-icon">
<!--												<svg class="olymp-comments-post-icon"><use-->
                            <!--                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>-->
											</span>

					</li>


				</ul>

                <ul v-if="!notifications.length && !loader" class="notification-list">
                    <li>
                        Nothing to show
                    </li>
                </ul>

                 <ul v-if="loader" class="notification-list">
                    <li>
                        Loading...
                    </li>
                 </ul>
                      <ul class="notification-list" ref="loader"></ul>
                <!-- ... end Notification List -->

			</div>


            <!-- Pagination -->

            <!--			<nav aria-label="Page navigation">-->
            <!--				<ul class="pagination justify-content-center">-->
            <!--					<li class="page-item disabled">-->
            <!--						<a class="page-link" href="#" tabindex="-1">Previous</a>-->
            <!--					</li>-->
            <!--					<li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div-->
            <!--                        class="ripple ripple-on ripple-out"-->
            <!--                        style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>-->
            <!--					<li class="page-item"><a class="page-link" href="#">2</a></li>-->
            <!--					<li class="page-item"><a class="page-link" href="#">3</a></li>-->
            <!--					<li class="page-item"><a class="page-link" href="#">...</a></li>-->
            <!--					<li class="page-item"><a class="page-link" href="#">12</a></li>-->
            <!--					<li class="page-item">-->
            <!--						<a class="page-link" href="#">Next</a>-->
            <!--					</li>-->
            <!--				</ul>-->
            <!--			</nav>-->

            <!-- ... end Pagination -->
		</div>

		<div
            class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
			<ProfileNavigation/>
		</div>
	</div>
</div>

        <!-- ... end Your Account Personal Information -->
	</span>
</template>
<script>
    import ProfileNavigation from './edit/ProfileNavigation';
    import EditProfileHead from './edit/EditProfileHead';

    export default {
        name: 'Notifications',
        components: {
            ProfileNavigation,
            EditProfileHead,
        },
        data() {
            return {
                notifications: [],
                loader: true,
                hasMore: false,
                page: 1
            }
        },
        mounted() {
            window.onscroll = (ev) => {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    if (this.hasMore) {
                        this.loadNotifications(this.page + 1);
                    }
                }
            };
        },
        destroyed() {
            this.hasMore = false;
            $(window).off('scroll', window, true);
        },
        created() {
            this.loadNotifications();
        },
        methods: {
            loadNotifications(page = 1) {
                let loader = this.$loading.show();

                this.hasMore = false;
                this.axios.get(`${APP.baseUrl}/user/all-notifications?page=${page}`).then((response) => {
                    response.data.current_page === 1 ? this.notifications = response.data.data : this.notifications.push(...response.data.data);
                    this.hasMore = response.data.has_more;
                    this.page = response.data.current_page;
                    this.loader = false;
                    loader.hide();
                }).catch((e) => loader.hide());
            }
        }
    }
</script>
