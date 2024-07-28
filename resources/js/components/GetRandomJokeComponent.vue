<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <select class="form-select form-select-lg" v-model="category">
                    <option disabled value="">Choose category</option>
                    <option value="Any">Any</option>
                    <option value="Programming">Programming</option>
                    <option value="Misc">Misc</option>
                    <option value="Dark">Dark</option>
                    <option value="Pun">Pun</option>
                    <option value="Spooky">Spooky</option>
                    <option value="Christmas">Christmas</option>
                </select>
            </div>
            <div class="col-6">
                <button @click="getJokeBtn" id="getJoke" class="btn btn-success btn-lg">Get joke</button>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 d-flex justify-content-center" v-if="loading">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center" v-if="!loading && Object.keys(data).length !== 0">
                <div class="card">
                    <div class="card-body" v-if="data.type == 'twopart'">
                        <h5 class="card-title">{{ data.setup }}</h5>
                        <p class="card-text">{{ data.delivery }}</p>
                    </div>
                    <div class="card-body" v-else>
                        <p class="card-text">{{ data.joke }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: {},
                category: "",
                loading: false
            }
        },
        methods: {
            getJokeBtn(){
                let th = this;

                if(th.category == ""){
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "You must select a category.",
                        confirmButtonColor: "#0d6efd",
                    });
                    return;
                }
                th.loading = true;
                axios.get('/getJoke', {
                    params: {
                        jokeCategory: this.category
                    }
                }).then(response => {
                    setTimeout(() => {
                        th.data = response.data;
                        th.loading = false;
                    }, 2000);
                }).catch(error => {
                    th.loading = false;
                    console.error(error);
                });
            }
        },
        mounted() {
        }
    }
</script>
