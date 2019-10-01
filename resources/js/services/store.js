import Vue from 'vue'
import Vuex from "vuex";
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex);
const getJSONFromLocalStorage = (key) => {
    const value = window.localStorage.getItem(key);

    if (value === 'undefined' || value === 'null' || value === undefined || value === null) {
        return null;
    }
    else {
        return JSON.parse(value);
    }
};
export default new Vuex.Store({
    state: {
        userLogin: USER ? true : false,
        userAccess: '',
        userState: '',
        userId: getJSONFromLocalStorage('user').id,
        userSlug: getJSONFromLocalStorage('user').slug,
        name: getJSONFromLocalStorage('user').name ,
        userName: getJSONFromLocalStorage('user').name ,
        userEmail: getJSONFromLocalStorage('user').email ,
        userImage: getJSONFromLocalStorage('user').image ,
        userBackgroundImage: getJSONFromLocalStorage('user').background_image ,
        userAbout: getJSONFromLocalStorage('user').about ,
        userNickname: getJSONFromLocalStorage('user').nickname ,
        userLevel: getJSONFromLocalStorage('user').level ,
        userRole: getJSONFromLocalStorage('user').role ,
        userCampaign: getJSONFromLocalStorage('user').campaign ,
        baseUrl: 'http://localhost:8000/',
        isPost:'',
    },
    getters: {
        getLogin: state => {
            return state.userLogin;
        },
        getUrl: state => {
            return state.baseUrl;
        },
        getAccess: state => {
            return state.userAccess;
        },
        getUserState: state => {
            return state.userState;
        },
        getUserId: state => {
            return state.userId;
        },
        getUserName: state => {
            return state.userName;
        },
        getName: state => {
            return state.name;
        },
        getUserEmail: state => {
            return state.userEmail;
        },
        getUserLevel: state => {
            return state.userLevel;
        },
        getUserImage: state => {
            if (state.userImage)
                return state.userImage;
            return '/users/thumbs/user.png';
        },
        getUserBackgroundImage: state => {

            if (state.userBackgroundImage)
                return state.userBackgroundImage;

            return '/users/backgrounds/default.jpg'
        },
        getUserSlug: state => {
            return state.userSlug;
        },
        getUserAbout: state => {
            return state.userAbout;
        },
        getUserNickname: state => {
            return state.userNickname;
        },
        getUserCampaign: state => {
            return state.userCampaign;
        },
        getIsPost: state => {
            return state.isPost;
        },
    },
    mutations: {
        setLogin(state, token) {
            state.userLogin = token;
        },
        setAccess(state, token) {
            state.userAccess = token;
        },
        setUserState(state, token) {
            state.userState = token;
        },
        setUserId(state, token) {
            state.userId = token;
        },
        setUserSlug(state, token) {
            state.userSlug = token;
        },
        setUserEmail(state, token) {
            state.userEmail = token;
        },
        setUserName(state, token) {
            state.userName = token;
        },
        setName(state, token) {
            state.name = token;
        },
        setUserLevel(state, token) {
            state.userLevel = token;
        },
        setUserImage(state, token) {

            state.userImage = token;
        },
        setUserBackgroundImage(state, token) {

            state.userBackgroundImage = token;
        },
        setUserAbout(state, token) {
            console.log(token,'inuserabout');
            state.userAbout = token;
        },
        setUserNickname(state, token) {
            state.userNickname = token;
        },
        setUserCampaign(state, token) {
            state.userCampaign= token;
        },
        setIsPost(state, token) {
            state.isPost= token;
        },
        removeAccess(state, token) {
            console.log('inremoveaccess');
            state.userLogin = false;
            state.userAccess = token;
            state.userState = token;
            state.userId = token;
            state.userSlug = token;
            state.userName = token;
            state.userEmail = token;
            state.userAbout = token;
            state.userNickname = token;
            state.userImage = token;
            state.userBackgroundImage = token;
            state.name = token;
        }

    },
    actions: {
        destroyAccess(context) {
            context.commit('removeAccess', null);
        },

        // showMessage(message, type='success') {
        //      this.$toast.open({
        //             message: 'Please login to like',
        //             type: 'info'
        //             });
        // },


    },
    plugins: [createPersistedState({})],
});
