<template>
 <div class="card_data align-items-center">
       
        <b-card style="max-width: 60rem;" class="mb-2 shadow p-3 mb-5 bg-white rounded">
            
            <h4 style="text-align: center">Post Challenge</h4>
                         
            <b-form @submit="onSubmit">
                
                    <b-form-input 
                    class="mt-2"
                    id="title" 
                    type="text" 
                    v-model="form.title" 
                    required 
                    placeholder="Challenge Title" />
                </b-form-group>

  			
		    <b-form-textarea
		    class="mt-2"
		      id="description"
		      v-model="form.description"
		      placeholder="Enter description..."
		      rows="3"
		      max-rows="6"
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
    	v-model="form.active_to" 
    	placeholder="Active To"
    	class="mt-3"></datepicker>
    </b-col>
</b-row>
 
  <b-form-select v-model="form.selectedStatus" :options="statusOptions" class="mt-3">
    	
    </b-form-select>
  

        <b-row class="mt-4">
            <b-col class="text-right">
                <b-button type="submit" variant="primary" size="lg" class="btn btn-primary btn-md-2" >Post Challange</b-button>
            </b-col>
        </b-row>
            </b-form>
        </b-card>
 </div>
</template>

<script>
	import Datepicker from 'vuejs-datepicker';
	import Multiselect from 'vue-multiselect';
	export default {
		name: 'PostChallenge',

		 data() {
            return {
                userLogin: false,
                 form: {
                    title: '',
                    description: '',
                    image: '',
                    selectedList:[],
                    selectedStatus:'Active',
                    activeFrom:'' ,
                    activeTo:'' ,
                },
                show: true,
                optionsList:[],
                statusOptions:[ 
                				{ value: 'Active', text: 'Active' },
                				{ value: 'Inactive', text: 'InActive' },
                			  ],
         		state : { date: new Date(2016, 9,  16)}
            }
        },
         components: {
				  	Datepicker, Multiselect
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
                            // console.log('yep');
                          
                            // console.log(response.data.object);
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
                              this.$router.push('/');

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
              addTag (newTag) {
			      const tag = {
			        name: newTag,
			        code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
			      }
			      this.optionsList.push(tag)
			      this.selectedList.push(tag)
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
			
	}
</script>

<style scoped>
	
</style>