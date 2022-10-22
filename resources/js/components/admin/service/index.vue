<script setup>
import Base from "../layouts/baseLayout.vue";
import { onMounted, ref } from "vue";
import axios from "axios";

let services = ref([]);

const showModal = ref(false);
const hideModal = ref(true);
const editMode = ref(false);

const form = ref({
    name: "",
    icon: "",
    description: "",
});
onMounted(async () => {
    getService();
});

const getService = async () => {
    let response = await axios.get("/api/get_all_service");
    //console.log("response", response);
    services.value = response.data.services;
};

const openModal = () => {
    showModal.value = !showModal.value;
};
const closeModal = () => {
    showModal.value = !hideModal.value;
    form.value = {};
    editMode.value = false;
};

const createService = async () => {
    await axios.post("/api/create_service", form.value).then((response) => {
        getService();
        closeModal();
        toast.fire({
            icon: "success",
            title: "Service added successfully",
        });
    });
};

const editModal = (service) => {
    editMode.value = true;
    showModal.value = !showModal.value;
    form.value = service;
};

const updateService = async () => {
    await axios
        .post("/api/update_service/" + form.value.id, form.value)
        .then((response) => {
            getService();
            closeModal();
            toast.fire({
                icon: "success",
                title: "Service Updated Successfully",
            });
        });
};

const deleteService = (id) => {
    Swal.fire({
        title: "Are you sure..?",
        text: "tou can't go back",
        icon: "Warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes,delete it",
    }).then((result) => {
        if (result.value) {
            axios.get("/api/delete_service/" + id).then(() => {
                Swal.fire("Delete", "Service delete Successfully", "success");
                getService();
            });
        }
    });
};
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
                                <div
                                    class="btn btn__open--modal"
                                    @click="openModal()"
                                >
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
                            <!-- items -->
                            <div
                                class="service_table-items"
                                v-for="item in services"
                                :key="item.id"
                            >
                                <p>{{ item.name }}</p>
                                <button class="service_table-icon">
                                    <i class="{{item.icon}}"></i>
                                </button>
                                <p>{{ item.description }}</p>

                                <div>
                                    <button
                                        class="btn-icon success"
                                        @click="editModal(item)"
                                    >
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button
                                        class="btn-icon danger"
                                        @click="deleteService(item.id)"
                                    >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------------- SERVICES MODAL --------------->
                    <div class="modal main__modal" :class="{ show: showModal }">
                        <div class="modal__content">
                            <span
                                class="modal__close btn__close--modal"
                                @click="closeModal()"
                                >×</span
                            >
                            <h3 class="modal__title" v-show="editMode == false">
                                Add Service
                            </h3>
                            <h3 class="modal__title" v-show="editMode == true">
                                update Service
                            </h3>
                            <hr class="modal_line" />
                            <br />
                            <form
                                @submit.prevent="
                                    !editMode.value
                                        ? updateService()
                                        : createService()
                                "
                            >
                                <div>
                                    <p>Service Name</p>
                                    <input
                                        type="text"
                                        class="input"
                                        v-model="form.name"
                                    />

                                    <p>Icon Class</p>
                                    <input
                                        type="text"
                                        class="input"
                                        v-model="form.icon"
                                    />
                                    <span style="color: #006fbb"
                                        >Find your suitable icon: Font
                                        Awesome</span
                                    >

                                    <p>Description</p>
                                    <textarea
                                        cols="10"
                                        rows="5"
                                        v-model="form.description"
                                    ></textarea>
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
                                        v-show="editMode == false"
                                    >
                                        Save
                                    </button>
                                    <button
                                        class="btn btn-secondary btn__close--modal"
                                        v-show="editMode == true"
                                    >
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>
