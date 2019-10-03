import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/App';
import routes from './routes/routes';
import store from './services/store';
import VueSweetalert2 from 'vue-sweetalert2';

window.Vue=Vue;


import 'sweetalert2/dist/sweetalert2.min.css';
import 'vue-loading-overlay/dist/vue-loading.css';
import 'vue-toast-notification/dist/index.css';
import 'vue-multiselect/dist/vue-multiselect.min.css'

const sweetAlertOptions = {
    confirmButtonColor: '#e91d24',
    cancelButtonColor: '#aaa'
}
/**
 * @use Global vue components
 */
Vue.use(VueSweetalert2, sweetAlertOptions);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
//bootstrap vue
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

// over lay
// loading overlay
import 'vue-loading-overlay/dist/vue-loading.css';
import Loading from 'vue-loading-overlay';

Vue.use(Loading);
import ReadMore from './components/ReadMoreComponent';

// Vue.use(ReadMore);

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/index.css';
import Datepicker from 'vuejs-datepicker';

Vue.use(VueToast);
Vue.use(Datepicker);

import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'

// register globally
Vue.component('multiselect', Multiselect)
Vue.component('read-more', ReadMore)


import InfiniteLoading from 'vue-infinite-loading';

Vue.use(InfiniteLoading, { /* options */});

/**
 * @Global Axios global config
 * @type {{"X-Requested-With": string}}
 */
axios.defaults.headers.common = {'X-Requested-With': 'XMLHttpRequest'};
window.axios = axios;

/**
 * @Init Initializing vue router view
 * @type {VueRouter}
 */
const router = new VueRouter({
    routes: routes,
    hashbang: true,
    linkExactActiveClass: 'active',
    scrollBehavior: function(to, from, savedPosition) {
        if (to.hash) {
            return {selector: to.hash}
        } else {
            return {x: 0, y: 0}
        }
    },
});

router.beforeEach((to, from, next) => {
    if (!USER.last_login && to.name !== 'ChangePassword')
        return next('/change-password');
    else next();
});
console.log(store);
new Vue(Vue.util.extend({router, store}, App)).$mount('#app');

//validating router for
// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         console.log(store.getters.getLogin);
//         if (store.getters.getLogin != false) {
//             if (to.matched.some(record => record.meta.requiresUserLevel)) {
//                 if (store.getters.getUserLevel == 'admin') {
//                     next()
//
//                 } else {
//                     next({
//                         path: '/'
//                     })
//                 }
//             } else {
//                 next()
//             }
//
//         } else {
//             next({
//                 path: '/'
//             })
//         }
//     } else {
//         if (store.getters.getLogin != false) {
//             next({
//                 path: '/'
//             })
//         } else {
//             next()
//         }
//     }
// });
