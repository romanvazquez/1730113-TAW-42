import Vue from 'vue'
import Router from 'vue-router'

import Sitio from '../js/components/Sitio'
import Home from '../js/components/Home'
import Shop from '../js/components/Shop'
import Product from '../js/components/Product'
import Blog from '../js/components/Blog'
Vue.use(Router)

export default new Router({
    routes: [
        { // Layout de cada página del sitio
            path: '/sitio',
            component: Sitio,
            children:[
                {
                    path:'/sitio',
                    component:Home,
                    name:'Home'
                },
                {
                    path:'/shop',
                    component:Shop,
                    name:'Shop'
                },
                {
                    path:'/product',
                    component:Product,
                    name:'Product'
                },
                {
                    path:'/blog',
                    component:Blog,
                    name:'Blog'
                },
            ]
        }
    ],
    mode: 'history'
})