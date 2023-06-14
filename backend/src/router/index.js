import {createRouter, createWebHistory} from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import passwordReset from "../views/passwordReset.vue";
import requestPassword from "../views/requestPassword.vue";
import Users from "../views/Users.vue";
import Orders from "../views/Orders.vue";
import Reports from "../views/Reports.vue";
import Products from "../views/Products/Products.vue";
import NotFound from "../views/NotFound.vue";
import Applayout from "../components/AppLayout.vue";
import store from "../store";
const  routes = [

        {
            path: '/',
            redirect: '/app'
        },
        {
        path:'/app',
        name:'app',
        redirect: '/app/dashboard',
        component:Applayout ,
        meta:{
            requiredAuth : true
        } ,

        children :[
            {
                path:'dashboard',
                name:'app.dashboard',
                component:Dashboard
            },
            {
                path:'users',
                name:'app.users',
                component:Users
            },
            {
                path:'products',
                name:'app.Products',
                component:Products
            },
            {
                path:'orders',
                name:'app.orders',
                component:Orders
            },
            {
                path:'reports',
                name:'app.reports',
                component:Reports
            },
        ]

    },
    {
        path:'/login',
        name:'login',
        component:Login,
        meta:{
            requiredGust : true
        } ,
    },

    {
        path:'/password-reset/:token',
        name:'passwordReset',
        component:passwordReset,
        meta:{
            requiredGust : true
        } ,
    },
    {
        path:'/request-password',
        name:'requestPassword',
        component:requestPassword,
        meta:{
            requiredGust : true
        } ,
    },
    {
        path:'/:pathMatch(.*)',
        name:'NotFound',
        component:NotFound,

    }
];

const router = createRouter({
    history:createWebHistory(),
    routes
});

router.beforeEach( (to  ,from ,next)=>{

 if(to.meta.requiredAuth && !store.state.user.token){
     next({name: 'login'})
 }else if(to.meta.requiredGust && store.state.user.token){
     next({name: 'app.dashboard'})
 }else{
        next();
    }
});

export  default router;

