import Vue from 'vue'
import Vuex from "vuex";
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        userLogin: USER ? true : false,
        userAccess: '',
        userState: '',
        userId: USER ? USER.id : '',
        userSlug: USER ? USER.slug : '',
        userName: USER ? USER.username : '',
        userEmail: USER ? USER.email : '',
        userImage: USER ? USER.image : '',
        userBackgroundImage: USER ? USER.background_image : '',
        userAbout: USER ? USER.about : '',
        userNickname: USER ? USER.nickname : '',
        userLevel: USER ? USER.level : '',
        userCampaign: USER ? USER.campaign : '',
        baseUrl: 'http://localhost:8000/',
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
        getUserEmail: state => {
            return state.userEmail;
        },
        getUserLevel: state => {
            return state.userLevel;
        },
        getUserImage: state => {
            if (state.userImage)
                return state.userImage;
            return '/users/thumbs/boy.png';
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
            state.userAbout = token;
        },
        setUserNickname(state, token) {
            state.userNickname = token;
        },
        setUserCampaign(state, token) {
            state.userCampaign= token;
        },
        removeAccess(state) {
            state.userLogin = false;
            state.userAccess = '';
            state.userState = '';
            state.userId = '';
            state.userSlug = '';
            state.userName = '';
            state.userEmail = '';
            state.userAbout = '';
            state.userNickname = '';
            state.userImage = '';
            state.userBackgroundImage = '';
        }

    },
    actions: {
        destroyAccess(context) {
            context.commit('removeAccess');
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
