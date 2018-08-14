
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Test from './components/Test.vue'
import App from './components/App.vue'
const router = new VueRouter({
	mode:'history',
	routes:[
		{
			path:'/test',
		    component: Test,
			name:'test',
		}
	]
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});
