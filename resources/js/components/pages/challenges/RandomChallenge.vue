<template>
                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <aside class="blog-post-wrap">

                        <div class="ui-block">

                            <!-- Post -->

                            <article class="hentry blog-post blog-post-v3 featured-post-item" v-for="(item,index) in list" :key="index">

                                <div class="post-thumb">
                                    <img src="assets/img/post13.jpg" alt="photo">
                                    <a href="#" class="post-category bg-primary">DIGITAL</a>
                                </div>

                                <div class="post-content">

                                    <div class="author-date">
                                        by
                                        <a class="h6 post__author-name fn" href="#"></a>
                                        <div class="post__date">
                                            <time class="published" datetime="2017-03-24T18:18">
                                                {{item.created_at}}
                                            </time>
                                        </div>
                                    </div>

                                    <a href="#" class="h4 post-title">{{item.title}}</a>

                                    <div class="post-additional-info inline-items">

                                        <div class="friends-harmonic-wrap">

                                            <div class="names-people-likes">

                                            </div>
                                        </div>

                                        <div class="comments-shared">
                                            <a href="#" class="post-add-icon inline-items">
                                                <svg class="olymp-speech-balloon-icon">
                                                    <use
                                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                                </svg>
                                                <span>97</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </article>

                            <!-- ... end Post -->

                        </div>



                    </aside>
                </div>

</template>
<script>
    export default {
        name: 'RandomChallenge',
        data() {
            return {
                list:[],
                userLogin:false,
            }
        },
        methods:{
            getChallenges() {
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.file,
                });
                var bodyFormData = new FormData();

                this.axios({
                    method: 'get',
                    url: 'challenges/getChallenges/5',
                    data: bodyFormData
                })
                    .then((response) => {
                        loader.hide();

                        if (response.status==200) {
                            this.list = response.data;

                        }
                        else if(response.status==401)
                        {
                            console.log('in 401 response');
                            this.$store.dispatch('destroyAccess');
                            this.$toast.open({
                                message: 'Please login to continue',
                                type: 'success'
                            });
                            this.$router.push('/login');
                        }
                        else {
                            console.log('inelse boy');
                        }
                    })
                    .catch(function(response) {
                        loader.hide();
                    });
            },
        },
        created() {
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;
            this.getChallenges();
        }
    }
</script>

<style>

</style>
