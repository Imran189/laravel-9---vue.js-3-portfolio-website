import { createRouter, createWebHistory } from "vue-router";
import HomeAdminView from "../components/admin/home/index.vue";
import HomeIndexView from "../components/pages/home/index.vue";
import LoginView from "../components/auth/login.vue";
import AboutView from "../components/admin/about/index.vue";
import notFound from "../components/notFound.vue";
import AdminService from "../components/admin/service/index.vue";
import AdminSkills from "../components/admin/skills/index.vue";
import AdminEducation from "../components/admin/education/index.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeIndexView,
            meta: {
                requiresAuth: false,
            },
        },

        //admin pages
        {
            path: "/admin/home",
            name: "adminHome",
            component: HomeAdminView,
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/admin/about",
            name: "AboutView",
            component: AboutView,
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/admin/service",
            name: "AdminService",
            component: AdminService,
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/admin/skills",
            name: "AdminSkills",
            component: AdminSkills,
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/admin/education",
            name: "AdminEducation",
            component: AdminEducation,
            meta: {
                requiresAuth: true,
            },
        },
        //admin login
        {
            path: "/admin/login",
            name: "LoginView",
            component: LoginView,
            meta: {
                requiresAuth: false,
            },
        },

        {
            path: "/:pathMatch(.*)*",
            name: "notfound",
            component: notFound,
            meta: {
                requiresAuth: false,
            },
        },
    ],
});

router.beforeEach((to, form) => {
    if (to.meta.requiresAuth && !localStorage.getItem("token")) {
        return { name: "LoginView" };
    }

    if (to.meta.requiresAuth == false && localStorage.getItem("token")) {
        return { name: "adminHome" };
    }
});

export default router;
