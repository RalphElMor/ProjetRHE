// router/index.js
import { createWebHistory, createRouter } from 'vue-router';

import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Register from '../pages/Register.vue';
import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';
import EditPieces from "../components/EditPieces.vue";
import AddPieces from "../components/AddPieces.vue";
import Pieces from "../components/Pieces.vue";

const routes = [
  { name: 'home', path: '/', component: Home },
  { name: 'about', path: '/about', component: About },
  { name: 'register', path: '/register', component: Register },
  { name: 'login', path: '/login', component: Login },
  { name: 'dashboard', path: '/dashboard', component: Dashboard },
  { name: 'pieces', path: '/pieces', component: Pieces },
  { name: 'addpieces', path: '/pieces/add', component: AddPieces },
  { name: 'editpieces', path: '/pieces/edit/:id', component: EditPieces },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
