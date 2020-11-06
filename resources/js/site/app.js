/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../foundation');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('booking-component', require('./components/BookingComponent').default);
Vue.component('phone-component', require('./components/PhoneComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

window.moment = require('moment');

// moment.updateLocale('en', {
//     months : [
//         "January", "February",
//         "March", "April", "May",
//         "June", "July", "August",
//         "September", "October", "Ноябрь",
//         "December"
//     ],
//     weekdaysShort : ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"]
// });

Vue.prototype.$moment = window.moment;
