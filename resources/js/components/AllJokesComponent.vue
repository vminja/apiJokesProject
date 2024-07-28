<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4 my-3" v-for="card in data.jokes">
                <div class="card">
                    <div class="card-header" v-if="card.type=='twopart'">
                        {{ card.setup }}
                    </div>

                    <div class="card-body" v-if="card.type=='twopart'">
                        {{ card.delivery }}
                        <br>
                        <h6 class="card-subtitle my-2 text-body-secondary float-end">
                            {{ card.category}} joke.
                        </h6>
                    </div>
                    <div class="card-body" v-else>
                        {{ card.joke }}
                        <br>
                        <h6 class="card-subtitle my-2 text-body-secondary float-end">
                            {{ card.category}} joke.
                        </h6>
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
                data: 0,
            }
        },
        methods: {
            fetchAllJokes(){
                let th = this;

                axios.get('https://v2.jokeapi.dev/joke/Any?amount=9', {
                    }).then(response => {
                        console.log(response);
                        th.data = response.data;
                    }).catch(error => {
                        console.error(error);
                    });
            }
        },
        mounted() {
            this.fetchAllJokes();
        }
    }
</script>
