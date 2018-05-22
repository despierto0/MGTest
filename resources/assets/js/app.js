
import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');

Vue.component('tree-menu', require('./components/TreeMenu.vue'));
Vue.component('products', require('./components/Products.vue'));


const app = new Vue({
    el: '#app',
    data: {
        tree: {},
        category_id: 0
    },
    created: function () {
        axios.get('/api/category/tree')
            .then(response => {
                this.tree = response.data
            })
    },
    methods: {
        chooseCategory: function (category_id) {
            this.category_id = category_id;
        }
    }
});
