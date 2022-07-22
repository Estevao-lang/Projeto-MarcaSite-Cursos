import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Inscricao from '../components/Inscricao';
import AddInscricao from '../components/AddInscricao';
import EditInscricao from '../components/EditInscricao';

import Cursos from '../components/Cursos ';
import AddCursos  from '../components/AddCursos ';
import EditCursos  from '../components/EditCursos ';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'Inscricao',
        path: '/Inscricao',
        component: Inscricao
    },
    {
        name: 'AddInscricao',
        path: '/Inscricao/add',
        component: AddBook
    },
    {
        name: 'EditInscricao',
        path: '/Inscricao/edit/:id',
        component: EditBook
    },
    {
        name: 'Cursos',
        path: '/Cursos',
        component: Cursos
    },
    {
        name: 'AddCursos',
        path: '/Cursos/add',
        component: AddCursos
    },
    {
        name: 'EditCursos',
        path: '/Cursos/edit/:id',
        component: EditCursos
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;