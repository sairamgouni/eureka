<template>
    <div class="fixed-sidebar">
        <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

            <!--                <a href="" class="logo">-->
            <router-link class="logo" to="/">
                <div class="img-wrap">
                    <img :src="`assets/img/eureka/eureka-logo.png`" alt="Eureka">
                </div>
            </router-link>
            <!--                </a>-->

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="left-menu">
                    <li>
                        <a href="#" class="js-sidebar-open">
                            <svg class="olymp-menu-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                 data-original-title="OPEN MENU">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-menu-icon`"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <router-link  to="/challenge-details" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="NEWSFEED">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-newsfeed-icon`"></use>
                            </svg>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/home" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="LIST">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-star-icon`"></use>
                            </svg>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/challenge-details" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="DETAILS">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-calendar-icon`"></use>
                            </svg>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/profile" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="PROFILE">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-calendar-icon`"></use>
                            </svg>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/badges" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="BADGES">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-badge-icon`"></use>
                            </svg>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/contributors" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="BADGES">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-badge-icon`"></use>
                            </svg>
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/users" class="nav-link">


                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="BADGES">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-badge-icon`"></use>
                            </svg>
                        </router-link>
                    </li>

                </ul>
            </div>
        </div>

        <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
            <a href="" class="logo">
                <div class="img-wrap">
                    <img :src="`assets/img/eureka/eureka-logo.png`" alt="Eureka">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">eureka</h6>
                </div>
            </a>

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="left-menu">
                    <li>
                        <a href="#" class="js-sidebar-open">
                            <svg class="olymp-close-icon left-menu-icon">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-close-icon`"></use>
                            </svg>
                            <span class="left-menu-title">Collapse Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="NEWSFEED">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-newsfeed-icon`"></use>
                            </svg>
                            <span class="left-menu-title">Newsfeed</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                 data-original-title="FAV PAGE">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-star-icon`"></use>
                            </svg>
                            <span class="left-menu-title">Fav Pages Feed</span>
                        </a>
                    </li>

                </ul>

                <div class="profile-completion">

                    <div class="skills-item">
                        <div class="skills-item-info">
                            <span class="skills-item-title">Profile Completion</span>
                            <span class="skills-item-count">
                            <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76"
                                  data-from="0"></span><span class="units">76%</span></span>
                        </div>
                        <div class="skills-item-meter">
                            <span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
                        </div>
                    </div>

                    <span>Complete <a href="#">your profile</a> so people can know more about you!</span>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LeftSideBar"
    }
</script>

<style scoped>

</style>
