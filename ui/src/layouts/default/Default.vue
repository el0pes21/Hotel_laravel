<template>
  <v-app id="hotels">

    <v-app-bar>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>
        <v-img width="54px" src="src/assets/misc/logo.png" />
      </v-toolbar-title>
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      temporary
    >
       <v-list>
         <v-list-item
            v-for="(item, index) in items"
            :key="index"
            :title="item.title"
            :to="item.route"
          ></v-list-item>
       </v-list>
    </v-navigation-drawer>

    <v-main class="bg-grey-lighten-2">
      <router-view />
    </v-main>

    <v-footer>Trabalho desenvolvido pelo Grupo dos 4 </v-footer>
  </v-app>
</template>

<script setup>
  import { ref } from 'vue'

  const drawer = ref(null)
</script>

<script>
export default {
    data: () => ({
      drawer: false,
      group: null,
      items: [
        {
          title: 'Home',
          route: '/',
        },
        {
          title: 'Serviços',
          route: '/servicos',
        },
        {
          title: 'Colaboradores',
          route: '/colaboradores',
        },
        {
          title: 'Contactos',
          route: '/contactos',
        },
      ],
    }),

    watch: {
      group () {
        this.drawer = false
      },
    },
  }
</script>
