/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('apilogin-component', require('./components/ApiLoginComponent.vue').default);
Vue.component('apinav-component', require('./components/ApiNavComponent.vue').default);

Vue.component('listcategoriesapi-component', require('./components/ApiListCategoriesComponent.vue').default);
Vue.component('addbookapi-component', require('./components/ApiAddBookComponent.vue').default);
Vue.component('addcategoriesapi-component', require('./components/ApiAddCategoriesComponent.vue').default);
Vue.component('deletecategoriesapi-component', require('./components/ApiDeleteCategoriesComponent.vue').default);
Vue.component('listbookapi-component', require('./components/ApiListBookComponent.vue').default);
Vue.component('listcategoriesapi-component', require('./components/ApiListCategoriesComponent.vue').default);

Vue.component('addbook-component', require('./components/AddBookComponent.vue').default);
Vue.component('addcategories-component', require('./components/AddCategoriesComponent.vue').default);
Vue.component('deletecategories-component', require('./components/DeleteCategoriesComponent.vue').default);
Vue.component('listbook-component', require('./components/ListBookComponent.vue').default);
Vue.component('listcategories-component', require('./components/ListCategoriesComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app'
});
