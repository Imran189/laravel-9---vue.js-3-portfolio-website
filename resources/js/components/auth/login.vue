<script setup>
import axios from "axios";
import { reactive, ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

let form = reactive({
    email: "",
    password: "",
});

let error = ref("");

const login = async () => {
    await axios.post("/api/login", form).then((response) => {
        if (response.data.success) {
            localStorage.setItem("token", response.data.data.token);
            router.push("/admin/home");
        } else {
            error.value = response.data.message;
        }
    });
};
</script>

<template>
    <div class="login">
        <div class="formLogin">
            <p class="text-danger" v-if="error">{{ error }}</p>

            <form @submit.prevent="login">
                <input
                    class="input_auth"
                    type="email"
                    placeholder="Enter Your Email"
                    v-model="form.email"
                /><br /><br />
                <input
                    class="input_auth"
                    type="password"
                    placeholder="Enter Your Password"
                    v-model="form.password"
                /><br /><br />

                <input
                    type="submit"
                    value="Login"
                    class="input_auth submit"
                /><br />
            </form>
        </div>
    </div>
</template>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Courier New", Courier, monospace;
    font-size: 16px;
}
.login {
    padding: 0;
    margin: 0;
    width: 100%;
    height: 100%;
}
.formLogin {
    display: flex;
    margin-top: 200px;
    justify-content: center;
}

.input_auth {
    background: rgb(233, 227, 227);
    background-position: 0.5em 0.6em;
    border: none;
    padding: 0 0 0 4rem;
    margin: 0 0 1em 0;
    width: 20em;
    height: 2.8em;
    outline: none;
    transition: background-color 0.4s;
}
.input_auth:hover {
    background-color: rgb(193, 221, 212);
}
.input_auth:focus {
    background-color: wheat;
}
.submit {
    color: black;
    background: rgba(220, 220, 220, 1);
    padding: 0;
    margin: 0 0 0 75px;
    width: 10em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background-color 0.4s;
}
.submit:hover {
    background-color: aqua;
    color: rgb(2, 2, 2);
}
.text-danger {
    color: red;
    font-size: 20px;
}
</style>
