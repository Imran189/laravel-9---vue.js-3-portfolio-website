<script setup>
import Base from "../layouts/baseLayout.vue";
</script>

<template>
    <div>
        <Base />
        <main class="main">
            <!-- Side Nav Dummy-->
            <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
                <section class="services section" id="services">
                    <div class="services_container">
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>Services</h1>
                            </div>
                            <div class="titlebar_item">
                                <div class="btn btn__open--modal">
                                    New Service
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
                                        placeholder="Search Service"
                                    />
                                </div>
                            </div>

                            <div class="service_table-heading">
                                <p>Title</p>
                                <p>Icon</p>
                                <p>Description</p>
                                <p>Actions</p>
                            </div>
                            <!-- item 1 -->
                            <div class="service_table-items">
                                <p>Backend Developer</p>
                                <button class="service_table-icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <p>
                                    Sapiente odit ut ipsam neque dolorum et.
                                    Officiis error dicta pariatur quidem. Saepe
                                    dignissimos et at error dolores asperiores.
                                    Earum id sed ratione ducimus enim voluptate
                                    praesentium.
                                </p>
                                <div>
                                    <button class="btn-icon success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn-icon danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- item 2 -->
                            <div class="service_table-items">
                                <p>Backend Developer</p>
                                <button class="service_table-icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <p>
                                    Sapiente odit ut ipsam neque dolorum et.
                                    Officiis error dicta pariatur quidem. Saepe
                                    dignissimos et at error dolores asperiores.
                                    Earum id sed ratione ducimus enim voluptate
                                    praesentium.
                                </p>
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
                    <!-------------- SERVICES MODAL --------------->
                    <div class="modal main__modal">
                        <div class="modal__content">
                            <span class="modal__close btn__close--modal"
                                >×</span
                            >
                            <h3 class="modal__title">Add Service</h3>
                            <hr class="modal_line" />
                            <br />
                            <div>
                                <p>Service Name</p>
                                <input type="text" class="input" />

                                <p>Icon Class</p>
                                <input type="text" class="input" />
                                <span style="color: #006fbb"
                                    >Find your suitable icon: Font Awesome</span
                                >

                                <p>Description</p>
                                <textarea cols="10" rows="5"></textarea>
                            </div>
                            <br />
                            <hr class="modal_line" />
                            <div class="model__footer">
                                <button
                                    class="btn mr-2 btn__close--modal"
                                    @click="closeModal()"
                                >
                                    Cancel
                                </button>
                                <button
                                    class="btn btn-secondary btn__close--modal"
                                >
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>
