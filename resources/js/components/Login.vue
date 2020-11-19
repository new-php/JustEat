<template>
    <div class="login-background">
        <form class="login-container" align="middle" @submit.prevent="login">
            <span class="login-label">Inicia sesión</span>
            <div class="form-errors" id="form-errors">
                <span>Lo sentimos, no hemos podido iniciar sesión. Introduce tus detalles de nuevo, o <a href="password/reset"><strong>resetea tu contraseña</strong></a></span>
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
            <input name="email" class="email-input" v-model="email" placeholder="Introduce tu email" type="email" required>
            <input name="password" class="email-input password-input" v-model="password" placeholder="Introduce contraseña" type="password" required>
            <a class="forgot-password-link" href="password/reset"><strong>¿Has olvidado tu contraseña?</strong></a>
            <div class="remember-me-container">
                <input type="checkbox" v-model="rememberme">
                <label class="remember-me-label" for="checkbox">Guardar sesión</label>
                <p class="remember-me-text">No lo marques si compartes ordenador</p>
            </div>
            <button id="login" type="submit" class="btn submit-button">
                <span class="submit-button-text"><strong>Inicia sesión</strong></span>
            </button>
            <span class="register">¿Nuevo en Just Eat? <a class="register-link" href="register"><strong>Crear cuenta</strong></a></span>
            <div class="privacy-tos">
                <span>Al crear la cuenta, aceptas nuestros <a class="privacy-tos-link" href="#"><strong>términos y condiciones</strong></a>. Por favor, lee nuestra <a class="privacy-tos-link" href="#"><strong>política de privacidad</strong></a> y nuestra <a class="privacy-tos-link" href="#"><strong>política de cookies</strong></a>.</span>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                email: "",
                password: "",
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
            login() {
                window.axios.post('oauth/token',
                    {
                        username: this.email,
                        password: this.password,
                        grant_type: process.env.MIX_PASSPORT_GRANT,
                        client_id: process.env.MIX_PASSPORT_CLIENT_ID,
                        client_secret: process.env.MIX_PASSPORT_CLIENT_SECRET,
                    },
                    {
                        'Accept': 'application/json',
                    }
                )
                .then(response => {
                    window.localStorage.setItem('auth_token', response.data.access_token);
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('auth_token');
                    window.axios.get('user')
                    .then(response => {
                        window.localStorage.setItem('username', response.data.data.name)
                        window.location.href = '/';
                    });
                })
                .catch((error) => {
                    window.localStorage.removeItem('auth_token')
                    $('#form-errors').addClass("form-errors-active");
                });
            }
        }
    };
</script>
