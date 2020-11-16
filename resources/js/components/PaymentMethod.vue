<template>
    <div class="container">
        <div class="row" style="background:white">
            <div class="col-md-2">
            </div>
            <div class="col-md-4 buffer-title">
                <h3><b>¿Como te gustaría pagar?</b></h3>
            </div>
        </div>
        <div class="row" style="background:white">
            <div class="col-md-2">
            </div>
            <div class="col-md-4 buffer-title">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <p class="mb-0">
                            <input class="btn btn-link" type="radio" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Pagar con Tarjeta
                            </p>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div><img src="/JustEat/resources/views/img/visa_mc_amex.png"></div>
                                <div class="buffer-text">
                                    <label class="form-label form-text" for="Name"><b>Número de tarjeta</b></label>
                                </div>
                                <div class="form-square buffer-text">
                                    <input class="form-input form-square-card" data-val="true" data-val-length="Longitud máxima de 20" data-val-length-max="20" data-val-required="Introduce tu número de tarjeta" data_test_id="card_number" id="card_number" maxlength="20" name="CardNumber" placeholder="XXXX-XXXX-XXXX-XXXX" type="text" :value="tarjeta">
                                </div>
                                <div class="buffer-text form-square">
                                    <input type="checkbox" id="guardar" name="guardar" value="Guardar">
                                    <label for="guardar"> Guardar esta tarjeta</label><br>
                                </div>
                                <div class="buffer-text form-square">
                                    <label for="fecha_caducidad"><b>Fecha de caducidad</b></label><br>
                                    <input type="month" id="fecha" name="fecha" class="form-square-card">
                                </div>
                                <div class="buffer-text">
                                    <label class="form-label form-text" for="Name"><b>Código de seguridad</b></label>
                                </div>
                                <div class="buffer-text form-square">
                                    <input class="form-input form-square-pin" data-val="true" data-val-length="Longitud máxima de 3" data-val-length-max="3" data-val-required="Introduce tu código de seguridad" data_test_id="sec_code" id="sec_code" maxlength="3" name="secCode" type="text" :value="pin">
                                </div>
                                <div class="buffer-text">
                                    <label class="form-label form-text" for="Name"><b>Nombre del titular de la tarjeta</b></label>
                                </div>
                                <div class="form-square buffer-text">
                                    <input class="form-input form-square-card" data-val="true" data-val-length="Longitud máxima de 40" data-val-length-max="40" data-val-required="Introduce el nombre del titular" data_test_id="titular" id="titular" maxlength="40" name="CardNumber" type="text" :value="titular">
                                </div>
                                <div class="buffer-text form-square">
                                    <input type="checkbox" id="direccion" name="direccion" value="direccion">
                                    <label for="direccion">Dirección de facturación:</label>
                                    <p> {{ address }} (deselecciona<br>esta casilla para modificar esta dirección de facturación</p>
                                </div>
                                <div class="enquadrat">
                                    <a href="#" class="special-a">Tengo un código de descuento</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block button" autocomplete="off">Hacer mi pedido</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <p class="mb-0">
                            <input class="btn btn-link" type="radio" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Pagar con PayPal
                            </p>
                        </div>

                        <div id="collapseTwo" class="collapse form-square" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body form-square">
                                <input type="checkbox" id="paypaldetails" name="paypaldetails" value="Paypaldetails">
                                <label for="paypaldetails"> Guardar mis detalles de PayPal</label><br>
                                <div class="enquadrat">
                                    <a href="#" class="special-a">Tengo un código de descuento</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block button" autocomplete="off">Hacer mi pedido</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class="col-md-4 buffer-title">
                <div class="card">
                    <h4><b>Tu pedido</b></h4>
                    <div><p>{{order1}}  {{price1}}</p></div>
                    <div><p>{{order2}}  {{price2}}</p></div>

                    <div class="enquadrat">
                        <p><b>Subtotal {{result()}}€</b></p>
                        <p>Coste de envío {{shipping}}</p>
                        <h5><b>Total {{total()}}€</b></h5>
                    </div>
                    <div class="enquadrat text-center">
                        <p>{{restaurant}}</p>
                        <p>{{carrer}}</p>
                    </div>
                    <div class="enquadrat">
                        <p class="buffer-text"><b>[MOTO] Entrega lo antes posible</b></p>
                    </div>
                </div>
                <div>
                    <input type="checkbox" id="publicitat" name="publicitat" value="Publicitat">
                    <label for="publicitat"> Te enviaremos emails, SMS o notificaciones</label>
                    <p>para ponerte al día sobre fantásticos descuentos y servicios de Just Eat. Si prefieres que no lo hagamos, marca la casilla.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "PaymentMethod",
    data() {
        return {
            address: "Plaça de Tetuán, s/n, bajo 2",
            order1: "3 x hamburguesa con patatas fritas",
            price1: "12.80€",
            order2: "2 x refresco grande",
            price2: "3.60€",
            shipping: "1.90€",
            restaurant: "Viva la burger",
            carrer: "Carrer de l'Hamburguesa Feliç, 20, 08010"
        }
    },
    mounted() {
      console.log("Example component mounted");
    },
    methods: {
        result: function () {
            return (parseFloat(this.price1) + parseFloat(this.price2)).toFixed(2);
        },
        total: function () {
            return (parseFloat(this.price1) + parseFloat(this.price2) + parseFloat(this.shipping)).toFixed(2);
        }
    }
  };
</script>
