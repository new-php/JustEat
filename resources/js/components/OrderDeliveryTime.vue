<template>
    <div class="bg-white pt-4">
        <div class="delivery-container" align="middle">
            <div class="delivery-title">
                <span>Confirma la hora de entrega</span>
            </div>
            <div class="delivery-name">
                <span>Hora de entrega</span>
            </div>
            <div class="delivery-input-container">
                <select v-model="deliveryTime" class="delivery-input bg-white">
                    <option v-for="item in items">{{item}}</option>
                </select>
            </div>
            <div class="delivery-input-container">
                <span>La entrega sin contacto ahora se aplica a todos los pedidos. Si tu pedido incluye alcohol, ten tu identificación lista para que la verifiquemos sin contacto. Si tienes alguna otra indicación, escríbela a continuación. <strong>No incluyas detalles sobre alergias.</strong></span>
                <textarea class="delivery-input delivery-textarea" v-model="description" placeholder="Por ejemplo, 'Por favor, deja mi pedido en la puerta y llama al timbre para informarme de que ya ha llegado'. No incluyas aquí ninguna información relativa a alergias."></textarea>
            </div>
            <div class="delivery-allergies-container"><a class="delivery-allergies-link" href="#">Si tú o alguien para el que estás pidiendo tiene una alergia o intolerancia a algún alimento, haz clic aquí.</a></div>
            <div>
                <button type="submit" class="btn delivery-button mt-2" v-on:click="goToPayment()"><strong>Continuar con el pago</strong></button>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "OrderTimeConfirm",
    props: ['order'],
    data() {
        return {
            items: [
                "Lo antes posible",
                "En una hora",
                "En dos horas",
                "Mañana"
            ],
            deliveryTime: "Lo antes posible",
            description: "",
        }
    },
    methods: {
        date_function: function(){
            return moment(todo.created_at).format('YYYY-MM-DD h:mm A');
        },
        goToPayment() {
            window.axios.put('/order/' + this.order.id + '/delivery',
                {
                    delivery_time: this.deliveryTime,
                    description: this.description,
                },
            )
            .then(response => {
                window.location.href = '/order/' + this.order.id + '/payment';
            })
            .catch((error) => {
                if (error.response.status == 401) {
                    window.localStorage.removeItem('auth_token')
                    window.location.href = '/';
                }

                if (error.response.status == 403) {
                    window.location.href = '/';
                }
            });
        },
    }
  };
</script>
