<template>
    <div class="homePage">
        <h1>Welcome to the home page website</h1>
        <router-link to="/admin/home">Admin dashboard</router-link><br />
        <router-link to="/admin/login">Admin login</router-link>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
.homePage {
    height: 100vh;
    text-align: center;
    background-color: rgb(187, 226, 213);
}
</style>
