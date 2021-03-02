/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)
import VueFlashMessage from 'vue-flash-message';
Vue.use(VueFlashMessage);
import axios from 'axios';
import VueAxios from 'vue-axios';
import Vuex from 'vuex';
require('vue-flash-message/dist/vue-flash-message.min.css');


import App from './components/App.vue';
import Application from "./components/Application";
import Application2 from "./components/Application2";


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))




Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('application', require('./components/Application.vue').default);
Vue.component('application2', require('./components/Application2.vue').default);
Vue.component('App', require('./components/App.vue').default);

const router = new VueRouter({
    routes: [
        {
            path: '/',
            component: App,
            children: [
                {
                    path: '/', name: 'application', component: Application, meta: {title: 'Главная'}
                },      {
                    path: '/app', name: 'application2', component: Application2, meta: {title: 'Главная'}
                },
            ]
        }]
})


Vue.router = router;


router.beforeEach((to, from, next) => {
    if(to.meta.title!==undefined) {
        document.title = to.meta.title
    }
    next()
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: App,
    router
});

