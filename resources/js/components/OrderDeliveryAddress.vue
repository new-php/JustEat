<template>
    <div class="bg-white pt-4">
        <div class="delivery-address-container" align="middle">
            <div class="delivery-address-title">
                <span>Confirma los datos de entrega</span>
            </div>
            <div class="delivery-address-name">
                <span>¿No eres {{username}}? <a class="change-user-link" href="#"><strong>Cambia de usuario</strong></a>
                </span>
            </div>
            <div class="delivery-address-label-container">
                <label class="delivery-address-label" for="Name">Nombre</label>
            </div>
            <div class="form-square">
                <input class="form-input form-square-text" data-val="true" data-val-length="Longitud máxima de 100" data-val-length-max="100" data-val-required="Introduce tu nombre completo" data_test_id="Name" id="Name" maxlength="100" name="Name" :placeholder="username" type="text" :value="username">
            </div>
            <div class="delivery-address-label-container">
                <label class="delivery-address-label" for="Name">Teléfono</label>
            </div>
            <div class="form-square">
                <input class="form-input form-square-text" data-val="true" data-val-length="Longitud máxima de 15" data-val-length-max="15" data_test_id="Phone" id="Phone" maxlength="15" name="Phone"   placeholder="Teléfono" type="tel">
            </div>
            <div class="delivery-address-label-container">
                <label class="delivery-address-label" for="Name">Dirección</label>
            </div>
            <div class="form-square">
                <input class="form-input form-square-text" data-val="true" data-val-length="Longitud máxima de 200" data-val-length-max="200" data_test_id="line1" id="Address_Lines_Line1" maxlength="200" name="Address.Lines.Line1"   placeholder="Dirección" type="text">
            </div>
            <div class="form-square">
                <input class="form-input form-square-text" data-val="true" data-val-length="Longitud máxima de 200" data-val-length-max="200" data_test_id="line2" id="Address_Lines_Line2" maxlength="200" name="Address.Lines.Line2"   placeholder="Piso y puerta (Ej: Entresuelo B)" type="text">
            </div>
            <div class="form-square">
                <input class="form-input form-square-text" data-val="true" data-val-length="Longitud máxima de 200" data-val-length-max="200" data_test_id="line3" id="Address_Lines_Line3" maxlength="200" name="Address.Lines.Line3"   placeholder="Observaciones (Ej: Timbre 254)" type="text">
            </div>
            <div class="delivery-address-label-container">
                <label class="delivery-address-label" for="Name">Ciudad</label>
            </div>
            <div class="form-square">
                <input class="form-input form-square-text" data-val="true" data-val-length="Longitud máxima de 50" data-val-length-max="50" data_test_id="city" id="City" maxlength="50" name="City"   placeholder="Ciudad" type="text">
            </div>
            <div class="delivery-address-label-container">
                <label class="delivery-address-label" for="Name">Código Postal</label>
            </div>
            <div class="form-square">
                <input class="form-input form-square-text" data-val="true" data-val-length="Longitud máxima de 15" data-val-length-max="15" data_test_id="zipcode" id="ZIP_Code" maxlength="15" name="Zip.Code"   placeholder="Código postal (Ej: 08002)" type="text">
            </div>
                <button type="submit" class="btn btn-primary btn-block button" autocomplete="off">Continuar</button>
            </div>
        </div>
    </div>

</template>

<script>
  export default {
    name: "OrderDeliveryAddress",
    data() {
        return {
            username: 'Marc Soler Bages'
        }
    },
    mounted() {
        console.log("Example component mounted");
    },
    methods: {

    },
    computed: {
        username: function() {
            var username = window.localStorage.getItem('username');
            if (username && username !== undefined && username !== "undefined") {
                if (username != "null") {
                    return username
                } else {
                    return "Mi Cuenta";
                }
            }
        }
    }
  };
</script>
