import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Components for routes

import Pages from './pages/page/list'
import PageAdd from './pages/page/add'

import Empresas from './pages/empresas/list'
import EmpresaAdd from './pages/empresas/add'
import EmpresaEdit from './pages/empresas/add'

import PostCategoryAdd from './pages/postCategory/add.vue'
import PostCategoryEdit from './pages/postCategory/add.vue'
import PostCategoryList from './pages/postCategory/list.vue'

import PostAdd from './pages/post/add.vue'
import PostEdit from './pages/post/add.vue'
import PostList from './pages/post/index.vue'

// Vistas del sitio para visitantes
import Home from './pages/Visitantes/Home'
import RegisterScreen from './pages/register'
import LoginScreen from './pages/login'

import RegistrarEmpresa from './pages/RegistrarEmpresa'

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/register/:tipo?',
        component: RegisterScreen
    },
    {
        path: '/login',
        component: LoginScreen
    },
    
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
    }

];

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    base: ADMIN_APP_ROUTE
})

export default router;