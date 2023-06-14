<template>
  <div>
    <v-form ref="contactForm" @submit.prevent="submitHandler">
        
        <v-container class="mt-4">
            <v-row class="mb-4">
                <p>Entre em contacto connosco: </p>
            </v-row>
            <v-row>
                <v-text-field
                    v-model="firstname"
                    :rules="nameRules"
                    :counter="10"
                    label="Primeiro Nome"
                    required
                ></v-text-field>
            </v-row>
            <v-row>
                <v-text-field
                    v-model="lastname"
                    :rules="nameRules"
                    label="Último Nome"
                    required
                ></v-text-field>
            </v-row>
            <v-row>
                <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    required
                ></v-text-field>
            </v-row>
             <v-row>
                <v-textarea
                    v-model="message"
                    :rules="messageRules"
                    label="Mensagem"
                    required
                ></v-textarea>
            </v-row>
            <v-btn  type="submit" class="mt-2" >Enviar</v-btn>
    </v-container>
    </v-form>



    
  </div>
</template>
<script>
import axios from 'axios'
  export default {
    data: () => ({
      valid: false,
      firstname: '',
      lastname: '',      
      nameRules:[],
      email: '',
      emailRules:[],
      message: '',
      messageRules: []
    }),
    methods: {
      submitHandler () {      
        this.nameRules = [
            value => {
            if (value) return true
            return 'O primeiro e último nome são obrigatórios.'
            },
            value => {
            if (value?.length <= 10) return true

            return 'O nome deve ter menos de 10 caracteres.'
            },
        ]
        this.emailRules =  [
            value => {
            if (value) return true

            return 'O e-mail é obrigatório.'
            },
            value => {
            if (/.+@.+\..+/.test(value)) return true

            return 'O e-mail tem de ser válido.'
            },
        ]
        this.messageRules = [ 
            value => {
            if (value) return true
            return 'É obrigatória a introdução de uma mensagem.'
            },
        ]
        
        this.$nextTick(() => {
            this.$refs.contactForm.validate().then( (response) => 
            {
                if (response.valid) {
                    axios.post('http://localhost:3000/contacts', {
                        firstName: this.firstname,
                        lastName: this.lastname,
                        email: this.email,
                        message: this.message
                    })
                    .then(function (response) {
                        alert('Mensagem enviada com Sucesso!')
                    })
                    .catch(function (error) {
                        alert('Ocorreu um erro ao enviar a mensagem!')
                    });
                }
            })
        })

      }
    },  
  }
</script>