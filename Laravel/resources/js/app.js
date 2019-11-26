
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('registration-confirm', require('./components/RegistrationConfirm.vue'));
Vue.component('return-confirm', require('./components/ReturnConfirm.vue'));
Vue.component('update-confirm', require('./components/UpdateConfirm.vue'));
Vue.component('delete-confirm', require('./components/DeleteConfirm.vue'));

const app = new Vue({
    el: '#app',
});