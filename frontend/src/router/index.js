
import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/home.vue'
import { useAuthStore } from "../stores/auth";
import createItemvue from "../components/vendor/createItem.vue";


const routes = [
    {path: "/", name: 'Home', component: () => import("../components/home.vue")},
    {path: "/login",name: 'Login', component: () => import("../components/login.vue")},
    {path: "/register",name: 'Register', component: () => import("../components/register.vue")},

    {
        path: "/vendor-dashboard",
        name: 'VendorDashboard', 
        beforeEnter: async (to, from, next) => {
            const authStore = useAuthStore();
            if(!authStore.isAuthorized()){
                return next({
                    name: 'Home',
                    component: () => import("../components/home.vue")
                });
            }
            await authStore.getUser(); 
            const userData = authStore.user;
            if(userData.is_vendor == 0){
                return next({
                name: 'Home',
                component: () => import("../components/home.vue")
                });
            }
        next()
        },
        component: () => import("../components/vendor/dashboard.vue"),
        children:[
            {
                path:'createItem',
                name:'vendorCreateItem',
                component: () => import("../components/vendor/createItem.vue"),
            },
        ],
    },
    {
        path:'/createItem',
        component: () => import("../components/vendor/createItem.vue"),
    },
    {
        path: "/admin-dashboard",
        name: 'AdminDashboard', 
        component: () => import("../components/register.vue"),
    },
    {
        path: "/vendor-register",
        name: 'VendorRegistration', 
        component: () => import("../components/vendorRegister.vue")
    },   
    {
        path: "/product/:item_id", // Use a dynamic segment to capture the item_id
        name: "product_page",
        component: () => import("../components/productsPage/productPage.vue"),
        props: true,
    },  
    {
        path: "/checkout",
        name: 'checkout_page', 
        component: () => import("../components/productsPage/checkout.vue")
    },   
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;