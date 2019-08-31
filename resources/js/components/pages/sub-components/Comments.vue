<template>
	<span>
		    <div class="crumina-module crumina-heading with-title-decoration">
                    <h5 class="heading-title">Comments ({{comments.length}})</h5>
                </div>


                <!-- Comments -->

                <ul class="comments-list style-3">

                    <li class="comment-item" v-for="(comment, index) in comments">
                        <div class="post__author-thumb">
                            <img src="assets/img/avatar1.jpg" alt="author">
                        </div>

                        <div class="comments-content">
                            <div class="post__author author vcard">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">{{comment.user.name}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            {{comment.created_at}}
                                        </time>
                                    </div>
                                </div>

                            </div>

                            <p>{{comment.comment}}</p>


                        </div>

                    </li>

                </ul>

                <!-- ... end Comments -->
              <!--   <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-center">
                    <a href="#" class="btn btn-grey btn-md mb60 mt60">Load More Comments...</a>
                </div> -->

                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                    <!-- Comment Form -->

                    <form @submit="onSubmit">
                        <div class="crumina-module crumina-heading with-title-decoration">
                            <h5 class="heading-title">Write a Comment</h5>
                        </div>
                        <div class="row">
                          <!--   <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Name</label>
                                    <input class="form-control" placeholder="" value="James Spiegel" type="text">
                                </div>
                            </div>
                            <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Email</label>
                                    <input class="form-control" placeholder="" value="jspiegel@yourmail.com" type="email">
                                </div>
                            </div> -->

                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Your Comment</label>
                                    <textarea  v-model="comment_text"  class="form-control" placeholder=""></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg full-width">Post your Comment
                                 </button>
                            </div>
                        </div>
                    </form>

                    <!-- ... end Comment Form -->



                </div>


                <!-- Pagination -->
	</span>
</template>

<script>
	export default {
		name: 'Comments',
		 props: ['comment_type', 'comment_type_id'],
		 data() {
		 	return {
		 		comment_text:'',
		 		comments:[],
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
                bodyFormData.set('comment_text', this.comment_text);
                bodyFormData.set('challenge_id', this.comment_type_id);
                this.axios({
                        method: 'post',
                        url: '/challenges/store-comment',
                        data: bodyFormData
                    })
                    .then((response) => {
                        loader.hide();
                        console.log(response.data.success);
                        console.log(response);
                        if (response.status==200) {
                            console.log('yep');

                            console.log(response.data.object);
               				this.comment_text = {
						                    comment_text: '',
						                };
                            this.$toast.open({
                                message: 'Comment posted..! ',
                                type: 'success'
                            });
                            this.loadComments();

                        } else {
                            console.log('inelse boy');
                                this.$toast.open({
                                message: 'Comment not posted',
                                type: 'error'
                            });
                                loader.hide();
                        }
                    })
                    .catch(function(response) {
                        loader.hide();
                    });
            },

            loadComments() {
            	 
            	var bodyFormData = new FormData();
                bodyFormData.set('challent_id', this.comment_type_id);
            	     this.axios({
                        method: 'get',
                        url: '/challenges/comments?challenge_id='+this.comment_type_id,
                        data: bodyFormData
                    })
                    .then((response) => {

                        console.log(response.data.success);
                        console.log(response);

                        if (response.status==200) {

                            this.comments = response.data;
                            console.log('comments..');
                            console.log(this.comments);

                        } else {

                        }
                    })
                    .catch(function(response) {

                    });

            },
		 },
		 created() {
		 	console.log('its loaded');
		 	this.loadComments();
		 }
	}
</script>
