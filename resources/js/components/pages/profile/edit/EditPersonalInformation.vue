<template>
	<span>

<EditProfileHead />

<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Information</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- Personal Information Form  -->
					
					 <b-form @submit="onSubmit">
                
                    	<div class="row">


					  			
					
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Full Name</label>
									

                    		<b-form-input 
					                    class="mt-2 form-control"
					                    id="fullname" 
					                    type="text" 
					                    v-model="form.fullname" 
					                    required 
					                   />
					                </b-form-group>
								</div>

								<div class="form-group label-floating">
									<label class="control-label">Nick Name</label>

                    		<b-form-input 
					                    class="mt-2 form-control"
					                    id="nickname" 
					                    type="text" 
					                    v-model="form.nickname" 
					                    required 
					                   />
					                </b-form-group>

								</div>
					
								<div class="form-group label-floating">
									<label class="control-label">Your Email</label>
								
                    		<b-form-input 
					                    class="mt-2 form-control"
					                    id="email" 
					                    type="text" 
					                    v-model="form.email" 
					                    required readonly
					                   />
					                </b-form-group>
								</div>
					
 
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			 
					
 
								<div class="form-group label-floating">
									<label class="control-label">Write a little description about you</label>
									<b-form-textarea
							    class="mt-2 form-control"
							      id="description"
							      v-model="form.about"
							      
							      rows="3"
							      max-rows="6"
						    ></b-form-textarea>
								</div>

							<div class="form-group label-floating">
								<span class="control-label">Profile Image</span>
							<b-form-file
							class="mt-2"
						      v-model="form.image"
						      :state="Boolean(form.image)"
						      placeholder="Upload an Image"
						      drop-placeholder="Drop Image here..."
						    ></b-form-file>
							</div>

							<div class="form-group label-floating">
								<span class="control-label">Background Image</span>
							<b-form-file
							class="mt-2"
						      v-model="form.background_image"
						      :state="Boolean(form.background_image)"
						      placeholder="Upload an Image"
						      drop-placeholder="Drop Image here..."
						    ></b-form-file>
							</div>
 
 							</div>
		 
<!-- 							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
	
 
							</div> -->
 
						 
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width">Save all Changes</button>
							</div>
					
						</div>
					</b-form>
					
					<!-- ... end Personal Information Form  -->
				</div>
			</div>
		</div>

		<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
			<ProfileNavigation />
		</div>
	</div>
</div>

<!-- ... end Your Account Personal Information -->
	</span>
</template>
<script>
import ProfileNavigation from './ProfileNavigation';
import EditProfileHead from './EditProfileHead';
export default {
	name: 'Profileinformation',
	components : {
		ProfileNavigation,
		EditProfileHead,
	},
		data() {
            return {
                baseUrl: '',
                userLogin: false,
                userId:'',
                userSlug:'',
                userImage:'',
                userBackgroundImage:'',
                userName:'',
                form:{
                	fullname:'',
                	nickname:'',
                	email:'',
                	about:'',
                	image:'',
                	background_image:'',
                },
            }
		},
		methods: {
			 onSubmit(evt) {
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                // this.showDismissibleAlert = false
                evt.preventDefault();

                var bodyFormData = new FormData();
                bodyFormData.set('fullname', this.form.fullname);
                bodyFormData.set('nickname', this.form.nickname);
                bodyFormData.set('email', this.form.email);
                bodyFormData.set('about', this.form.about);
                bodyFormData.set('image', this.form.image);
                bodyFormData.set('background_image', this.form.background_image);
                
                this.axios({
                        method: 'post',
                        url: '/user/update-profile',
                        data: bodyFormData
                    })
                    .then((response) => {

                        loader.hide();
 
                       
                        if (response.status==200) {
   
                            this.$toast.open({
                                message: 'Profile Updated',
                                type: 'success'
                            });

                              this.$store.commit('setUserName', this.form.fullname );
                              this.$store.commit('setUserNickname', this.form.nickname );
                              this.$store.commit('setUserAbout', this.form.about );
                              this.$store.commit('setUserAbout', this.form.about );
                              this.$store.commit('setUserBackgroundImage', response.data.background_image );
                              this.$store.commit('setUserImage', response.data.image );

                                this.userImage = this.$store.getters.getUserImage;
					            this.userBackgroundImage = this.$store.getters.getUserBackgroundImage;
					            this.userName = this.$store.getters.getUserName;
					  			this.userAbout = this.$store.getters.getUserAbout;
					            this.userNickname = this.$store.getters.getUserNickname;

                        } else {
                        	loader.hide();
                            console.log('inelse boy');
                                this.$toast.open({
                                message: 'Ooops...! Something went wrong',
                                type: 'error'
                            });
                        }
                    })
                    .catch(function(response) {
                        loader.hide();
                    });
            },
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
            this.form.fullname = this.userName;
            this.form.email = this.userEmail;
            this.form.about = this.userAbout;
            this.form.nickname = this.userNickname;
     
        },
}
</script>