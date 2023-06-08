<template>
	<v-container fluid>
        <v-container fluid>
                <v-img src="src/assets/banners/home.jpg" />
        </v-container>
        <v-container fluid>
            <v-row no-gutters>
            <v-col
                cols="7"
            >
              <h3>Acerca</h3>
                <p class="italic">Hotel D'Ouro é um Hotel luxuoso e singular, com vistas magnificas sobre o Rio Douro e sobre a cidade do Porto. É considerado Patrimonio da Humanidade e faz parte da Rota do Românico.</p>
                <p >Hotel D'Ouro situa-se na zona Histórica da cidade do Porto onde estão as mais antigas Caves do Vinho do Porto. A zona envolvente proporciona um ambiente tranquilo e sereno dentro da cidade enobrecendo a sua estadia no Hotel com vistas deslumbrantes e panorâmicas sobre o Rio Douro.</p>
                <p>O Hotel tem quartos e suites espaçosos e serviços unicos. Destacam-se as provas de vinhos, os passeios de barco e roteiros pela cidade do Porto incluidos na rota do Românico.</p>  
             
            </v-col>
               <v-col
                cols="5"
                >
                 <v-img src="src/assets/misc/wine-glass.png" />
                 </v-col>
            </v-row>

        </v-container>

        <v-container fluid>
             <v-row no-gutters>
                    <h3>Porto Video</h3>
                    <video controls>
                    <source src="src/assets/videos/porto.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
             </v-row>
        </v-container>

    </v-container>

</template>
<script>
</script>