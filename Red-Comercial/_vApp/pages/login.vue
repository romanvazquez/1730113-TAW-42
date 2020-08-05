<template>
  <v-container>
    
    <VisitanteAppBar/>

    <v-row class="justify-content-center align-center _90vh">
      <v-col cols="10" sm="10" md="8" lg="7" xl="7">
        <v-container>
          <v-card>

            <v-toolbar>
                <v-toolbar-title class="headline">
                  <v-icon left>mdi-account</v-icon>
                  Iniciar sesión
                </v-toolbar-title>
                <div class="flex justify-center justify-md-end"></div>
                <router-link to="/register/empresario" class="caption">
                    ¿No tienes una cuenta? Regístrate
                </router-link>
            </v-toolbar>

            <v-card-text class="pa-8">
              <v-form ref="loginForm" @submit.prevent="logIn" @reset="reset">
                
                <v-text-field outlined dense type="email" prepend-icon="mdi-email" label="E-Mail *" v-model="email" required
                :error-messages="emailErrors"
                @input="$v.email.$touch()"
                @blur="$v.email.$touch()">
                </v-text-field>
                  
                <v-text-field outlined dense type="password" prepend-icon="mdi-lock" label="Password *" v-model="password" required
                :error-messages="passwordErrors"
                @input="$v.password.$touch()"
                @blur="$v.password.$touch()">
                </v-text-field>

                <v-checkbox label="Mantenerme conectado" v-model="keep_active" color="success"></v-checkbox>

                <v-card-actions class="justify-center justify-md-end">
                  <v-btn type="reset" color="light">Limpiar</v-btn>
                  <v-btn type="submit" color="primary" :loading="loading">Ingresar</v-btn>
                </v-card-actions>
              </v-form>
            </v-card-text>
          </v-card>
        </v-container>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { validationMixin } from 'vuelidate' // Se importa Vuelidate para validar el formulario
import { required, email, minLength } from 'vuelidate/lib/validators' // Se importan los validadores necesarios

export default {

  mixins: [validationMixin],
  
  // Validaciones con Vuelidate
  validations: {
      email: { required, email },
      password: { required, minLength: minLength(6) },
  },

  data () {
    return {
      email: null,
      password: null,
      loading: false,
      keep_active: false,
    }
  },
  computed: {
    // Mensajes de error para agregar debajo de los campos de texto
    passwordErrors () {
      const errors = []
      if (!this.$v.password.$dirty) return errors
      !this.$v.password.minLength && errors.push('La contraseña debe tener por lo menos 6 caracteres.')
      !this.$v.password.required && errors.push('Este campo es obligatorio.')
      return errors
    },
    emailErrors () {
      const errors = []
      if (!this.$v.email.$dirty) return errors
      !this.$v.email.email && errors.push('Debes ingresar e-mail válido. Ej. nombre@servicio.com')
      !this.$v.email.required && errors.push('Este campo es obligatorio')
      return errors
    },
  },
  
  beforeCreate () {
    this.$store.commit('setDrawerVisibility', false);

    this.$axiosx.get('/empresario/check/login')
    .then((res) => {

       if (res.data.status == 'success') {
          
          this.$store.commit('setDrawerVisibility', true);
          this.$router.push('/pages')
       }

    })
  },

  methods: {
    // Limpia los campos
    reset () {
      this.$refs.loginForm.reset()
      this.email = ''
      this.password = ''
      this.keep_active = false
    },

    logIn () {

      if (this.$v.$anyError){ // Verificiar que no exista ningún error en el llenado del formulario
          this.$store.commit('snackbar', {
            status: 'error',
            text: 'Existen campos vacíos o no válidos. Por favor, ingrese los datos correctamente.'
          });
          return true;
      }

      this.loading = true;

      var data = {
          email: this.email,
          password: this.password,
          keep_active: this.keep_active
      };

      this.$axiosx.post('/empresario/login', data)
      .then((res) => {

          this.loading = false;

          if (res.data.status == 'success') {

            this.$store.commit('snackbar', {
              status: 'success',
              text: res.data.message
            });

            this.$store.commit('setDrawerVisibility', true);
            this.$router.push('/pages');
            return true;
          }

          this.$store.commit('snackbar', {
            status: 'error',
            text: res.data.message
          });

      }).catch((e) => {

        this.loading = false;

        var res = e.response;
        console.log(res);

      });
    }
  }
}
</script>
