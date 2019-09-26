<!--<style type="text/css" scoped>-->
<!--    .author-thumb {-->
<!--        width: 36px;-->
<!--    }-->
<!--    .author-thumb img {-->
<!--        max-width: 100%;-->
<!--    }-->
<!--    .modal.show .modal-dialog {-->
<!--        display: block !important;-->
<!--    }-->
<!--    .news-feed-form .author-thumb {-->
<!--        top: 11px;-->
<!--    }-->
<!--    .window-popup .icon {-->
<!--        margin-top: 0 !important;-->
<!--    }-->
<!--    .image-icon-edit {-->
<!--        margin-top: 10px;-->
<!--    }-->
<!--    .olymp-close-icon-file {-->
<!--        margin-left: 188px;-->
<!--        position: absolute;-->
<!--        width: 20px;-->
<!--        margin-top:-21px;-->
<!--        cursor: pointer;-->
<!--    }-->
<!--    .input-border-top {-->
<!--        border-top: unset;-->
<!--    }-->
<!--    .upload-btn-wrapper {-->
<!--        position: relative;-->
<!--        overflow: hidden;-->
<!--        display: block;-->
<!--    }-->
<!--    .custom-btn {-->
<!--        border: 1px solid gray;-->
<!--        color: gray;-->
<!--        background-color: white;-->
<!--        padding: 1px 10px;-->
<!--        border-radius: 5px;-->
<!--        font-size: 16px;-->
<!--    }-->
<!--    .upload-btn-wrapper input[type=file] {-->
<!--        font-size: 100px;-->
<!--        position: absolute;-->
<!--        left: 0;-->
<!--        top: 0;-->
<!--        opacity: 0;-->
<!--    }-->
<!--    .window-popup .form-group {-->
<!--        margin-bottom: 0;-->
<!--    }-->
<!--    .close-icon-video {-->
<!--        margin-left: 326px;-->
<!--        position: absolute;-->
<!--        width: 20px;-->
<!--        margin-top: -4px;-->
<!--        cursor: pointer;-->
<!--    }-->
<!--</style>-->
<template>
    <div>
        <div class="modal fade" :id="modalId" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
            <div class="modal-dialog window-popup update-header-photo" role="document">
                <div class="modal-content w-100">
                    <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close" @click="hideModal ()">
                        <svg class="olymp-close-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                    </a>
                    <b-card style="max-width: 60rem;" class="mb-2 shadow p-3 mb-5 bg-white rounded">

                        <b-form @submit="addChallenge">

                            <b-form-input
                                class="mt-2"
                                id="title"
                                type="text"
                                v-model="form.title"
                                required
                                placeholder="Title" />
                            </b-form-group>


                            <b-form-textarea
                                class="mt-2"
                                id="description"
                                v-model="form.description"
                                placeholder="Enter description..."
                            ></b-form-textarea>



                            <b-form-file
                                class="mt-2"
                                v-model="form.image"
                                :state="Boolean(form.image)"
                                placeholder="Upload an Image"
                                drop-placeholder="Drop Image here..."
                            ></b-form-file>


                            <multiselect
                                class="mt-3"
                                v-model="form.selectedList" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :options="optionsList" :multiple="true" :taggable="true" @tag="addTag"></multiselect>

                            <!--    <b-form-group label="Categories"  class="mt-2 checkbox">
                                 <b-form-checkbox-group

                                   id="checkbox-group-1"
                                   v-model="form.selectedList"
                                   :options="optionsList"
                                   name="flavour-1"
                                 ></b-form-checkbox-group>
                               </b-form-group> -->



                            <b-row	>
                                <b-col class="col-6">
                                    <datepicker

                                        name="active_from"
                                        v-model="form.activeFrom"

                                        placeholder="Active from"
                                        class="mt-3"></datepicker>
                                </b-col>
                                <b-col class="col-6">
                                    <datepicker

                                        name="active_to"
                                        v-model="form.activeTo"

                                        placeholder="Active To"
                                        class="mt-3"></datepicker>
                                </b-col>
                            </b-row>

                            <b-row class="mt-4">
                                <b-col class="text-right">
                                    <b-button type="submit" variant="primary" size="lg" class="btn btn-primary btn-md-2" >Post Challange</b-button>
                                </b-col>
                            </b-row>
                        </b-form>
                    </b-card>                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Multiselect from 'vue-multiselect';

    export default {
        data () {
            return {
                modalId: 'challenge',
                form: {
                    title: '',
                    description: '',
                    image: '',
                    selectedList:[],
                    activeFrom:'' ,
                    activeTo:'' ,
                },
                title: 'Add Challenge',
                buttonText: 'Add',
                show: true,
                categoriesList:[],
                optionsList:[],
                state : { date: new Date(2016, 9,  16)},
                userLogin : false
            }
        },
        components: {
            Datepicker, Multiselect

        },
        mounted() {
            //
        },
        updated() {
        },
        computed: {

        },
        methods: {

            addTag (newTag) {
                const tag = {
                    name: newTag,
                    code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
                }
                this.optionsList.push(tag)
                this.selectedList.push(tag)
            },
            cancel () {
                this.hideModal();
            },

            showModal() {
                $(`#${ this.modalId }`).modal('show');
            },

            hideModal () {
                $(`#${ this.modalId }`).modal('hide');
            },
            addChallenge (evt) {
                evt.preventDefault();
                for(let i=0; i<this.form.selectedList.length; i++)
                {
                    this.categoriesList[i] = this.form.selectedList[i].code;
                }
                // console.log(this.categoriesList);
                // return ;
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                // this.showDismissibleAlert = false


                var bodyFormData = new FormData();
                bodyFormData.set('title', this.form.title);
                bodyFormData.set('description', this.form.description);
                bodyFormData.set('image', this.form.image);
                bodyFormData.set('categories', this.categoriesList);
                bodyFormData.set('status', this.form.selectedStatus);
                bodyFormData.set('active_from', this.form.activeFrom);
                bodyFormData.set('active_to', this.form.activeTo);
                this.axios({
                    method: 'post',
                    url: '/challenges/create',
                    data: bodyFormData
                })
                    .then((response) => {
                        loader.hide();
                        console.log(response.data.success);
                        if (response.data.success==1) {
                            // console.log('yep');

                            console.log(response.data.object);
                            this.form = {
                                title: '',
                                description: '',
                                image: '',
                                selectedList:[],
                                selectedStatus:'Active',
                                activeFrom:'' ,
                            };
                            this.$toast.open({
                                message: 'Challenge Created ',
                                type: 'success'
                            });

                            this.hideModal();
                            this.$emit('output','success');

                        } else {
                            console.log('inelse boy');
                            this.$toast.open({
                                message: 'Cannot Post Challenge, Please contact developer',
                                type: 'error'
                            });
                        }
                    })
                    .catch(function(response) {
                        loader.hide();
                    });
            },

        },
        created() {

            this.userLogin = this.$store.getters.getLogin;

            if(!this.userLogin)
                return;
            let loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.file,
            });

            var bodyFormData = new FormData();
            var self = this;
            this.axios({
                method: 'get',
                url:  '/categories/getlist',
                data: bodyFormData
            })
                .then((response) => {

                    loader.hide();
                    // console.log(response);
                    this.optionsList = response.data.object;

                })
                .catch(function(response) {
                    loader.hide();
                    // console.log('yep jack');
                    // console.log(this.optionsList);
                    // self.$store.dispatch('destroyAccess');
                    //         this.$toast.open({
                    //         message: 'Please login to continue',
                    //         type: 'success'
                    //     });
                    self.$router.push('/login');
                });
        },
        watch: {

        },
    }
</script>

<style scoped>
    .w-100 {
        width: 100%!important;
    }
    .modal-content {

        background-color:  transparent !important;
         border: 0;

    }
</style>
