/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('lesson', require('./components/LessonNotification.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.onload = (() => {
    var app = new Vue({
        el: '#app',
        data: {
            lessons: '',
        },
        created() {
            console.log(window.Laravel);
            if (window.Laravel.userId) {
                axios.post('/notification/lesson/notification').then(response => {
                    this.lessons = response.data;
                    console.log(response.data);
                });
                Echo.private('App.Models.User.' + window.Laravel.userId).notification((response) => {
                    data = {"data": response, 'created_at': response.lesson.created_at};
                    this.lessons.push(data);
                    console.log(response.lesson.created_at);
                });
            }
        }
    });
});
