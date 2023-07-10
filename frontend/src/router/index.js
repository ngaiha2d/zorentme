import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/home.vue'

const routes = [
    {path: "/", name: 'Home', component: () => import("../components/home.vue")},
    {path: "/login",name: 'Login', component: () => import("../components/login.vue")},
    {path: "/register",name: 'Register', component: () => import("../components/register.vue")},
    {path: "/vendor-dashboard",name: 'VendorDashboard', component: () => import("../components/vendor/dashboard.vue")},
    {path: "/admin-dashboard",name: 'AdminDashboard', component: () => import("../components/admin/dashboard.vue")},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;