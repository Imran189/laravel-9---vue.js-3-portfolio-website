<script setup>
import Base from "../layouts/baseLayout.vue";
import { onMounted, ref } from "vue";
import axios from "axios";

const projects = ref([]);
onMounted(async () => {
    getProjects();
});

const getProjects = async () => {
    let response = await axios.get("/api/get_all_projects");
    console.log("response", response);
    projects.value = response.data.projects;
};

const ourImage = (img) => {
    return "/img/" + img;
};
</script>

<template>
    <div>
        <Base />

        <!--==================== HEADER ====================-->

        <!--==================== MAIN ====================-->
        <main class="main">
            <!-- Side Nav Dummy-->
            <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
                <!--==================== PROJECTS ====================-->
                <section class="projects section" id="projects">
                    <div class="skills_container">
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>Projects</h1>
                            </div>
                            <div class="titlebar_item">
                                <div class="btn btn__open--modal">
                                    New Project
                                </div>
                            </div>
                        </div>

                        <div class="table">
                            <div class="table_filter">
                                <span class="table_filter-Btn">
                                    <i class="fas fa-ellipsis-h"></i>
                                </span>
                                <div>
                                    <ul class="table_filter-list">
                                        <li>
                                            <p
                                                class="table_filter-link table_filter-link--active"
                                            >
                                                All
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="table_search">
                                <div class="table_search-wrapper">
                                    <select
                                        class="table_search-select"
                                        name=""
                                        id=""
                                    >
                                        <option value="">Filter</option>
                                    </select>
                                </div>
                                <div class="relative">
                                    <i
                                        class="table_search-input--icon fas fa-search"
                                    ></i>
                                    <input
                                        class="table_search--input"
                                        type="text"
                                        placeholder="Search Project"
                                    />
                                </div>
                            </div>

                            <div class="project_table-heading">
                                <p>Image</p>
                                <p>Title</p>
                                <p>Description</p>
                                <p>Link</p>
                                <p>Actions</p>
                            </div>
                            <!-- item 1 -->
                            <div
                                class="project_table-items"
                                v-for="item in projects"
                                :key="item.id"
                            >
                                <p>
                                    <img
                                        :src="ourImage(item.photo)"
                                        class="project_img-list"
                                    />
                                </p>
                                <p>{{ item.title }}</p>
                                <p>{{ item.description }}</p>
                                <p>{{ item.link }}</p>
                                <div>
                                    <button class="btn-icon success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn-icon danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!--===================ADD PROJECT =================
                <section class="about section" id="project">
                    <div class="about_container">
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>Add Project</h1>
                            </div>
                            <div class="titlebar_item">
                                <div class="btn btn-secondary">
                                    Save Project
                                </div>
                            </div>
                        </div>
                        <div class="card_wrapper">
                            <div class="wrapper_left">
                                <div class="card">
                                    <p>Title</p>
                                    <input type="text" class="input" />

                                    <p>Description</p>
                                    <textarea cols="10" rows="5"></textarea>

                                    <p>Link</p>
                                    <input type="text" class="input" />
                                </div>
                            </div>

                            <div class="wrapper_right">
                                <div class="card">
                                    <div class="project_img-container">
                                        <img
                                            src="/assets/img/avatar.jpg"
                                            alt=""
                                            class="project_img"
                                        />
                                    </div>
                                    <br />
                                    <input type="file" id="fileimg" />
                                    <br /><br /><br />
                                </div>
                            </div>
                        </div>
                        <div class="titlebar">
                            <div class="titlebar_item"></div>
                            <div class="titlebar_item">
                                <div class="btn btn-secondary">
                                    Save Project
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                ===-->
            </div>
        </main>
    </div>
</template>

<style></style>
