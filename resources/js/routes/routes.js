import Home from "../components/pages/Home";
import ChallengeDetails from "../components/pages/ChallengeDetails";
import Newsfeed from "../components/pages/Newsfeed";
import ProfileEuraka from "../components/pages/profile/ProfileEuraka";
import About from "../components/pages/profile/About";
import Friends from "../components/pages/profile/Friends";
import Activity from "../components/pages/profile/Activity";
import Notifications from "../components/pages/profile/Notifications";
import Photos from "../components/pages/profile/Photos";
import EditPersonalInformation from "../components/pages/profile/edit/EditPersonalInformation";
import ChangePassword from "../components/pages/profile/edit/ChangePassword";
import Badges from "../components/pages/badges/BadgesList";
import Contributors from "../components/pages/contributors/ContributorsList";
import Users from "../components/pages/contributors/UsersList";
import LoginPage from "../components/pages/login";
import PostChallenge from "../components/pages/challenges/PostChallenge";
import Approach from "../components/pages/Approach";
import Profile from "../components/pages/profile/profile";


export default [
    {
        name: 'Home',
        path: '/home',
        component: Home,
        meta : {
            requiresAuth: true,
            title: "Challenges"
        }
    },
    {
        name: 'ChallengeDetails',
        path: '/challenge-details/:id/:slug',
        component: ChallengeDetails,
         meta : {
            requiresAuth:true,
             title: "Challenge Details"
        }
    },
    {
        name: 'Newsfeed',
        path: '/',
        component: Newsfeed,
        meta : {
            requiresAuth:true,
            title: "News Feed"
        }
    },
    {
        name: 'ProfileEuraka',
        path: '/profile/:id/:slug',
        component: ProfileEuraka,
        meta : {
            requiresAuth:true,
            title: "Profile"
        }
    },
    {
        name: 'Profile',
        path: '/personal/:id/:slug',
        component: Profile,
        meta : {
            requiresAuth:true,
            title: "Profile"
        }
    },
    {
        name: 'About',
        path: '/about',
        component: About,
        meta : {
            requiresAuth:true,
            title: "About"
        }
    },
    {
        name: 'Friends',
        path: '/friends/:id',
        component: Friends,
        meta : {
            requiresAuth:true,
            title: "Friends"
        }
    },
    {
        name: 'Activity',
        path: '/activity/:id',
        component: Activity,
        meta : {
            requiresAuth:true,
            title: "Activity"
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
            title: "Top Contributors"
        }
    },
    {
        name: 'Users',
        path: '/users/:country_id',
        component: Users,
        meta : {
            title: "Contributors",
            requiresAuth:true,
        }
    },
    {
        name: 'EditPersonalInformation',
        path: '/edit-profile',
        component: EditPersonalInformation,
        meta : {
            requiresAuth:true,
            title: "Edit Profile"
        }
    },
    {
        name: 'ChangePassword',
        path: '/change-password',
        component: ChangePassword,
        meta : {
            requiresAuth:true,
            title: "Change Password"
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
            title: "Post Challenge"
        }
    },
    {
        name: 'Approach',
        path: '/approach',
        component: Approach,
        meta : {
            requiresAuth:true,
            title: "Approach"
        }
    },
    {
        name: 'profile',
        path: '/search/:id',
        component: Profile,
        meta : {
            requiresAuth:true,
            title: "Profile"
        }
    },

];

