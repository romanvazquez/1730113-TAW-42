import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Components for routes

import Home from './pages/Visitantes/Home'
import LoginScreen from './pages/login'
import RegisterScreen from './pages/register'

import IndexScreen from './pages/Index'

import Empresas from './pages/empresas/list'
import EmpresaAdd from './pages/empresas/add'
import EmpresaEdit from './pages/empresas/add'

import Pages from './pages/page/list'
import PageAdd from './pages/page/add'

import PostCategoryAdd from './pages/postCategory/add.vue'
import PostCategoryEdit from './pages/postCategory/add.vue'
import PostCategoryList from './pages/postCategory/list.vue'

import PostAdd from './pages/post/add.vue'
import PostEdit from './pages/post/add.vue'
import PostList from './pages/post/list.vue'

import ProductCategoryAdd from './pages/productCategory/add.vue'
import ProductCategoryEdit from './pages/productCategory/add.vue'
import ProductCategoryList from './pages/productCategory/list.vue'

import ProductAdd from './pages/product/add.vue'
import ProductEdit from './pages/product/add.vue'
import ProductList from './pages/product/list.vue'

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/login',
        component: LoginScreen
    },
    {
        path: '/register/:tipo?',
        component: RegisterScreen
    },
    // Index Dashboard
    {
        path: '/dashboard',
        component: IndexScreen
    },
    // Empresas
    {
        path: '/empresa/add',
        component: EmpresaAdd
    },
    {
        path: '/empresa/edit/:id',
        component: EmpresaEdit
    },
    {
        path: '/empresas',
        component: Empresas
    },
    // Páginas
    {
        path: '/page/add',
        component: PageAdd
    },
    {
        path: '/page/edit/:id',
        component: PageAdd
    },
    {
        path: '/pages',
        component: Pages
    },
    // Posts
    {
        path: '/post/edit/:id',
        component: PostEdit
    },
    {
        path: '/posts',
        component: PostList
    },
    {
        path: '/post/add',
        component: PostAdd
    },
    // Categorías de Posts
    {
        path: '/blog/category/edit/:id',
        component: PostCategoryEdit
    },
    {
        path: '/blog/category',
        component: PostCategoryList
    },
    {
        path: '/blog/category/add',
        component: PostCategoryAdd
    },
    // Categorías de Productos
    {
        path: '/product/category/edit/:id',
        component: ProductCategoryEdit
    },
    {
        path: '/product/category',
        component: ProductCategoryList
    },
    {
        path: '/product/category/add',
        component: ProductCategoryAdd
    },
    // Productos
    {
        path: '/product/edit/:id',
        component: ProductEdit
    },
    {
        path: '/products',
        component: ProductList
    },
    {
        path: '/product/add',
        component: ProductAdd
    },

];

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    base: ADMIN_APP_ROUTE
})

export default router;