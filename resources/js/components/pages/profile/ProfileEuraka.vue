<template>
<span>

<ProfileHeader />

<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<ActivityItem />

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
				</svg>
			</a>
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

			<ProfileIntro />

			<UserBadges />


		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">


			<UserFriends />
	 		<LastPhotos />

		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>


</span>
</template>

<script>
	import ProfileHeader from './ProfileHeader';
	import ProfileIntro from './ProfileIntro';
	import UserBadges from './UserBadges';
	import UserFriends from './UserFriends';
	import LastPhotos from './LastPhotos';
	import ActivityItem from '../sub-components/ActivityItem';
	export default {
		name: 'ProfileEuraka',
		components: {
						ProfileHeader,
						ActivityItem,
						ProfileIntro,
						UserBadges,
						UserFriends,

					}
	}
</script>
