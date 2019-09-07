<template>
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex1200">
                    <div class="ui-block-title">
                        <div class="w-select">
                            <div class="title">Filter By:</div>
                            <fieldset class="form-group">
                                <select class="selectpicker form-control">
                                    <option value="NU">All Categories</option>
                                    <option value="NU">Favourite</option>
                                    <option value="NU">Likes</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="w-select">
                            <fieldset class="form-group">
                                <select class="selectpicker form-control">
                                    <option value="NU">Date (Descending)</option>
                                    <option value="NU">Date (Ascending)</option>
                                </select>
                            </fieldset>
                        </div>

                        <a href="#" data-toggle="modal" data-target="#create-photo-album"
                           class="btn btn-primary btn-md-2">Filter</a>

                        <form class="w-search">
                            <div class="form-group with-button">
                                <input class="form-control" type="text" placeholder="Search Blog Posts......">
                                <button>
                                    <svg class="olymp-magnifying-glass-icon">
                                        <use
                                            xlink:href="assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog-post-wrap">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" v-for="(item, index) in challenges" :key="index">
                        <div class="ui-block">

                            <!-- Post -->

                            <article class="hentry blog-post">

                                <div class="post-thumb">
                                    <img style="width: 391px; height: 276px;"  :src="item.image" :alt="item.title">
                                </div>

                                <div class="post-content">


<!--                                 <router-link :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }" class="post-category bg-blue-light">
                                {{item.title}}
                            </router-link> -->
                             <router-link :to="{ name: 'ChallengeDetails', params: { id: item.id, slug: item.slug } }" class="h4 post-title">

                                    {{item.title}}
                                </router-link>

                                    <div class="post-additional-info inline-items">
                                        <div class="friends-harmonic-wrap">
                                            <ul class="friends-harmonic">
                                                <li>
                            <a href="javascript:void(0);" @click="updateLike(item.id);"
                            class="post-add-icon inline-items"
                            v-bind:class="{ active: (item.isUserLiked==1)? true : false }"
                            >
                                <svg class="olymp-heart-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>

                            </a>
                                                </li>

                                            </ul>
                                            <div class="names-people-likes">
                                               {{item.likes}}
                                            </div>
                                        </div>

                                        <div class="comments-shared">
                                            <a href="#" class="post-add-icon inline-items">
                                                <svg class="olymp-speech-balloon-icon">
                                                    <use
                                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                                </svg>
                                                <span>{{item.comments}}</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </article>

                            <!-- ... end Post -->
                        </div>
                    </div>

                      <infinite-loading @infinite="infiniteHandler"></infinite-loading>

                </div>
            </div>


            <!-- Pagination -->

<!--             <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1
                        <div class="ripple-container">
                            <div class="ripple ripple-on ripple-out"
                                 style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div>
                        </div>
                    </a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->

            <!-- ... end Pagination -->
        </section>
    </div>
</template>

    <script>
        export default {
            name: "Home",
            data() {
                return  {
                userLogin:false,
                userId:'',
                userSlug:'',
                userImage:'',
                userName:'',
                userImage:'',
                userBackgroundImage:'',
                challenges:[],
                 page: 1,
                 type:'all',
                 recordsUserId:'',
                }
            },
            created(){
                this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
               this.loadPosts();
            },
            methods : {
                loadPosts() {
                       let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });

                var bodyFormData = new FormData();
                this.recordsUserId = this.userId;
                this.type = 'all';

                if(this.isSameUser!=undefined)
                {
                    this.recordsUserId = this.profileIdToLoad;
                }

                if(this.specificUserRecords!=undefined)
                {
                    if(this.specificUserRecords)
                        this.type = 'specific';
                }

                 this.axios({
                        method: 'get',
                        url: 'challenges/getlist?userId='+this.recordsUserId+'&recordsType='+this.type,
                        data: bodyFormData
                    })
                    .then((response) => {
                        loader.hide();
                         if (response.status==200) {
                            this.challenges = response.data.list;
                        }

                    })
                    .catch(function(response) {
                        loader.hide();
                    });
            },
            infiniteHandler($state) {

                 if(this.challenges.length==0 )
                {
                     // $state.loaded();
                     $state.complete();
                    return;
                }
              this.axios.get('challenges/getlist?userId='+this.recordsUserId+'&type='+this.type, {
                params: {
                  page: this.page
                },
              }).then((response) => {

                if (response.status==200) {
                  this.page += 1;
                  this.challenges.push(...new Set([...this.challenges,...response.data.list]));

                  $state.loaded();
                } else {
                  $state.complete();
                }
              });
            },

            updateLike(itemId) {
                // console.log('index '+index);
                if(!this.userLogin)
                {
                     this.$toast.open({
                        message: 'Please login to like',
                        type: 'info'
                        });
                     return;
                }
                 var bodyFormData = new FormData();
                 bodyFormData.set('item_id', itemId);
                 bodyFormData.set('userId', this.userId);
                 this.axios({
                        method: 'post',
                        url: 'challenges/toggle-like',
                        data: bodyFormData
                    })
                    .then((response) => {
                        // loader.hide();
                        let like_value = response.data;

                        // console.log('liked: '+itemId);
                        for(let index = 0; index<this.challenges.length; index++)
                        {

                            // console.log('in loop with index: '+this.challenges[index].id);
                            if(this.challenges[index].id==itemId)
                            {
                                console.log('like_value: '+like_value);
                                if(like_value==1)
                                {
                                    this.challenges[index].likes += 1;
                                    this.challenges[index].isUserLiked = 1;
                                    break;
                                }
                                else
                                {
                                    if(this.challenges[index].likes>0)
                                    {
                                        this.challenges[index].likes -= 1;
                                        this.challenges[index].isUserLiked = 0;

                                    }
                                }
                            }
                        }

                    })
                    .catch(function(response) {
                        console.log('in ativityItemView Exception');
                        // console.log(response);
                        // loader.hide();
                    });
            },
            },
        }
    </script>

<style scoped>
.active{
    fill: #e91d24;
    color: #e91d24;
}
.active_bg{
    background: #e91d24;
}
.challenge-image{
    width:197px;
    height:194px;
}
</style>
