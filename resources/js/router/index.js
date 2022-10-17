import { createRouter, createWebHistory } from "vue-router";
import HomeAdminView from "../components/admin/home/index.vue";
import HomeIndexView from "../components/pages/home/index.vue";
import LoginView from "../components/auth/login.vue";

import notFound from "../components/notFound.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeIndexView,
        },
        {
            path: "/admin/home",
            name: "adminhome",
            component: HomeAdminView,
        },
        {
            path: "/admin/login",
            name: "LoginView",
            component: LoginView,
        },
        {
            path: "/:pathMatch(.*)*",
            name: "notfound",
            component: notFound,
        },
    ],
});

export default router;
