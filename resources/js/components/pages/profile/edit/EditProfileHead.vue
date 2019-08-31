<template>
			<!-- Main Header Account -->

<div class="main-header">
	<div class="content-bg-wrap bg-account"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
				<div class="main-header-content">
					<h1>Your Account Dashboard</h1>
					<p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
	information, settings, read notifications and requests, view your latest messages, change your pasword and much
	more! Also you can create or manage your own favourite page, have fun!</p>
				</div>
			</div>
		</div>
	</div>
	<img class="img-bottom" :src="userImage" alt="friends">
</div>

<!-- ... end Main Header Account -->
</template>
<script>
	export default {
		name: 'EditProfileHead',
				data() {
            return {
                baseUrl: '',
                userLogin: false,
                userId:'',
                userSlug:'',
                userImage:'',
                userBackgroundImage:'',
                userName:'',
            }
		},
		created(){
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.userSlug = this.$store.getters.getUserSlug;
            this.userImage = this.$store.getters.getUserImage;
            this.userBackgroundImage = this.$store.getters.getUserBackgroundImage;
            this.userName = this.$store.getters.getUserName;
            this.userEmail = this.$store.getters.getUserEmail;
            this.userAbout = this.$store.getters.getUserAbout;
            this.userNickname = this.$store.getters.getUserNickname;
 
     
        },

	}
</script>