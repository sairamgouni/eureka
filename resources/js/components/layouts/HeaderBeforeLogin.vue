<template>
    <header class="header" id="site-header">

        <div class="page-title">
            <h6>Post Formats</h6>
        </div>

        <div class="header-content-wrapper">
            <form class="search-bar w-search notification-list friend-requests">
                <div class="form-group with-button">
                    <input class="form-control js-user-search" placeholder="Search here people or pages..."
                           type="text">
                    <button>
                        <svg class="olymp-magnifying-glass-icon">
                            <use
                                :xlink:href="`assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon`"></use>
                        </svg>
                    </button>
                </div>
            </form>

            <a href="#" class="link-find-friend">Find Friends</a>

            <div class="control-block">

             

              <router-link   to="/login" >
                    <a href="javascript:void(0);" class="btn btn-primary btn-md-1">Login</a>
              </router-link>  
                 

            </div>
        </div>



    </header>
</template>

<script>
    import Notifications from '../pages/sub-components/Notifications';
    import Events from '../pages/sub-components/Events';
    
    export default {
        name: "HeaderBeforeLogin",
        components: {
            Notifications,
            Events,
        },
         data() {
            return {
                userLogin: false,
            }
        },
        methods : {
            mounted() {

 
            }
        }

    }
</script>

<style scoped>

</style>
