<template>
    <div>
        <div class="modal fade" :id="modalId" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
            <div class="modal-dialog window-popup update-header-photo" role="document">
                <div class="modal-content w-100">
                    <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close" @click="hideModal ()">
                        <svg class="olymp-close-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                    </a>
                    <b-card style="max-width: 60rem;" class="mb-2 shadow p-3 mb-5 bg-white rounded">

                        <b-form @submit="updateChallenge">
                            <b-form-input
                                class="mt-2"
                                id="title"
                                type="text"
                                v-model="form.title"
                                placeholder="Title" />
                            </b-form-group>

                            <b-form-textarea
                                class="mt-2"
                                id="description"
                                v-model="form.description"
                                placeholder="Enter description..."
                            ></b-form-textarea>

                            <b-form-file
                                class="mt-2 b-form-color"
                                v-model="form.image"
                                :state="Boolean(form.image)"
                                placeholder="Upload an Image"
                                drop-placeholder="Drop Image here..."

                            ></b-form-file>
                            <span>{{challengeimage()}}</span>


                            <multiselect
                                class="mt-3"
                                v-model="form.selectedList"
                                         tag-placeholder="Add this as new tag"
                                         placeholder="Search or add a tag"
                                         label="name"
                                         track-by="code"
                                         :options="optionsList"
                                         :multiple="true"
                                         :taggable="true"
                                         @tag="addTag"
                                         aria-required="true"
                                         :hide-selected="true"
                                             :max="3">
                                <template slot="maxElements" slot-scope="props">
                                    <span class="option_title">maximum 3 allowed</span></template>
                            </multiselect>


                            <b-row	>
                                <b-col class="col-6">
                                    <datepicker

                                        name="active_from"
                                        v-model="form.activeFrom"
                                        :disabled-dates="disabledDatesStart"
                                        placeholder="Active from"
                                        @input="activefromdate()"
                                        class="mt-3" required></datepicker>
                                </b-col>
                                <b-col class="col-6">
                                    <datepicker

                                        name="active_to"
                                        v-model="form.activeTo"
                                        :disabled-dates="disabledDates"
                                        placeholder="Active To"
                                        class="mt-3" required></datepicker>
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
    import  moment from 'moment';
    import { required, minLength, between } from 'vuelidate/lib/validators'


    export default {
        props: {
            actionObject:{
                type:Object
            }
        },
        data () {
            return {
                modalId: 'editchallenge',
                form: {
                    id:null,
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
                userLogin : false,
                disabledDates: {
                    to: '', // Disable all dates up to specific date
                },
                disabledDatesStart: {
                    to: '', // Disable all dates up to specific date
                },

            }
        },
        validations: {
            title: {
                required
            },
            description: {
                required
            }
        },
        components: {
            Datepicker, Multiselect

        },
        mounted() {
            let currentdate = new Date();
            currentdate = currentdate.setDate(currentdate.getDate()-1);
            this.disabledDatesStart.to =  new Date(currentdate);

        },
        updated() {

        },
        computed: {

        },
        methods: {
            limiter(e){
              if (e.length > 3){
                  e.pop()
              }
            },
            activefromdate() {
                console.log('sdate',this.form.activeFrom);
                this.disabledDates.to = new Date(this.form.activeFrom);
            },
            addTag (newTag) {
                // console.log(newTag,newTag.substring(0, 2) + Math.floor((Math.random() * 10000000)),'tags');
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
                this.editChallenge();
            },

            hideModal () {
                console.log('inhidemodel');
                $(`#${ this.modalId }`).modal('hide');
            },
            updateChallenge (evt) {
                evt.preventDefault();
                this.categoriesList = [];
                for(let i=0; i<this.form.selectedList.length; i++)
                {
                    this.categoriesList[i] = this.form.selectedList[i].code;
                }
                console.log(this.categoriesList);
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
                bodyFormData.set('active_from', new Date(this.form.activeFrom));
                bodyFormData.set('active_to', new Date(this.form.activeTo));
                this.axios({
                    method: 'post',
                    url: '/challenges/update/'+this.form.id,
                    data: bodyFormData
                })
                    .then((response) => {
                        loader.hide();
                        console.log(response.data,'in response');
                        if (response.data.success==1) {
                            // this.$toast.open({
                            //     message: 'Challenge Update ',
                            //     type: 'success'
                            // });
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
            editChallenge () {
                // let loader = this.$loading.show({
                //     container: this.fullPage ? null : this.$refs.challengeedit,
                // });

                this.axios.get(`${APP.baseUrl}/challenges/getDetails?id=${this.actionObject.id}`)
                    .then((response) => {
                         // loader.hide();
                        console.log(response,'datachallenge');
                        if (response.status == 200) {
                            this.form = {
                                id: response.data.id,
                                title: response.data.title,
                                description: response.data.description,
                                image: response.data.image,
                                activeFrom:response.data.active_from ,
                                activeTo:response.data.active_to ,
                            }
                            let categories =[];
                            let data =  response.data.categories;

                           data.forEach((value)=>{
                              categories.push({
                                    "code":value.id,
                                    "name":value.title
                                });
                            });
                            this.$set(this.form, 'selectedList', categories);
                        }
                    })
                    .catch(function (response) {
                        // loader.hide();
                    });
            },
            challengeimage(){
                return this.form.image.replace('storage/challenges/','')
            }

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
 <style>
     .custom-file-input.is-invalid~.custom-file-label, .custom-select.is-invalid, .form-control.is-invalid, .was-validated .custom-file-input:invalid~.custom-file-label, .was-validated .custom-select:invalid, .was-validated .form-control:invalid {
         border-color: rgba(154, 159, 191, 0.13);
     }
     .multiselect__tag {
         background: #e91d24!important;
     }
     .multiselect__option--highlight {
         background: #e91d24!important;
     }
 </style>
