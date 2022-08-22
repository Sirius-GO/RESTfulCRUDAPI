// Require Vue
window.Vue = require('vue').default;

// Register Vue Components
Vue.component('header-component', require('./components/HeaderComponent.vue').default);

// Initialize Vue
const app = new Vue({
    el: '#app',
});