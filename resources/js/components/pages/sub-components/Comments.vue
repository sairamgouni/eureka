<template>
	<span>
		    <div class="crumina-module crumina-heading with-title-decoration">
                    <h5 class="heading-title">Comments ({{comments.length}})</h5>
                </div>


        <!-- Comments -->

                <ul class="comments-list style-3">

                    <li class="comment-item" v-for="(comment, index) in comments" :key="comment.id">
                        <div class="post__author-thumb">
                            <img :src="comment.user.image"  alt="author">
                        </div>

                        <div class="comments-content">
                            <div class="post__author author vcard inline-items">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">{{comment.user.name}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            {{comment.created_at}}
                                        </time>
                                    </div>
                                </div>
                                 <div class="more" v-show="!comment.like_count"><svg class="olymp-three-dots-icon"><use
                                     xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
                                        <a class="dropdown-item comment-action"
                                           href="javascript:void(0)"
                                           @click="editComment(comment,index)"
                                           v-if="user.id == comment.user_id">Edit</a>
									</li>
									<li>
                                         <a href="javascript:void(0)"
                                            class="dropdown-item comment-action"
                                            @click="deleteComment(comment,index)"
                                            v-show="!comment.like_count"
                                            v-if="user.id == comment.user_id || $parent.challenge.isAuthor">
                                Delete
                            </a>
									</li>

								</ul>
							</div>

                            </div>

                            <p class="comment">{{comment.comment}}</p>
                             <div class="more"><svg class="olymp-three-dots-icon"><use
                                 xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">

								</ul>
							</div>
                               <div class="more"><svg class="olymp-three-dots-icon"><use
                                   xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">

								</ul>
							</div>

                            <div class="attachment-container d-flex mb-3"
                                 v-if="comment.attachments && comment.attachments.length">
                                <img :src="attachment.path" class="img-thumbnail" alt="Attachment"
                                     v-for="attachment in comment.attachments" :key="attachment.id">
                           </div>
                            </div>

                            <div class="post__author author vcard inline-items child-comment-update-form"
                                 v-if="comment.hasOwnProperty('edit_open') && comment.edit_open">
                                <form @submit.prevent="updateComment" :class="'col-md-11 offset-md-1'">

                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <textarea class="form-control" name="comment_text" required rows="1"
                                              placeholder="" v-html="comment.comment"></textarea>
                                </div>
                                <input type="hidden" name="comment_id" :value="comment.id" required>
                            </div>

                            <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Update
                                 </button>
                            </div>

                        </div>
                    </form>
                            </div>
                            <!--                            v-if="$parent.challenge.isAuthor && $parent.challenge.user.id != comment.user_id"-->
                            <a href="javascript:void(0)" class="post-add-icon inline-items"
                               @click="ownerLike(comment,index)"
                               v-if="$parent.challenge.isAuthor && $parent.challenge.user.id != comment.user_id">
                                <i class="fas fa-thumbs-up" :id="`owner_like_${comment.id}`"
                                   :class="{'text-danger':!!comment.like_count}"></i>

							</a>


                             <a href="javascript:void(0)" class="post-add-icon inline-items"
                                v-if="$parent.challenge.isAuthor && comment.like_count && $parent.challenge.user.id != comment.user_id"
                                @click="ownertick(comment)">
                                <i class="fas fa-check " :id="`owner_tick_${comment.id}`"
                                   :class="{'text-danger':comment.finalized}"></i>

							</a>

                             <a href="javascript:void(0)" class="post-add-icon inline-items"
                                v-if="$parent.challenge.isAuthor && comment.finalized && (!winner || comment.winner) && $parent.challenge.user.id != comment.user_id"
                                @click="ownerwin(comment,index)">
                                <i class="fas fa-trophy " :id="`owner_win_${comment.id}`"
                                   :class="{'text-danger':comment.winner}"></i>

							</a>

                             <a href="javascript:void(0)" class="comment-action" @click="replyToggle(comment,index)">
                                <i class="fas fa-reply"></i>
                                Reply
                            </a>

                             <ul class="comments-list style-3 mt-3">

                    <li class="comment-item comment-reply-item"
                        v-for="(childComments, childIndex) in comment.child_comments"
                        :key="childComments.id">
                        <div class="post__author-thumb">
                            <img :src="childComments.user.image" alt="author">
                        </div>

                        <div class="comments-content">
                            <div class="post__author author vcard inline-items">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">{{childComments.user.name}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            {{childComments.created_at}}
                                        </time>
                                    </div>

                                </div>
                                            <div class="more"><svg class="olymp-three-dots-icon"><use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
                                        <a href="javascript:void(0)" class="dropdown-item comment-action"
                                           @click="editComment(childComments,childIndex,comment,index)"
                                           v-if="user.id == childComments.user_id">
                                Edit
                            </a>
									</li>
									<li>
                                         <a href="javascript:void(0)" class="dropdown-item comment-action"
                                            @click="deleteComment(childComments,index)"
                                            v-if="user.id == childComments.user_id || $parent.challenge.user.id == childComments.user_id">
                                Delete
                            </a>
									</li>
								</ul>
							</div>


                            </div>

                            <p>{{childComments.comment}}</p>
                                 <div class="more"><svg class="olymp-three-dots-icon"><use
                                     xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">

								</ul>
							</div>

                            <div class="attachment-container mb-3"
                                 v-if="childComments.attachments && childComments.attachments.length">
                                <div class="attachmemt mr-2">
                                <img :src="attachment.url" class="img-thumbnail" alt="Attachment"
                                     v-for="attachment in childComments.attachments" :key="attachment.id">
                                </div>
                            </div>


                                 <div class="more"><svg class="olymp-three-dots-icon"><use
                                     xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">

								</ul>
							</div>
                        </div>

                        <div class="post__author author vcard inline-items child-comment-update-form"
                             v-if="childComments.hasOwnProperty('edit_open') && childComments.edit_open">
                                <form @submit.prevent="updateComment" :class="'col-md-11 offset-md-1'">

                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Update Comment</label>
                                    <textarea class="form-control" name="comment_text" required rows="1"
                                              placeholder="" v-html="childComments.comment"></textarea>
                                </div>
                                <input type="hidden" name="comment_id" :value="childComments.id" required>
                            </div>

                            <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Update
                                 </button>
                            </div>

                        </div>
                    </form>
                            </div>
                    </li>
                             </ul>

                            <div class="post__author author vcard inline-items"
                                 v-if="comment.hasOwnProperty('reply_open') && comment.reply_open">
                                <form @submit="onSubmit"
                                      :class="comment.child_comments.length?'col-md-11 offset-md-1':'col-12 pl-0'">

                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Write Reply</label>
                                    <textarea class="form-control" name="comment_text" required rows="1"
                                              placeholder=""></textarea>
                                </div>
                                <!--                                 <div class="form-group">-->
                                <!--                                    <label class="control-label"></label>-->
                                <!--                                    <input type="file" name="attachment" :id="`attachment`"-->
                                <!--                                           class="form-control">-->
                                <!--                                </div>-->
                                <input type="hidden" name="replay" :value="comment.id" required>
                            </div>

                            <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Reply
                                 </button>
                            </div>

                        </div>



<!--							<img src="img/author-page.jpg" alt="author">-->


                    </form>
                            </div>



                    </li>

                </ul>

        <!-- ... end Comments -->
        <!--   <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-center">
              <a href="#" class="btn btn-grey btn-md mb60 mt60">Load More Comments...</a>
          </div> -->

                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"
                     v-if="!winner && $parent.challenge.can_comment && $parent.challenge.active_to > $parent.challenge.today">
                    <form @submit="onSubmit" class="comment-form inline-items" enctype="multipart/form-data">

						<div class="post__author author vcard inline-items">
<!--							<img src="img/author-page.jpg" alt="author">-->

							<div class="form-group with-icon-right ">
								<textarea class="form-control" v-model="comment_text" name="comment_text" placeholder="" required></textarea>
								<div class="add-options-message">
                                    <div>
                                       <label for="attachment">
										<svg class="olymp-camera-icon">
											<use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
										</svg>

                                    </label>
                                        <input type="file" name="attachment" style="display: none" id="attachment" @change="attachment">
                                    </div>

								</div>
							</div>
						</div>

						<button class="btn btn-md-2 btn-primary" id="comment-box">Post Comment</button>

					</form>
<!--                    <form @submit="onSubmit" class="comments-form" enctype="multipart/form-data">-->
<!--                        <div class="crumina-module crumina-heading with-title-decoration">-->
<!--                            <h5 class="heading-title">Write a Comment</h5>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">-->
<!--                                <div class="form-group label-floating is-empty">-->
<!--                                    <label class="control-label">Your Comment</label>-->
<!--                                    <textarea v-model="comment_text" name="comment_text" class="form-control"-->
<!--                                              placeholder="" required></textarea>-->
<!--                                </div>-->

<!--                                                                <div class="form-group">-->
<!--                                                                    <label class="control-label"></label>-->
<!--                                                                    <input type="file" name="attachment" :id="`attachment`"-->
<!--                                                                           class="form-control">-->
<!--                                                                </div>-->

<!--                                    <button type="submit" class="btn btn-primary w-100" id="comment-box">Post your Comment-->
<!--                                    </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->

                    <!-- ... end Comment Form -->



                </div>
<b-modal id="comment_edit" title="Title">
    <p class="my-4">Comment Edit </p>
  </b-modal>

        <!-- Pagination -->
	</span>
</template>

<style lang="scss">
    .modal-backdrop {
        background-color: #00000075;
    }

    .comments-list .comment-item {
        padding: 0px 15px;

        .comments-content {
            .post__author {
                display: flex;
                justify-content: space-between;
            }
        }

        .comment {
            margin-bottom: 5px;
        }

        .likes-count {
            margin-top: 2px;
        }

        .tick_count {
            margin-top: 2px;
        }

        .win_count {
            margin-top: 2px;
        }

        .text-danger {
            color: #f92552 !important;
        }
    }

    .comments-list.style-3 .comment-item {
        background-color: transparent;
        border-bottom: 1px solid #ccc6;
        margin-bottom: 15px;
    }
    .comment-form textarea {
        /*min-height: 60px;*/
        /*height: 60px;*/
        /*transition: all .3s ease;*/
        background-color: transparent;
        border-bottom: 1px solid #615C5C;
        border-top:1px solid #615C5C;
        border-left:1px solid #615C5C;
        border-right:1px solid #615C5C;
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

    }

    @media only screen and (max-width: 460px) {
        .comment-reply-item {
            .author-date {
                /*display: block;*/
                margin-bottom: 10px;
            }
        }
    }

    .comment-action {
        margin-right: 20px;
    }

    .attachment-container {
        img {
            height: 125px;
            max-width: 120px;
            object-fit: contain;
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
                winner: false,
                user: USER,
                file: null
            }
        },
        watch: {
            'comments'(value) {
                console.log(value);
            }
        },
        methods: {
            attachment(evt) {
                let files = evt.target.files || evt.dataTransfer.files;
                this.file = files[0];
                console.log(this.file,'image');
            },
            onSubmit(evt) {
                if (!$(evt.target)[0].checkValidity()) {
                    // this.$toast.open({
                    //     message: 'Comment can\'t be empty',
                    //     type: 'error'
                    // });
                    return false;
                }

                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                // this.showDismissibleAlert = false
                evt.preventDefault();

                let bodyFormData = new FormData(evt.target);
                if (!bodyFormData.get('comment_text'))
                    bodyFormData.set('comment_text', this.comment_text);
                bodyFormData.set('challenge_id', this.comment_type_id);
                if (this.file)
                    bodyFormData.set('attachment', this.file);
                if (bodyFormData.get('comment_text'))
                    this.axios.post(APP.baseUrl + '/challenges/store-comment', bodyFormData)
                        .then((response) => {
                            loader.hide();
                            if (response.status == 200) {
                                this.comment_text = '';
                                // this.$toast.open({
                                //     message: 'Comment posted..! ',
                                //     type: 'success'
                                // });
                                this.$set(this.$parent.challenge, 'ideas', this.$parent.challenge.ideas + 1)
                                // this.$parent.challenge.ideas=
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
                //we are initiating form data for submit data
                var bodyFormData = new FormData();
                bodyFormData.set('challent_id', this.comment_type_id);

                this.axios.get(`${APP.baseUrl}/challenges/comments?challenge_id=${this.comment_type_id}`)
                    .then((response) => {

                        if (response.status == 200) {
                            this.comments = response.data.comments;
                            this.winner = response.data.winner;
                        }
                    })
                    .catch(function (response) {

                    });

            },
            ownerLike(comment, index) {
                if (comment.winner)
                    return this.$toast.open({
                        message: "<h5>Actions can't be process. The challenge already have a winner.</h5>",
                        type: 'warning'
                    });
                if (comment.like_count)
                    this.$swal({
                        title: '<h5>Are you sure you want to remove your Like?</h5>',
                        text: comment.finalized ? "This will also unselect this Idea as Finalist. " : "",
                        type: 'warning',
                        showCancelButton: true,
                        // confirmButtonColor: '#e91d24',
                        // cancelButtonColor: '#d33',
                        confirmButtonText: 'Unlike'
                    }).then((result) => {
                        if (result.value) {
                            if (comment.finalized)
                                this.toggleownertick(comment);
                            this.toggleOwnerLike(comment, index);
                        }
                    });
                else this.toggleOwnerLike(comment, index);
            },
            toggleOwnerLike(comment, index) {
                if (comment && comment.id)
                    this.axios.post(`${APP.baseUrl}/challenges/comment/${comment.id}/owner-like`).then((response) => {
                        if (response.status === 200) {
                            if (response.data) {
                                comment.like_count = 1;
                                this.$set(this.$parent.challenge, 'game_time', this.$parent.challenge.game_time + 1);
                                $(`#owner_like_${comment.id}`).addClass('text-danger');
                            } else {
                                comment.like_count = 0;
                                this.$set(this.$parent.challenge, 'game_time', this.$parent.challenge.game_time - 1);
                                $(`#owner_like_${comment.id}`).removeClass('text-danger');
                            }
                            this.$set(this.comments, index, comment);

                            // this.$toast.open({
                            //
                            //     message: response.data ? 'Comment Liked' : 'Comment un liked',
                            //     type: 'success'
                            // });
                        } else
                            this.$toast.open({
                                message: 'Something went wrong!',
                                type: 'error'
                            });
                    }).catch((error) => {

                    })
            },
            ownertick(comment, index) {
                if (comment.winner)
                    return this.$toast.open({
                        message: "Actions can't be process. The challenge already have a winner.",
                        type: 'warning'
                    });
                if (comment.finalized)
                    this.$swal({
                        title: '<h5>Are you sure you want to remove your chosen Finalist?</h5>',
                        text: comment.winner ? "<h5>It will also remove from Winner </h5> " : "",
                        type: 'warning',
                        showCancelButton: true,
                        // confirmButtonColor: '#e91d24',
                        // cancelButtonColor: '#d33',
                        confirmButtonText: 'Unselect'
                    }).then((result) => {
                        if (result.value) {
                            // if (comment.winner)
                            //     this.ownerwin(comment);
                            this.toggleownertick(comment, index);
                        }
                    });
                else this.toggleownertick(comment, index);


            },
            toggleownertick(comment, index) {
                if (comment && comment.id)
                    this.axios.post(`${APP.baseUrl}/challenges/comment/${comment.id}/owner-tick`).then((response) => {
                        if (response.status === 200) {
                            if (response.data == '1') {
                                comment.finalized = 1;
                                this.$set(this.$parent.challenge, 'finalized', this.$parent.challenge.finalized + 1);
                                $(`#owner_tick_${comment.id}`).addClass('text-danger');

                            } else {
                                comment.finalized = 0;
                                this.$set(this.$parent.challenge, 'finalized', this.$parent.challenge.finalized - 1);
                                $(`#owner_tick_${comment.id}`).removeClass('text-danger');

                            }

                            this.$set(this.comments, index, comment);

                            // this.$toast.open({
                            //     message: response.data ? 'Added to the finalize list' : 'Removed from the finalize list',
                            //     type: 'success'
                            // });
                        } else
                            this.$toast.open({
                                message: 'Something went wrong!',
                                type: 'error'
                            });
                    }).catch((error) => {

                    })
            },
            ownerwin(comment, index) {
                console.log('test');
                if (comment && comment.winner)
                    return this.$toast.open({
                        message: "The winner can't be change",
                        type: 'warning'
                    });
                this.$swal({
                    title: '<h5>Are you sure you want to choose this Idea as Winner?\n' +
                        'Once you have selected the winner, you cannot change your selection anymore.</h5>',
                    type: 'warning',
                    showCancelButton: true,
                    // confirmButtonColor: '#e91d24',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Choose'
                }).then((result) => {
                    if (result.value) {
                        if (comment && comment.id)
                            this.axios.post(`${APP.baseUrl}/challenges/comment/${comment.id}/owner-win`).then((response) => {
                                if (response.status === 200) {

                                    if (response.data) {
                                        comment.winner = 1;
                                        this.$set(this.$parent.challenge, 'winner', this.$parent.challenge.winner);
                                        $(`#owner_win_${comment.id}`).addClass('text-danger');
                                    } else {
                                        this.$set(this.$parent.challenge, 'winner', this.$parent.challenge.winner);
                                        $(`#owner_win_${comment.id}`).removeClass('text-danger');
                                        comment.winner = 0;
                                    }

                                    // if (comment.winner)
                                    this.winner = comment.winner;

                                    this.$set(this.comments, index, comment);

                                    // this.$toast.open({
                                    //     message: response.data ? 'Marked as Winner' : 'Removed from winner',
                                    //     type: 'success'
                                    // });
                                } else
                                    this.$toast.open({
                                        message: 'Something went wrong!',
                                        type: 'error'
                                    });
                            }).catch((error) => {

                            })
                    }
                });
            },
            replyToggle(comment, index) {
                if (comment.hasOwnProperty('reply_open')) comment.reply_open = !comment.reply_open; else comment.reply_open = true;

                this.$set(this.comments, index, comment);
            },
            editComment(comment, index, parent, parentIndex) {
                if (comment.hasOwnProperty('edit_open')) comment.edit_open = !comment.edit_open; else comment.edit_open = true;
                if (!parent) {
                    this.$set(this.comments, index, comment);
                    console.log('parent comment');
                } else {
                    parent.child_comments[index] = comment;
                    this.$set(this.comments, parentIndex, parent);
                    console.log('child comment edit');
                }
            },
            deleteComment(comment, index) {
                this.$swal({
                    title: "Are you sure you want to delete this comment?",
                    type: 'warning',
                    showCancelButton: true,
                    // confirmButtonColor: '#e91d24',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.value) {
                        if (comment && comment.id)
                            this.axios.delete(`${APP.baseUrl}/challenges/comment/${comment.id}`).then((response) => {
                                if (response.status === 200) {
                                    if (response.data != 0 && response.data != true && response.data) {
                                        console.log('child comment removed');
                                        this.$set(this.comments, index, response.data);
                                    } else if (response.data == true) {
                                        console.log('parent comment removed');
                                        this.comments.splice(this.comments.indexOf(comment), 1);

                                    }

                                    // this.$toast.open({
                                    //     message: response.data ? 'Comment Deleted' : "Can't delete comment",
                                    //     type: 'success'
                                    // });
                                } else
                                    this.$toast.open({
                                        message: 'Something went wrong!',
                                        type: 'error'
                                    });
                            }).catch((error) => {

                            })
                    }
                });
            },
            updateComment(evt) {
                if (!$(evt.target)[0].checkValidity()) {
                    this.$toast.open({
                        message: 'Comment can\'t be empty',
                        type: 'error'
                    });
                    return false;
                }

                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                // this.showDismissibleAlert = false
                evt.preventDefault();

                let bodyFormData = new FormData(evt.target);
                if (!bodyFormData.get('comment_text'))
                    bodyFormData.set('comment_text', this.comment_text);

                bodyFormData.set('_method', 'PATCH');
                if (bodyFormData.get('comment_text') && bodyFormData.get('comment_id'))
                    this.axios.post(APP.baseUrl + '/challenges/update-comment/' + bodyFormData.get('comment_id'), bodyFormData)
                        .then((response) => {
                            loader.hide();
                            if (response.status == 200) {
                                this.comment_text = '';
                                // this.$toast.open({
                                //     message: 'Comment updated..! ',
                                //     type: 'success'
                                // });
                                // this.$set(this.$parent.challenge, 'ideas', this.$parent.challenge.ideas + 1)
                                // this.$parent.challenge.ideas=
                                this.loadComments();
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
            }
            //     toggleownerwin(comment, index){
            //     if (comment && comment.id)
            //         this.axios.post(`${APP.baseUrl}/challenges/comment/${comment.id}/owner-win`).then((response) => {
            //             if (response.status === 200) {
            //
            //                 if (response.data) {
            //                     comment.winner = 1;
            //                     this.$set(this.$parent.challenge, 'winner', this.$parent.challenge.winner);
            //                     $(`#owner_win_${comment.id}`).addClass('text-danger');
            //                 } else {
            //                     this.$set(this.$parent.challenge, 'winner', this.$parent.challenge.winner);
            //                     $(`#owner_win_${comment.id}`).removeClass('text-danger');
            //                     comment.winner = 0;
            //                 }
            //
            //                 // if (comment.winner)
            //                 this.winner = comment.winner;
            //
            //                 this.$set(this.comments, index, comment);
            //
            //                 this.$toast.open({
            //                     message: response.data ? 'Marked as Winner' : 'Removed from winner',
            //                     type: 'success'
            //                 });
            //             } else
            //                 this.$toast.open({
            //                     message: 'Something went wrong!',
            //                     type: 'error'
            //                 });
            //         }).catch((error) => {
            //
            //         })
            // }
        },
        created() {
            this.loadComments();
        },
        updated() {
            let isPost = this.$store.getters.getIsPost;
            if (isPost !== 'yes')
                window.document.getElementById('comment-box').scrollIntoView(false);
        }
    }
</script>
