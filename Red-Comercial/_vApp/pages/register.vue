<template>
    <v-container id="main">

        <VisitanteAppBar/>

        <v-row class="justify-center align-center">
            <v-col cols="10" sm="10" md="8" lg="7" xl="6">
                <v-container>
                    <v-card>

                        <v-toolbar>
                            <v-toolbar-title class="headline">
                                <v-icon left>mdi-account</v-icon>
                                Regístrate
                            </v-toolbar-title>
                            <div class="flex justify-center justify-md-end"></div>
                            <router-link to="/login" class="caption">
                                Ya tengo una cuenta
                            </router-link>
                        </v-toolbar>

                        <v-card-text class="pa-8">
                            <v-form ref="registerForm" @submit.prevent="register" @reset="reset">
                                
                                <v-row>
                                    <v-col cols="12" sm="6">
                                        <v-text-field type="text" label="Nombre(s)*" outlined dense v-model="form.nombres" required
                                        :error-messages="nombresErrors"
                                        @input="$v.form.nombres.$touch()"
                                        @blur="$v.form.nombres.$touch()">
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-text-field type="text" label="Apellido(s)*" outlined dense v-model="form.apellidos" required
                                        :error-messages="apellidosErrors"
                                        @input="$v.form.apellidos.$touch()"
                                        @blur="$v.form.apellidos.$touch()">
                                        </v-text-field>
                                    </v-col>
                                </v-row>

                                <v-row>
                                    <v-col cols="12" sm="6">
                                        <v-text-field type="tel" label="Teléfono *" outlined dense v-model="form.telefono" required
                                        :error-messages="telefonoErrors"
                                        @input="$v.form.telefono.$touch()"
                                        @blur="$v.form.telefono.$touch()">
                                        </v-text-field>
                                    </v-col>
                                    
                                    <v-col cols="12" sm="6" class="mt-n9">
                                        <v-radio-group label="Seleccione su sexo *" v-model="form.sexo">
                                            <v-radio label="Hombre" value="H"></v-radio>
                                            <v-radio label="Mujer" value="M"></v-radio>
                                        </v-radio-group>
                                    </v-col>
                                </v-row>

                                <v-row>
                                    <v-col cols="12" sm="6">
                                        <v-text-field type="email" label="Correo electrónico *" outlined dense v-model="form.email" required
                                        :error-messages="emailErrors"
                                        @input="$v.form.email.$touch()"
                                        @blur="$v.form.email.$touch()">
                                        </v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="6">
                                        <v-menu ref="menu" v-model="menu" :close-on-content-click="false" transition="scale-transition" offset-y min-width="290px">
                                            <template v-slot:activator="{ on, attrs }">
                                                
                                                <v-text-field v-model="form.fecha_nacimiento" label="Seleccione su fecha de nacimiento" outlined dense append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"
                                                :error-messages="fechaNacimientoErrors"
                                                @input="$v.form.fecha_nacimiento.$touch()"
                                                @blur="$v.form.fecha_nacimiento.$touch()">
                                                </v-text-field>

                                            </template>
                                            <v-date-picker ref="picker" v-model="form.fecha_nacimiento" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01" @change="save"></v-date-picker>
                                        </v-menu>
                                    </v-col>
                                </v-row>

                                <v-row>
                                    <v-col cols="12" sm="6">
                                        <v-text-field type="password" label="Contraseña *" outlined dense v-model="form.password" required
                                        :error-messages="passwordErrors"
                                        @input="$v.form.password.$touch()"
                                        @blur="$v.form.password.$touch()">
                                        
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-text-field type="password" label="Confirmar contraseña *" outlined dense v-model="form.password_confirmation" required
                                        :error-messages="confirmPasswordErrors"
                                        @input="$v.form.password_confirmation.$touch()"
                                        @blur="$v.form.password_confirmation.$touch()">

                                        </v-text-field>
                                    </v-col>
                                </v-row>

                                <v-card-actions class="justify-center justify-md-end">
                                    <v-btn type="reset" color="light">Limpiar</v-btn>
                                    <v-btn type="submit" color="primary" :loading="loading">Registrar</v-btn>
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
import { required, numeric, email, minLength, maxLength, sameAs } from 'vuelidate/lib/validators' // Se importan los validadores necesarios

export default {

    mixins: [validationMixin],

    // Vuelidate form validations
    validations: {
        form: {
            nombres: { required, minLength: minLength(2) },
            apellidos: { required, minLength: minLength(2) },
            telefono: { required, numeric, minLength: minLength(7), maxLength: maxLength(10) },
            email: { required, email },
            fecha_nacimiento: { required },
            password: { required, minLength: minLength(6) },
            password_confirmation: { sameAsPassword: sameAs('password') }
        },
    },

    data() {
      return {
        form: {
            nombres: null,
            apellidos: null,
            telefono: null,
            fecha_nacimiento: null,
            sexo: 'H',
            email: null,
            password: null,
            password_confirmation:null
        },
        tipo: this.$route.params.tipo,
        loading: false,
        menu: false,
      }
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
    
    created () {        
        // Si la URL tiene en su parámetro el valor empresario dejarla como tal. En caso contrario, asignarlo como un empleado
        this.tipo == 'empresario' ? this.tipo : this.tipo = 'usuario';
    },

    computed: {
        nombresErrors () {
            const errors = []
            if (!this.$v.form.nombres.$dirty) return errors
            !this.$v.form.nombres.minLength && errors.push('Ingresa por lo menos 2 caracteres válidos.')
            !this.$v.form.nombres.required && errors.push('Este campo es obligatorio')
            return errors
        },
        apellidosErrors () {
            const errors = []
            if (!this.$v.form.apellidos.$dirty) return errors
            !this.$v.form.apellidos.minLength && errors.push('Ingresa por lo menos 2 caracteres válidos.')
            !this.$v.form.apellidos.required && errors.push('Este campo es obligatorio')
            return errors
        },
        telefonoErrors () {
            const errors = []
            if (!this.$v.form.telefono.$dirty) return errors
            !this.$v.form.telefono.numeric && errors.push('Ingresa sólo valores numéricos.')
            !this.$v.form.telefono.minLength && errors.push('Ingresa por lo menos 7 dígitos.')
            !this.$v.form.telefono.maxLength && errors.push('Evita exceder los 10 dígitos.')
            !this.$v.form.telefono.required && errors.push('Este campo es obligatorio')
            return errors
        },
        fechaNacimientoErrors () {
            const errors = []
            if (!this.$v.form.fecha_nacimiento.$dirty) return errors
            !this.$v.form.fecha_nacimiento.required && errors.push('Este campo es obligatorio')
            return errors
        },
        emailErrors () {
            const errors = []
            if (!this.$v.form.email.$dirty) return errors
            !this.$v.form.email.email && errors.push('Ingresar e-mail válido. Ej. nombre@servicio.com')
            !this.$v.form.email.required && errors.push('Este campo es obligatorio')
            return errors
        },
        passwordErrors () {
            const errors = []
            if (!this.$v.form.password.$dirty) return errors
            !this.$v.form.password.minLength && errors.push('La contraseña debe tener por lo menos 6 caracteres.')
            !this.$v.form.password.required && errors.push('Este campo es obligatorio.')
            return errors
        },
        confirmPasswordErrors () {
            const errors = []
            if (!this.$v.form.password_confirmation.$dirty) return errors
            !this.$v.form.password_confirmation.sameAsPassword && errors.push('La contraseña debe coincidir.')
            return errors
        },
    },
    watch: {
        menu (val) {
            val && setTimeout(() => (this.$refs.picker.activePicker = 'YEAR'))
        },
    },
    methods: {
         // Limpia los campos
        reset () {
            this.$refs.registerForm.reset()
            this.email = ''
            this.password = ''
            this.keep_active = false
        },

        // Guarda la fecha seleccionada del DatePicker en Data
        save (date) {
            this.$refs.menu.save(date)
        },

        // Registrar en la base de datos el usuario:
        register(evt){
            this.loading = true;

            if (this.$v.form.$anyError){ // Verificiar que no exista ningún error en el llenado del formulario
                this.$store.commit('snackbar', {
                    status: 'Error',
                    text: 'Existen campos vacíos o no válidos. Por favor, ingrese los datos correctamente.'
                });
                return true;
            }

            var data = {
                nombres: this.form.nombres,
                apellidos: this.form.apellidos,
                telefono: this.form.telefono,
                fecha_nacimiento: this.form.fecha_nacimiento,
                sexo: this.form.sexo,
                email: this.form.email,
                password: this.form.password,
                password_confirmation: this.form.password_confirmation,

                tipo: this.tipo
            };

            console.log(data);

            // Enviar la data al controlador a través de la siguiente ruta post
            this.$axiosx.post('/empresario/register', data)
            .then((res) => {

                this.loading = false;

                if (res.data.status == 'success') {

                    this.$store.commit('snackbar', {
                    status: 'success',
                    text: res.data.message
                    });
                    
                    this.$store.commit('setDrawerVisibility', true);
                    this.$router.push('/login');
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