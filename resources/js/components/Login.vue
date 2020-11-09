<template>
    <div class="login-background">
        <form class="login-container" align="middle">
            <span class="login-label">Inicia sesión</span>
            <div class="fb-login-button login-facebook" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width="276px" data-background="#465996;"></div>
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
            <input class="password-input" v-model="password" placeholder="Introduce contraseña" type="password" required>
            <a class="forgot-password-link" href="#"><strong>¿Has olvidado tu contraseña?</strong></a>
            <div class="remember-me-container">
                <input type="checkbox" v-model="rememberme">
                <label class="remember-me-label" for="checkbox">Guardar sesión</label>
                <p class="remember-me-text">No lo marques si compartes ordenador</p>
            </div>
            <button type="submit" class="btn submit-button">
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
    mounted() {

    },
    methods: {

    }
  };
</script>
