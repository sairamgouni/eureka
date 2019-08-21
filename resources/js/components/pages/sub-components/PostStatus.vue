<template>

    <div class="container">


            <!-- Main Content -->



                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Create a new challenge</h6>
                    </div>
                    <div class="ui-block-content">
                        <form class="form-new-challenge">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Title</label>
                                <input class="form-control" type="text" placeholder=""  v-model="form.title" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Type your challenge here...</label>
                                <textarea class="form-control" placeholder="" v-model="form.description" id="description"></textarea>
                            </div>
                            <div class="form-group multiple-select">
                                <label for="select">Industry</label>
                                <select id="select" class="form-control multiple-select__input" multiple>
                                    <option>Airline</option>
                                    <option>E-Commerce</option>
                                    <option>Digital</option>
                                    <option>Hospitality</option>
                                </select>
                            </div>
                                                <div class="form-group add-options clearfix">
                                                    <div class="add-options-message__wrapper">
                                                        <div class="add-options-message" >

                                                                <label for="file-input"><svg class="olymp-camera-icon" data-toggle="modal"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg> </label>
                                                            <input id="file-input" type="file" hidden/>

                                                            <button class="btn btn-primary btn-md-2">Post</button>
                                                            <button  class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                                                        </div>
                                                    </div>
                                                </div>
                        </form>
                    </div>

                    <!-- ... end News Feed Form  -->
                </div>


        </div>


    <!--	<div class="ui-block">-->
<!--        <div class="news-feed-form">-->
<!--            <div class="ui-block-title">-->
<!--                <h6 class="title">Create a new challenge</h6>-->
<!--            </div>-->
<!--            <div class="ui-block-content">-->
<!--                <form class="form-new-challenge" @submit="onSubmit">-->
<!--                    <div class="form-group label-floating is-empty">-->
<!--                        <label class="control-label">Title</label>-->
<!--                        <input class="form-control" type="text" placeholder=""  v-model="form.title">-->
<!--                    </div>-->

<!--                    <div class="form-group label-floating is-empty">-->
<!--                        <label class="control-label">Type your challenge here...</label>-->
<!--                        <textarea class="form-control"   id="description" v-model="form.description" placeholder=""></textarea>-->
<!--                    </div>-->

<!--&lt;!&ndash;                    <div class="form-group multiple-select">&ndash;&gt;-->
<!--&lt;!&ndash;                        <label for="select">Industry</label>&ndash;&gt;-->
<!--&lt;!&ndash;                        <select id="select" class="form-control multiple-select__input" multiple>&ndash;&gt;-->
<!--&lt;!&ndash;                            <option>Airline</option>&ndash;&gt;-->
<!--&lt;!&ndash;                            <option>E-Commerce</option>&ndash;&gt;-->
<!--&lt;!&ndash;                            <option>Digital</option>&ndash;&gt;-->
<!--&lt;!&ndash;                            <option>Hospitality</option>&ndash;&gt;-->
<!--&lt;!&ndash;                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->

<!--                    <div class="form-group multiple-select" id="app">-->

<!--                        <multiselect v-model="selectedList" id="select" label="title" track-by="title" placeholder="Type to search"  :options="optionsList" :multiple="true" :searchable="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true"  >-->

<!--                        </multiselect>-->

<!--                    </div>-->

<!--                    <div class="form-group add-options clearfix">-->
<!--                        <div class="add-options-message__wrapper">-->
<!--                            <div class="add-options-message" >-->

<!--                                    <label for="file-input"><svg class="olymp-camera-icon" data-toggle="modal"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg> </label>-->
<!--                                <input id="file-input" type="file" hidden/>-->

<!--                                <button class="btn btn-primary btn-md-2">Post</button>-->
<!--                                <button  class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->

<!--            &lt;!&ndash; ... end News Feed Form  &ndash;&gt;-->
<!--        </div>	&lt;!&ndash; News Feed Form  &ndash;&gt;-->

<!--&lt;!&ndash;				<div class="news-feed-form">&ndash;&gt;-->






<!--&lt;!&ndash;        <b-card   class="mb-2 shadow p-2 mb-2 bg-white rounded">&ndash;&gt;-->
<!--&lt;!&ndash;             <h4 style="text-align: center">Post Challange</h4>&ndash;&gt;-->

<!--&lt;!&ndash;            <b-form @submit="onSubmit">&ndash;&gt;-->

<!--&lt;!&ndash;                    <b-form-input&ndash;&gt;-->
<!--&lt;!&ndash;                    class="mt-2"&ndash;&gt;-->
<!--&lt;!&ndash;                    id="title"&ndash;&gt;-->
<!--&lt;!&ndash;                    type="text"&ndash;&gt;-->
<!--&lt;!&ndash;                    v-model="form.title"&ndash;&gt;-->
<!--&lt;!&ndash;                    required&ndash;&gt;-->
<!--&lt;!&ndash;                    placeholder="Challenge Title" />&ndash;&gt;-->
<!--&lt;!&ndash;                </b-form-group>&ndash;&gt;-->


<!--&lt;!&ndash;		    <b-form-textarea&ndash;&gt;-->
<!--&lt;!&ndash;		    class="mt-2"&ndash;&gt;-->
<!--&lt;!&ndash;		      id="description"&ndash;&gt;-->
<!--&lt;!&ndash;		      v-model="form.description"&ndash;&gt;-->
<!--&lt;!&ndash;		      placeholder="Enter description..."&ndash;&gt;-->
<!--&lt;!&ndash;		      rows="3"&ndash;&gt;-->
<!--&lt;!&ndash;		      max-rows="6"&ndash;&gt;-->
<!--&lt;!&ndash;		    ></b-form-textarea>&ndash;&gt;-->



<!--&lt;!&ndash;	<b-form-file&ndash;&gt;-->
<!--&lt;!&ndash;	class="mt-2"&ndash;&gt;-->
<!--&lt;!&ndash;      v-model="form.image"&ndash;&gt;-->
<!--&lt;!&ndash;      :state="Boolean(form.image)"&ndash;&gt;-->
<!--&lt;!&ndash;      placeholder="Upload an Image"&ndash;&gt;-->
<!--&lt;!&ndash;      drop-placeholder="Drop Image here..."&ndash;&gt;-->
<!--&lt;!&ndash;    ></b-form-file>&ndash;&gt;-->
<!--&lt;!&ndash;    <div class="mt-3">Selected file: {{ form.image ? form.image.name : '' }}</div>&ndash;&gt;-->


<!--&lt;!&ndash;    <b-form-group label="Categories"  class="mt-2 checkbox">&ndash;&gt;-->
<!--&lt;!&ndash;      <b-form-checkbox-group&ndash;&gt;-->

<!--&lt;!&ndash;        id="checkbox-group-1"&ndash;&gt;-->
<!--&lt;!&ndash;        v-model="form.selectedList"&ndash;&gt;-->
<!--&lt;!&ndash;        :options="optionsList"&ndash;&gt;-->
<!--&lt;!&ndash;        name="flavour-1"&ndash;&gt;-->
<!--&lt;!&ndash;      ></b-form-checkbox-group>&ndash;&gt;-->
<!--&lt;!&ndash;    </b-form-group>&ndash;&gt;-->

<!--&lt;!&ndash;    <b-form-select v-model="form.selectedStatus" :options="statusOptions" class="mt-3">&ndash;&gt;-->

<!--&lt;!&ndash;    </b-form-select>&ndash;&gt;-->

<!--&lt;!&ndash;    <b-form-group label-cols="12" label-cols-lg="2" label-size="sm" label="Active From" label-for="input-sm">&ndash;&gt;-->
<!--&lt;!&ndash;  <b-row>&ndash;&gt;-->
<!--&lt;!&ndash;    <b-col>&ndash;&gt;-->
<!--&lt;!&ndash;    	<datepicker name="active_from" v-model="form.active_from"></datepicker>&ndash;&gt;-->
<!--&lt;!&ndash;    </b-col>&ndash;&gt;-->
<!--&lt;!&ndash;  </b-row>&ndash;&gt;-->
<!--&lt;!&ndash;    </b-form-group>&ndash;&gt;-->



<!--&lt;!&ndash;        <b-row class="mt-4">&ndash;&gt;-->
<!--&lt;!&ndash;            <b-col class="text-right">&ndash;&gt;-->
<!--&lt;!&ndash;                <b-button type="submit" variant="primary" size="lg" class="btn btn-primary btn-md-2" >Post Challange</b-button>&ndash;&gt;-->
<!--&lt;!&ndash;            </b-col>&ndash;&gt;-->
<!--&lt;!&ndash;        </b-row>&ndash;&gt;-->
<!--&lt;!&ndash;            </b-form>&ndash;&gt;-->
<!--&lt;!&ndash;        </b-card>&ndash;&gt;-->

<!--&lt;!&ndash;    	</div>&ndash;&gt;-->
<!--&lt;!&ndash;    </div>&ndash;&gt;-->

<!--				</div>-->


</template>
<script>
	import Datepicker from 'vuejs-datepicker';
    import Multiselect from 'vue-multiselect';
	export default {
		name: 'PostStatus',

		 data() {
            return {
                userLogin: false,
                 form: {
                    title: '',
                    description: '',
                    image: '',
                    selectedList:null,
                     optionsList:[],
                    selectedStatus:'Active',
                    activeFrom:'' ,

                },
                show: true,
                selectedList:null,
                optionsList:[],
                statusOptions:[
                				{ value: 'Active', text: 'Active' },
                				{ value: 'Inactive', text: 'InActive' },
                			  ],
         		state : { date: new Date(2016, 9,  16)}
            }
        },
         components: {
				  	Datepicker,
                    Multiselect
				  },
		methods: {

			 onSubmit(evt) {
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });



                // this.showDismissibleAlert = false
                evt.preventDefault();

                var bodyFormData = new FormData();
                bodyFormData.set('title', this.form.title);
                bodyFormData.set('description', this.form.description);
                bodyFormData.set('image', this.form.image);
                bodyFormData.set('categories', this.form.selectedList);
                bodyFormData.set('status', this.form.selectedStatus);
                bodyFormData.set('active_from', this.form.activeFrom);
                this.axios({
                        method: 'post',
                        url: '/challenges/create',
                        data: bodyFormData
                    })
                    .then((response) => {
                        loader.hide();
                        console.log(response.data.success);
                        if (response.data.success==1) {
                            console.log('yep');

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
                                message: 'Login was success',
                                type: 'success'
                            });

                        } else {
                            console.log('inelse boy');
                                this.$toast.open({
                                message: 'Invalid Credentials',
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
                    console.log('category response: '+response.status);
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



    }
</script>

