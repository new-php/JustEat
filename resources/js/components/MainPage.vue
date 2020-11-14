<template>
    <div class="container cont_mp">

        <div class="mainFoto">
            <img src="images/mainPage/foto_main_page.jpg" alt="" width="100%" height="35%" > 
        </div>

        <div class="contdir">
            <h1 class="title1">Pide lo que te pida el cuerpo</h1>
            <h5 class="title2">Comida a domicilio online cerca de ti</h5>

            <div class="row justify-content-center my-3">
                <input type="text" class="form-control fdir" placeholder="Ej: 1234 Main St">
                <span class="">
                    <button class="btn btn-default btndir" type="button">Buscar restaurantes</button>
                </span>
            </div>
            
        </div>

        <div class="row justify-content-center my-3 contInfo">

            <div class="col-lg-6 cl">
                <img src="images/mainPage/foto_info.png" alt="" width="30%" height="90%" > 
            </div>

            <div class="col-lg-6 cl">
                <h1 class="titleInfo1">Pide lo que te pida el cuerpo aún <br> más rápido</h1>
                <h5 class="title2 mt-4">Descárgate gratis la app y pide tu comida a domicilio estés donde estés. </h5>

                <div class="row justify-content-center my-5">

                    <div class="col ml-5 cl2">
                        <a href="https://www.apple.com/app-store/"><img src="images/mainPage/apple.svg" alt="" width="100%" height="90%" ></a>
                    </div>

                    <div class="col mr-5 cl2">
                        <a href="https://play.google.com/store"><img src="images/mainPage/googlePlay.svg" alt="" width="100%" height="90%" ></a>
                    </div>

                </div>

            </div>
            
        </div>

    </div>

</template>

<script>
  export default {
    mounted() {
      console.log("Example component mounted");
    }
  };
</script>