<template>

    <div class="card_data align-items-center">

        <b-card style="max-width: 25rem;" class="mb-2 shadow p-3 mb-5 bg-white rounded">
            <b-alert variant="danger" dismissible v-model="showDismissibleAlert">
                {{ alertMessage }}
            </b-alert>
            <h4 style="text-align: center">Login Panel</h4>
            <hr>
            <b-form @submit="onSubmit">
                <b-form-group id="username" label="Username:" label-for="username" class="font-weight-bold">
                    <b-form-input id="username" type="text" v-model="form.username" required
                                  placeholder="Enter email or merchant id"/>
                </b-form-group>

                <b-form-group id="password" label="Password:" label-for="password" class="font-weight-bold">
                    <b-form-input id="password" type="password" v-model="form.password" required
                                  placeholder="Enter password"/>
                </b-form-group>
                <b-row class="mt-4">
                    <b-col class="text-center">
                        <b-button type="submit" variant="primary" size="lg" class="text-center">Submit</b-button>
                    </b-col>
                </b-row>
            </b-form>
        </b-card>

    </div>

</template>

<style>
    .card_data {
        padding-top: 60px;
    }

    .card {
        margin: 0 auto;
        /* Added */
        float: none;
        /* Added */
        margin-bottom: 10px;
        /* Added */
    }

    .img-responsive {
        display: block;
        height: auto;
        max-width: 100%;
        margin: 0 auto;
    }

</style>

<script>
    export default {
        name: 'LoginPage',
        data() {
            return {
                form: {
                    username: '',
                    password: ''
                },
                show: true,
                alertMessage: 'Wrong Credentials',
                showDismissibleAlert: false,
                baseUrl: '',
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
                bodyFormData.set('email', this.form.username);
                bodyFormData.set('password', this.form.password);
                this.axios({
                    method: 'post',
                    url: this.baseUrl + 'portal/login',
                    data: bodyFormData
                })
                    .then((response) => {
                        loader.hide();

                        if (response.data.success == 1) {

                            USER = response.data.object;
                            this.$store.commit('setLogin', true);
                            this.$store.commit('setUserId', response.data.object.id);
                            this.$store.commit('setUserName', response.data.object.name);
                            // this.$store.commit('setUserImage', response.data.object.image);
                            this.$store.commit('setUserEmail', response.data.object.email);
                            this.$store.commit('setUserSlug', response.data.object.slug);
                            this.$store.commit('setUserNickname', response.data.object.nickname);
                            this.$store.commit('setUserAbout', response.data.object.about);
                            this.$store.commit('setUserLevel', response.data.level);

                            this.$store.commit('setUserImage', response.data.object.image);
                            this.$store.commit('setUserBackgroundImage', response.data.object.background_image);


                            this.$router.push('/');
                            this.$toast.open({
                                message: 'Login was success',
                                type: 'success'
                            });

                        } else {

                            this.$toast.open({
                                message: 'Invalid Credentials',
                                type: 'error'
                            });
                        }
                    })
                    .catch(function (response) {
                        loader.hide();
                    });
            },

            onReset(evt) {
                evt.preventDefault()
                this.form.username = '';
                this.form.password = '';
                this.show = false;
                this.$nextTick(() => {
                    this.show = true;
                })
            }
        },
        mounted() {
            this.baseUrl = this.$store.getters.getUrl;
        },
    }

</script>
