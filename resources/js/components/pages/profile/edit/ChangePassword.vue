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
					<h6 class="title">Change Password</h6>
				</div>
				<div class="ui-block-content">


					<!-- Change Password Form -->

					<form @submit.prevent="changePassword">
						<div class="row">

							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Confirm Current Password</label>
									<input class="form-control" placeholder=""
                                           :class="{'is-invalid': errors.current_password}" type="password"
                                           v-model="password.current_password">
								    <div class="invalid-feedback" v-if="errors.current_password">{{errors.current_password[0]}}</div>
                                </div>
							</div>

							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Your New Password</label>
									<input class="form-control" placeholder="" :class="{'is-invalid': errors.password}"
                                           type="password" v-model="password.password" required>
                                     <div class="invalid-feedback" v-if="errors.password">{{errors.password[0]}}</div>
								</div>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Confirm New Password</label>
									<input class="form-control" placeholder=""
                                           :class="{'is-invalid': errors.password_confirmation}" type="password"
                                           v-model="password.password_confirmation" ref="password">
                                    <div class="invalid-feedback" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</div>
                                </div>
							</div>


							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width"
                                        type="submit">Change Password Now!</button>
							</div>

						</div>
					</form>

                    <!-- ... end Change Password Form -->
				</div>
			</div>
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
    import ProfileNavigation from './ProfileNavigation';
    import EditProfileHead from './EditProfileHead';


    export default {
        name: 'ChangePassword',
        components: {
            ProfileNavigation,
            EditProfileHead,
        },
        data() {
            return {
                password: {},
                errors: {},
                submiting: false
            }
        },
        methods: {
            changePassword() {
                this.$validator
                this.submiting = true;
                axios.post('/api/changePassword', this.password)
                    .then((response) => {
                        // loader.hide();
                        if (response.status == 200) {
                            USER = response.data.user;
                            this.$toast.open({
                                message: 'password Updated',
                                type: 'success'
                            });


                        } else {
                            loader.hide();
                            console.log('inelse boy');
                            this.$toast.open({
                                message: 'Ooops...! Something went wrong',
                                type: 'error'
                            });
                        }
                    })
            }
        }
    }
</script>
