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
                    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="ui-block">

                            <!-- Post -->

                            <article class="hentry blog-post">

                                <div class="post-thumb">
                                    <img src="assets/img/post1.jpg" alt="photo">
                                </div>

                                <div class="post-content">
                                    <a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
                                    <a href="#" class="h4 post-title">Here’s the Featured Urban photo of
                                        August! </a>

                                    <div class="post-additional-info inline-items">
                                        <div class="friends-harmonic-wrap">
                                            <ul class="friends-harmonic">
                                                <li>
                                                    <a href="#">
                                                        <img src="assets/img/icon-chat27.png"
                                                             alt="icon">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="assets/img/icon-chat2.png"
                                                             alt="icon">
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="names-people-likes">
                                                26
                                            </div>
                                        </div>

                                        <div class="comments-shared">
                                            <a href="#" class="post-add-icon inline-items">
                                                <svg class="olymp-speech-balloon-icon">
                                                    <use
                                                        xlink:href="assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                                </svg>
                                                <span>0</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </article>

                            <!-- ... end Post -->
                        </div>
                    </div>
                    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="ui-block">

                            <!-- end Post -->

                            <article class="hentry blog-post has-post-thumbnail format-link">

                                <div class="post-thumb bg-link">

                                    <div class="overlay overlay-dark"></div>

                                    <div class="post-content">
                                        <a href="#" class="h4 post-title">Olympus Network added new photo
                                            filters!</a>

                                        <a href="https://themeforest.net/user/crumina/portfolio" class="site-link"
                                           rel="nofollow" target="_blank">themeforest.net</a>

                                    </div>
                                </div>
                            </article>

                            <!-- ... end Post -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pagination -->

            <nav aria-label="Page navigation">
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
            </nav>

            <!-- ... end Pagination -->
        </section>
    </div>
</template>

    <script>
        export default {
            name: "Home"
        }
    </script>

    <style scoped>

    </style>
