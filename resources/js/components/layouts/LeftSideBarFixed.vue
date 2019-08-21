<template>
    <div class="fixed-sidebar fixed-sidebar-responsive">

        <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
            <a href="#" class="logo js-sidebar-open">
                <img :src="`assets/img/eureka/eureka-logo.png`" alt="Eureka">
            </a>

        </div>

        <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
            <a href="#" class="logo">
                <div class="img-wrap">
                    <img :src="`assets/img/eureka/eureka-logo.png`" alt="Eureka">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">eureka</h6>
                </div>
            </a>

            <div class="mCustomScrollbar" data-mcs-theme="dark">

                <div class="control-block">`
                    <div class="author-page author vcard inline-items">
                        <div class="author-thumb">
                            <img alt="author" :src="`assets/img/author-page.jpg`" class="avatar">
                            <span class="icon-status online"></span>
                        </div>
                        <a href="#" class="author-name fn">
                            <div class="author-title">
                                James Spiegel
                                <svg class="olymp-dropdown-arrow-icon">
                                    <use
                                        :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon`"></use>
                                </svg>
                            </div>
                            <span class="author-subtitle">SPACE COWBOY</span>
                        </a>
                    </div>
                </div>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">MAIN SECTIONS</h6>
                </div>

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

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">YOUR ACCOUNT</h6>
                </div>

                <ul class="account-settings">
                    <li>
                        <a href="#">

                            <svg class="olymp-menu-icon">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-menu-icon`"></use>
                            </svg>

                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                 data-original-title="FAV PAGE">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-star-icon`"></use>
                            </svg>

                            <span>Create Fav Page</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg class="olymp-logout-icon">
                                <use
                                    :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-logout-icon`"></use>
                            </svg>

                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">About Olympus</h6>
                </div>

                <ul class="about-olympus">
                    <li>
                        <a href="#">
                            <span>Terms and Conditions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>FAQs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Careers</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LeftSideBarFixed"
    }
</script>

<style scoped>

</style>
