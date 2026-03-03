require('./bootstrap');

import Vue from 'vue'

import HelloWorld from './components/ExampleComponent.vue';
Vue.component('hello-world', HelloWorld);
// Vue.component('nie-table', Trombowyg);


const app = new Vue({
    el: '#main-content',
});

// import { createInertiaApp } from '@inertiajs/inertia-vue'
// createInertiaApp({
//   resolve: name => require(`./Pages/${name}`),
//   setup({ el, App, props, plugin }) {
//     Vue.use(plugin)

//     new Vue({
//       render: h => h(App, props),
//     }).$mount(el)
//   },
// })
