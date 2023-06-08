<template>
<v-container fluid>
    <v-container fluid>
            <v-img src="src/assets/banners/colaboradores.jpg" />
    </v-container>
    <v-container>    
        <h3>O que irás ouvir se te juntares à nossa equipa .. </h3>
                <p >A motivação é essencial para manter os profissionais <mark>engajados e satisfeitos</mark></p>
        
        <v-list lines="two">
  <v-list-item
    v-for="(item,index) in items"
    :key="index"
    :title="item.title"
    :subtitle="item.subtitle"
  ></v-list-item>
</v-list>

    </v-container>       
</v-container>

</template>

<script>

import axios from 'axios'
export default {
    data: () => ({
      items: []
    }),
    mounted () {
      axios
        .get('http://localhost:3000/colaboradores')
        .then(response => {
          this.items = response.data
        })
      }
    }
</script>