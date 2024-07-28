
// require('./bootstrap');

import Vue from "vue";


import AllJokesComponent from './components/AllJokesComponent.vue';
import GetRandomJokeComponent from './components/GetRandomJokeComponent.vue';

Vue.component("all-jokes-component", AllJokesComponent);
Vue.component("get-random-component", GetRandomJokeComponent);



const app = new Vue({
    el: '#app',
});
