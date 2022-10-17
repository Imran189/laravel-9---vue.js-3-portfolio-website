<template>
    <div>
        <h1>Welcome to admin overview dashboard</h1>
        <router-link to="/">Home Page</router-link>
        <button @click="logout">Log out</button>
    </div>
</template>

<script setup>
import { useRouter } from "vue-router";

const router = useRouter();

const logout = () => {
    localStorage.removeItem("token");
    router.push("/");
    console.log("token");
};
</script>

<style></style>
