<template>
    <div class="container">
        <div class="row">
            <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">

                <div class="ui-block mb60">


                    <!-- Single Post -->

                    <article class="hentry blog-post single-post single-post-v3">

                        <h1 class="post-title">{{challenge.title}}</h1>

                        <a href="#" class="post-category bg-primary">Digital</a>

                        <ul class="filter-icons">
                            <li>
                                <a href="#" class="post-add-icon inline-items">
                                    <img src="assets/img/icon-chat1.png" alt="icon">
                                    <span>58</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="post-add-icon inline-items">
                                    <img src="assets/img/icon-chat26.png" alt="icon">
                                    <span>21</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="post-add-icon inline-items">
                                    <img src="assets/img/icon-chat15.png" alt="icon">
                                    <span>3</span>
                                </a>
                            </li>
                        </ul>

                        <div class="post-milestone-progress">
                            <img src="assets/img/eureka/milestone.png">
                        </div>

                        <div class="author-date">
                            <div class="author-thumb">
                                <img alt="author" src="assets/img/friend-harmonic7.jpg" class="avatar">
                            </div>
                            by
                            <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                            <div class="post__date">
                                <time class="published" datetime="2017-03-24T18:18">
                                    - 12 hours ago
                                </time>
                            </div>
                            <div class="post__location">Malaysia</div>
                        </div>

                        <div class="post-thumb">
                            <img src="assets/img/post-thumb1.jpg" alt="author">
                        </div>

                        <div class="post-content-wrap">

                            <div class="control-block-button post-control-button">

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-speech-balloon-icon">
                                        <use
                                            xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                    </svg>
                                    <span>105</span>
                                </a>

                                <a href="#" class="btn btn-control has-i bg-facebook">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                </a>

                                <a href="#" class="btn btn-control has-i bg-twitter">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                </a>
                            </div>

                            <div class="post-content">
                                {{challenge.description}}
                            </div>
                        </div>


                        <div class="choose-reaction reaction-colored">
                            <div class="title">Choose your <span>Reaction!</span></div>

                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat13.png" alt="icon" data-toggle="tooltip"
                                             data-placement="top" data-original-title="LOL">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat15.png" alt="icon" data-toggle="tooltip"
                                             data-placement="top" data-original-title="Amazed">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat9.png" alt="icon" data-toggle="tooltip"
                                             data-placement="top" data-original-title="ANGER">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat4.png" alt="icon" data-toggle="tooltip"
                                             data-placement="top" data-original-title="joy">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat6.png" alt="icon" data-toggle="tooltip"
                                             data-placement="top" data-original-title="BAD">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat26.png" alt="icon" data-toggle="tooltip"
                                             data-placement="top" data-original-title="LIKE">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="assets/img/icon-chat27.png" alt="icon" data-toggle="tooltip"
                                             data-placement="top" data-original-title="COOL">
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </article>

                    <!-- ... end Single Post -->


                </div>

                <!-- Comments Component-->

                <Comments comment_type="challenge" :comment_type_id="selectedChallengeId"/>


                <!-- ... end Pagination -->

            </div>

            <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <aside class="blog-post-wrap">

                    <div class="ui-block">

                        <!-- Post -->

                        <article class="hentry blog-post blog-post-v3 featured-post-item">

                            <div class="post-thumb">
                                <img src="assets/img/post13.jpg" alt="photo">
                                <a href="#" class="post-category bg-primary">DIGITAL</a>
                            </div>

                            <div class="post-content">

                                <div class="author-date">
                                    by
                                    <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            - 5 MONTHS ago
                                        </time>
                                    </div>
                                </div>

                                <a href="#" class="h4 post-title">We went lookhunting in all the California bay area</a>

                                <div class="post-additional-info inline-items">

                                    <div class="friends-harmonic-wrap">
                                        <ul class="friends-harmonic">
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat26.png" alt="icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat27.png" alt="icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat2.png" alt="icon">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="names-people-likes">
                                            206
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

                    <div class="ui-block">

                        <!-- Post -->

                        <article class="hentry blog-post blog-post-v3 featured-post-item">

                            <div class="post-thumb">
                                <img src="assets/img/post14.jpg" alt="photo">
                                <a href="#" class="post-category bg-primary">DIGITAL</a>
                            </div>

                            <div class="post-content">

                                <div class="author-date">
                                    by
                                    <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            - 2 MONTHS ago
                                        </time>
                                    </div>
                                </div>

                                <a href="#" class="h4 post-title">We went lookhunting in all the California bay area</a>

                                <div class="post-additional-info inline-items">

                                    <div class="friends-harmonic-wrap">
                                        <ul class="friends-harmonic">
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat6.png" alt="icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat7.png" alt="icon">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="names-people-likes">
                                            37
                                        </div>
                                    </div>

                                    <div class="comments-shared">
                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-speech-balloon-icon">
                                                <use
                                                    xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                            </svg>
                                            <span>62</span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </article>

                        <!-- ... end Post -->

                    </div>

                    <div class="ui-block">

                        <!-- Post -->

                        <article class="hentry blog-post blog-post-v3 featured-post-item">

                            <div class="post-thumb">
                                <img src="assets/img/post15.jpg" alt="photo">
                                <a href="#" class="post-category bg-primary">DIGITAL</a>
                            </div>

                            <div class="post-content">

                                <div class="author-date">
                                    by
                                    <a class="h6 post__author-name fn" href="#">MADDY SIMMONS </a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            - 3 MONTHS ago
                                        </time>
                                    </div>
                                </div>

                                <a href="#" class="h4 post-title">Check out this 10 yummy breakfast recipes</a>

                                <div class="post-additional-info inline-items">

                                    <div class="friends-harmonic-wrap">
                                        <ul class="friends-harmonic">
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat20.png" alt="icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat11.png" alt="icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat9.png" alt="icon">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="names-people-likes">
                                            88
                                        </div>
                                    </div>

                                    <div class="comments-shared">
                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-speech-balloon-icon">
                                                <use
                                                    xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                            </svg>
                                            <span>39</span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </article>

                        <!-- ... end Post -->
                    </div>

                    <div class="ui-block">

                        <!-- Post -->

                        <article class="hentry blog-post blog-post-v3 featured-post-item">

                            <div class="post-thumb">
                                <img src="assets/img/post16.jpg" alt="photo">
                                <a href="#" class="post-category bg-primary">DIGITAL</a>
                            </div>

                            <div class="post-content">

                                <div class="author-date">
                                    by
                                    <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            - 6 MONTHS ago
                                        </time>
                                    </div>
                                </div>

                                <a href="#" class="h4 post-title">We optimized the Olympus App for better navigation</a>

                                <div class="post-additional-info inline-items">

                                    <div class="friends-harmonic-wrap">
                                        <ul class="friends-harmonic">
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat1.png" alt="icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat26.png" alt="icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="assets/img/icon-chat27.png" alt="icon">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="names-people-likes">
                                            93
                                        </div>
                                    </div>

                                    <div class="comments-shared">
                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-speech-balloon-icon">
                                                <use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                            </svg>
                                            <span>105</span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </article>

                        <!-- ... end Post -->

                    </div>

                </aside>
            </div>
        </div>
    </div>
</template>

<script>
    import Comments from './sub-components/Comments';

    export default {
        name: "ChallengeDetails",
        components: {Comments},
        data() {
            return {
                userLogin: false,
                selectedChallengeSlug: '',
                selectedChallengeId: '',
                challenge: '',

            }
        },
        created() {
            this.selectedChallengeId = this.$route.params.id;
            this.selectedChallengeSlug = this.$route.params.slug;
            this.userLogin = this.$store.getters.getLogin;
            this.userId = this.$store.getters.getUserId;

            let loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.file,
            });

            var bodyFormData = new FormData();
            bodyFormData.set('id', this.selectedChallengeId);
            this.axios.get(`${APP.baseUrl}/challenges/getDetails?id=${this.selectedChallengeId}`)
            // this.axios({
            //     method: 'get',
            //     url:,
            //     data: bodyFormData
            // })
                .then((response) => {
                    loader.hide();
                    if (response.status == 200) {
                        this.challenge = response.data;

                    } else if (response.status == 401) {
                        // console.log('in 401 response');
                        //   this.$store.dispatch('destroyAccess');
                        //     this.$toast.open({
                        //     message: 'Please login to continue',
                        //     type: 'success'
                        // });
                        //   this.$router.push('/login');
                    } else {

                    }
                })
                .catch(function (response) {
                    loader.hide();
                });
        },

    }
</script>

<style scoped>

</style>
