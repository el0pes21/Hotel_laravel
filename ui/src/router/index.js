// Composables
import { createRouter, createWebHistory } from 'vue-router'
import { nextTick } from 'vue'
const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    children: [
      {
        path: '',
        name: 'Home',
        meta: { title: 'Porto / Home' },
        component: () => import(/* webpackChunkName: "home" */ '@/views/Home.vue'),
      },
      {
        path: 'servicos',
        name: 'servicos',
        meta: { title: 'Porto / Serviços' },
        component: () => import(/* webpackChunkName: "servicos" */ '@/views/Servicos.vue'),
      },
      {
        path: 'colaboradores',
        name: 'colaboradores',
        meta: { title: 'Porto / Colaboradores' },
        component: () => import(/* webpackChunkName: "colaboradores" */ '@/views/Colaboradores.vue'),
      },
      {
        path: 'contactos',
        name: 'contactos',
        meta: { title: 'Porto / Contactos' },
        component: () => import(/* webpackChunkName: "contactos" */ '@/views/Contactos.vue'),
      }
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

router.afterEach((to, from) => {
  nextTick(() => {
      document.title = to.meta.title || DEFAULT_TITLE;
  });
});

export default router
