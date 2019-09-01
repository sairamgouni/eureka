<template>
	<span>
		    <div class="crumina-module crumina-heading with-title-decoration">
                    <h5 class="heading-title">Comments ({{comments.length}})</h5>
                </div>


        <!-- Comments -->

                <ul class="comments-list style-3">

                    <li class="comment-item" v-for="(comment, index) in comments" :key="comment.id">
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

                            <p class="comment">{{comment.comment}}</p>

                            <a href="javascript:void(0)" class="post-add-icon inline-items"
                               v-if="$parent.challenge.isAuthor"
                               @click="ownerLike(comment)">
                                <i class="fas fa-thumbs-up" :id="`owner_like_${comment.id}`"
                                   :class="{'text-danger':comment.like_count}"></i>

							</a>
                            <a href="#" class="reply">
                                <i class="fas fa-reply"></i>
                                Reply
                            </a>

                             <ul class="comments-list style-3 mt-3">

                    <li class="comment-item comment-reply-item"
                        v-for="(childComments, childIndex) in comment.child_comments"
                        :key="childComments.id">
                        <div class="post__author-thumb">
                            <img src="assets/img/avatar1.jpg" alt="author">
                        </div>

                        <div class="comments-content">
                            <div class="post__author author vcard">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">{{childComments.user.name}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            {{childComments.created_at}}
                                        </time>
                                    </div>
                                </div>

                            </div>

                            <p>{{childComments.comment}}</p>

                        </div>
                    </li>
                             </ul>

                            <div class="post__author author vcard inline-items">
                                <form @submit="onSubmit"
                                      :class="comment.child_comments.length?'col-md-11 offset-md-1':'col-12 pl-0'">

                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating is-empty replay-form-group">
                                    <label class="control-label">Write Reply</label>
                                    <textarea class="form-control" name="comment_text" required rows="1"
                                              placeholder=""></textarea>
                                </div>
                                <input type="hidden" name="replay" :value="comment.id" required>
                            </div>
                            <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Reply
                                 </button>
                                </div>
                        </div>
                    </form>
                            </div>


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
                                    <textarea v-model="comment_text" name="comment_text" class="form-control"
                                              placeholder=""></textarea>
                                </div>
                                    <button type="submit" class="btn btn-primary w-100">Post your Comment
                                 </button>
                            </div>
                        </div>
                    </form>

                    <!-- ... end Comment Form -->



                </div>


        <!-- Pagination -->
	</span>
</template>

<style lang="scss">
    .comments-list .comment-item {
        padding: 0px 15px;

        .comment {
            margin-bottom: 5px;
        }

        .likes-count {
            margin-top: 2px;
        }
    }

    .comments-list.style-3 .comment-item {
        background-color: transparent;
        border-bottom: 1px solid #ccc6;
        margin-bottom: 15px;
    }

    .comments-list.style-3 .post__author-thumb img {
        width: 35px;
        height: 35px;
    }

    .replay-form-group {
        /*height: 50px;*/
        margin: 0;

        textarea {
            min-height: 70px !important;
        }
    }

    .comment-reply-item {
        .post__author {
            margin-bottom: 10px;
        }

        /*.author-date {*/
        /*    display: flex;*/
        /*    justify-content: space-between;*/
        /*}*/
    }

    @media only screen and (max-width: 460px) {
        .comment-reply-item {
            .author-date {
                /*display: block;*/
                margin-bottom: 10px;
            }
        }
    }
</style>

<script>
    export default {
        name: 'Comments',
        props: ['comment_type', 'comment_type_id'],
        data() {
            return {
                comment_text: '',
                comments: [],
            }
        },
        watch: {
            'comments'(value) {
                console.log(value);
            }
        },
        methods: {
            onSubmit(evt) {
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                // this.showDismissibleAlert = false
                evt.preventDefault();

                let bodyFormData = new FormData(evt.target);
                if (!bodyFormData.get('comment_text'))
                    bodyFormData.set('comment_text', this.comment_text);
                bodyFormData.set('challenge_id', this.comment_type_id);
                if (bodyFormData.get('comment_text'))
                    this.axios.post(APP.baseUrl + '/challenges/store-comment', bodyFormData)
                        .then((response) => {
                            loader.hide();
                            if (response.status == 200) {
                                this.comment_text = '';
                                this.$toast.open({
                                    message: 'Comment posted..! ',
                                    type: 'success'
                                });
                                this.loadComments();

                                $(evt.target)[0].reset();

                            } else {
                                this.$toast.open({
                                    message: 'Comment not posted',
                                    type: 'error'
                                });
                                loader.hide();
                            }
                        })
                        .catch(function (response) {
                            loader.hide();
                        });
            },

            loadComments() {

                var bodyFormData = new FormData();
                bodyFormData.set('challent_id', this.comment_type_id);

                this.axios.get(`${APP.baseUrl}/challenges/comments?challenge_id=${this.comment_type_id}`)
                    .then((response) => {

                        if (response.status == 200) {
                            this.comments = response.data;
                        } else {

                        }
                    })
                    .catch(function (response) {

                    });

            },

            ownerLike(comment) {
                if (comment && comment.id)
                    this.axios.post(`${APP.baseUrl}/challenges/comment/${comment.id}/owner-like`).then((response) => {
                        if (response.status === 200) {
                            if (response.data)
                                $(`#owner_like_${comment.id}`).addClass('text-danger');
                            else
                                $(`#owner_like_${comment.id}`).removeClass('text-danger');

                            this.$toast.open({
                                message: response.data ? 'Liked' : 'Un liked',
                                type: 'success'
                            });
                        } else
                            this.$toast.open({
                                message: 'Something went wrong!',
                                type: 'error'
                            });
                    }).catch((error) => {

                    })
            }
        },
        created() {
            this.loadComments();
        }
    }
</script>
