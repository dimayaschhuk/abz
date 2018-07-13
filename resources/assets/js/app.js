
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import VueAxios from 'vue-axios';


import VueTreeNavigation from 'vue-tree-navigation';

import VueDragTree from 'vue-drag-tree'

var VueCookie = require('vue-cookie');
// Tell Vue to use the plugin
Vue.use(VueCookie);
Vue.component('vue-drag-tree', VueDragTree);
Vue.use(VueTreeNavigation);
Vue.use(VueAxios, axios);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('block_index', require('./components/block_index.vue'));


Vue.component('TreeBrowser', require('./components/TreeBrowser.vue'));

Vue.component('main_user', require('./components/Main_user.vue'));

Vue.component('image-input', require('./components/image-input.vue'));
Vue.component('menu_tree', require('./components/menu_tree.vue'));

const app = new Vue({
    el: '#app'
});
