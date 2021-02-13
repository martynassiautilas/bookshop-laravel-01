require('./bootstrap');
import Vue from 'vue'

import MultiselectComponent from './components/MultiselectComponent'

const app = new Vue({
    el: '#app',
    components: { MultiselectComponent }
});
