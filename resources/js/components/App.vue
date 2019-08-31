<template>
    <div>
        <div v-if = "userLogin==true">
        <!-- <div v-if = "userLogin"> -->
        <!-- Fixed Sidebar Left -->
        <left-side-bar></left-side-bar>
        <!-- ... end Fixed Sidebar Left -->

        <!-- Fixed Sidebar Left -->
        <left-side-bar-fixed></left-side-bar-fixed>
        <!-- ... end Fixed Sidebar Left -->

        <!-- Fixed Sidebar Right-Responsive -->
        <right-side-bar></right-side-bar>
        <!-- ... end Fixed Sidebar Right-Responsive -->

        <!-- Header-BP -->
        <header-nav></header-nav>
        <!-- ... end Header-BP -->

        <!-- Responsive Header-BP -->
        <header-nav-responsive></header-nav-responsive>
        <!-- ... end Responsive Header-BP -->
        <!-- </div> -->
        <div class="header-spacer header-spacer-small"></div>
        <div class="mt-5">
            <!--Vue Router View Instance-->
            <router-view :key="$route.fullPath"></router-view>
        </div>
        </div>
        <div v-if="userLogin==0">
            <br>
            <div class="header-spacer"></div>
               <!-- Header-BP -->
        <HeaderBeforeLogin />
        <!-- ... end Header-BP -->
            <router-view :key="$route.fullPath"></router-view>
        </div>
    </div>
</template>

<script>
    import RightSideBar from "./layouts/RightSideBar";
    import LeftSideBar from "./layouts/LeftSideBar";
    import LeftSideBarFixed from "./layouts/LeftSideBarFixed";
    import HeaderNav from "./layouts/HeaderNav";
    import HeaderNavResponsive from "./layouts/HeaderNavResponsive";
    import HeaderBeforeLogin from "./layouts/HeaderBeforeLogin";

    export default {
        name: "App",
        userLevel : '',
        userLogin: false,
        components: {HeaderNavResponsive, HeaderNav, LeftSideBarFixed, LeftSideBar, RightSideBar, HeaderBeforeLogin},
        data() {
            return {
                app: APP
            }
        },
        mounted() {
            this.$nextTick(() => {
                let $sidebar = $('.fixed-sidebar');
                // Toggle aside panels
                $(".js-sidebar-open").on('click', function () {
                    var mobileWidthApp = $('body').outerWidth();
                    if (mobileWidthApp <= 560) {
                        $(this).closest('body').find('.popup-chat-responsive').removeClass('open-chat');
                    }

                    $(this).toggleClass('active');
                    $(this).closest($sidebar).toggleClass('open');
                    return false;
                });
            });
            
        },
        created() {
            this.userLogin = this.$store.getters.getLogin;
           
            // console.log('created');
            // console.log(this.userLogin);
        },
         watch: {
        '$route' (to, from) {
            if (to.name !='ll') {
                this.userLogin = this.$store.getters.getLogin;
               
            }
        }
    },
    }
</script>

<style scoped>

</style>
