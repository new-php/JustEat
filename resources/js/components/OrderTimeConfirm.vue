<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header buffer-title no-background"><h2>Confirma la hora de entrega</h2></div>
                    <div><p>Hora de entrega</p></div>
                    <div class="form-square">
                        <select class="form-square-text">
                            <option v-for="item in items">{{item}}</option>
                        </select>
                    </div>
                    <div class="comment-text form-square">
                        <p>Deja una nota para el restaurante con cualquier cosa que necesiten saber (por ejemplo, el timbre no funciona). No incluyas detalles sobre alergias.</p>
                        <textarea class="form-input form-square-text" data-val="true" data-val-length="The field Note must be a string with a maximum length of 200" data-val-length-max="200" id="Note" maxlength="200" name="Note" placeholder="Por ejemplo: 'el timbre no funciona'. No incluyas detalles sobre alergias aquí" rows="3"></textarea>
                    </div>
                    <div><a href="#">Si tú o alguien para el que estás pidiendo tiene una alergia o intolerancia a algún alimento, haz clic aquí.</a></div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block button" autocomplete="off">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "OrderTimeConfirm",
    data() {
        return {
            username: 'Marc Soler Bages',
            items: [
                "Lo antes posible",
                "En una hora",
                "En dos horas",
                "Mañana"
            ]
        }
    },
    mounted() {
      console.log("Example component mounted");
    },
    methods: {
        date_function: function(){
            return moment(todo.created_at).format('YYYY-MM-DD h:mm A');
        }

    }
  };
</script>
