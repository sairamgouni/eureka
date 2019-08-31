import Home from "../components/pages/Home";
import ChallengeDetails from "../components/pages/ChallengeDetails";
import Newsfeed from "../components/pages/Newsfeed";
import ProfileEuraka from "../components/pages/profile/ProfileEuraka";
import About from "../components/pages/profile/About";
import Friends from "../components/pages/profile/Friends";
import Notifications from "../components/pages/profile/Notifications";
import Photos from "../components/pages/profile/Photos";
import EditPersonalInformation from "../components/pages/profile/edit/EditPersonalInformation";
import ChangePassword from "../components/pages/profile/edit/ChangePassword";
import Badges from "../components/pages/badges/BadgesList";
import Contributors from "../components/pages/contributors/ContributorsList";
import Users from "../components/pages/contributors/UsersList";
import LoginPage from "../components/pages/login";
import PostChallenge from "../components/pages/challenges/PostChallenge";

export default [
    {
        name: 'Home',
        path: '/home',
        component: Home,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'ChallengeDetails',
        path: '/challenge-details/:id/:slug',
        component: ChallengeDetails,
         meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'Newsfeed',
        path: '/',
        component: Newsfeed,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'ProfileEuraka',
        path: '/profile/:id/:slug',
        component: ProfileEuraka,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'About',
        path: '/about',
        component: About,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'Friends',
        path: '/friends',
        component: Friends,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'Photos',
        path: '/photos',
        component: Photos,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'Badges',
        path: '/badges',
        component: Badges,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'Contributors',
        path: '/contributors',
        component: Contributors,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'Users',
        path: '/users',
        component: Users,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'EditPersonalInformation',
        path: '/edit-profile',
        component: EditPersonalInformation,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'ChangePassword',
        path: '/change-password',
        component: ChangePassword,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'Notifications',
        path: '/notifications',
        component: Notifications,
        meta : {
            requiresAuth:true,
        }
    },
    {
        name: 'LoginPage',
        path: '/login',
        component: LoginPage,
         meta : {
            requiresVisitor:true,
        }
    },
        {
        name: 'PostChallenge',
        path: '/post-challenge',
        component: PostChallenge,
        meta : {
            requiresAuth:true,
        }
    },
];

