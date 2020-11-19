<template>
    <div class="login-background">
        <form class="login-container" align="middle" @submit.prevent="register">
            <span class="login-label">Regístrate en Just Eat</span>
            <div class="form-errors" id="form-errors">
                <span>Ya existe una cuenta para este email. <a href="/login"><strong>Inicia sesión</strong></a> o <a href="/password/reset"><strong>resetea tu contraseña</strong></a></span>
            </div>
            <a class="btn login-facebook">
                <div class="login-facebook-icon-container">
                    <img class="login-facebook-icon" src="storage/images/login-facebook.svg">
                </div>
                <div class="login-label-container">
                    <span class="login-facebook-label"><strong>Continuar con Facebook</strong></span>
                </div>
            </a>
            <a class="btn login-google">
                <div class="login-google-icon-container">
                    <img class="login-google-icon" src="storage/images/login-google.png">
                </div>
                <div class="login-label-container">
                    <span class="login-google-label"><strong>Continuar con Google</strong></span>
                </div>
            </a>
            <div class="separator">
                <hr>
            </div>
            <input class="email-input" v-model="email" placeholder="Introduce tu email" type="email" required>
            <input class="email-input password-input" v-model="password" placeholder="Introduce contraseña" type="password" required>
            <input class="email-input password-input" style="margin-top: 4px;" v-model="password_confirmation" placeholder="Confirmar contraseña" type="password" required>
            <div class="remember-me-container">
                <input type="checkbox" v-model="rememberme">
                <label class="remember-me-label" for="checkbox">Guardar sesión</label>
                <p class="remember-me-text">No lo marques si compartes ordenador</p>
            </div>
            <button type="submit" class="btn submit-button">
                <span class="submit-button-text"><strong>Inicia sesión</strong></span>
            </button>
            <div class="privacy-tos">
                <span>Al crear la cuenta, aceptas nuestros <a class="privacy-tos-link" href="#"><strong>términos y condiciones</strong></a>. Por favor, lee nuestra <a class="privacy-tos-link" href="#"><strong>política de privacidad</strong></a> y nuestra <a class="privacy-tos-link" href="#"><strong>política de cookies</strong></a>.</span>
            </div>
            <span class="register">¿Ya formas parte de Just Eat? <a class="register-link" href="/login"><strong>Inicia sesión</strong></a></span>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Register",
        data() {
            return {
                email: "",
                password: "",
                password_confirmation: "",
                rememberme: false,
            }
        },
        beforeCreate() {
            var token = window.localStorage.getItem('auth_token');
            if (token) {
                if (token !== undefined && token !== "undefined") {
                    window.location.href = "/";
                }
            }
        },
        methods: {
            register() {
                window.axios.post('register',
                    {
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                    },
                    {
                        'Accept': 'application/json',
                    }
                )
                .then(response => {
                    window.localStorage.setItem('auth_token', response.data.access_token);
                    window.localStorage.setItem('username', response.data.data.name);
                    window.location.href = '/';
                })
                .catch((error) => {
                    window.localStorage.removeItem('auth_token')
                    $('#form-errors').addClass("form-errors-active");
                });
            }
        }
    };
</script>
