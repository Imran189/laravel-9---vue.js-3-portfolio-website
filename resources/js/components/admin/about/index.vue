<script setup>
import BaseLayout from "../layouts/baseLayout.vue";
import { onMounted, ref } from "vue";
import axios from "axios";

let form = ref({
    name: "",
    photo: "",
    email: "",
    phone: "",
    address: "",
    description: "",
    tagline: "",
    cv: "",
});

onMounted(async () => {
    getAbout();
});

const getAbout = async () => {
    let response = await axios.get("/api/edit_about");
    form.value = response.data;
    console.log(response);
};

const getPhoto = () => {
    let photo = "/img/avatar.png";
    if (form.value.photo) {
        if (form.value.photo.indexOf("base64") != -1) {
            photo = form.value.photo;
        } else {
            photo = "/img/upload/" + form.value.photo;
        }
    }
    return photo;
};

const changePhoto = (e) => {
    let file = e.target.files[0];
    let reader = new FileReader();
    let limit = 1024 * 1024 * 2;

    if (file["size"] > limit) {
    }
};
</script>

<template>
    <div>
        <BaseLayout />
        <main class="main">
            <!-- Side Nav Dummy-->
            <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
                <!--==================== ABOUT ====================-->
                <section class="about section" id="about">
                    <div class="about_container">
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>About Us</h1>
                            </div>
                            <div class="titlebar_item">
                                <div class="btn btn-secondary">
                                    Save Changes
                                </div>
                            </div>
                        </div>
                        <div class="card_wrapper">
                            <div class="wrapper_left">
                                <div class="card">
                                    <p>Full Name</p>
                                    <input
                                        type="text"
                                        class="input"
                                        v-model="form.name"
                                    />

                                    <p>Email</p>
                                    <input
                                        type="email"
                                        class="input"
                                        v-model="form.email"
                                    />

                                    <p>Phone</p>
                                    <input
                                        type="text"
                                        class="input"
                                        v-model="form.phone"
                                    />

                                    <p>Address</p>
                                    <input
                                        type="text"
                                        class="input"
                                        v-model="form.address"
                                    />

                                    <p>Description</p>
                                    <textarea
                                        cols="10"
                                        rows="5"
                                        v-model="form.description"
                                    ></textarea>
                                </div>
                                <div class="card">
                                    <p>Tagline</p>
                                    <input
                                        type="text"
                                        class="input"
                                        v-model="form.tagline"
                                    />
                                </div>
                            </div>

                            <div class="wrapper_right">
                                <div class="card">
                                    <div class="avatar_profile">
                                        <img
                                            :src="getPhoto()"
                                            class="avatar_profile_img"
                                        />
                                    </div>
                                    <input
                                        type="file"
                                        id="fileimg"
                                        @change="changePhoto()"
                                    />
                                </div>
                                <div class="card">
                                    <p>CV</p>
                                    <input type="file" id="filecv" />
                                </div>
                            </div>
                        </div>
                        <div class="titlebar">
                            <div class="titlebar_item"></div>
                            <div class="titlebar_item">
                                <div class="btn btn-secondary">
                                    Save Changes
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>

<style></style>
