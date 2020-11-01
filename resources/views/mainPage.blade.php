<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Restaurantes Resultado (Por cambiar)</title>

        <!--cambios en el css necessitan 'npm run dev'-->
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <!-- Fonts
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
    </head>
    <body>
    <header>
        <div class="page-section">
            <div id="Logo">
                <a href="" aria-label="Home Just-Eat">
                    <div class="head-logo-img">
                        <img src="https://tienda-just-eat.es/themes/justeat/assets/img/logofooter.png">
                    </div>
                    <span class="visually-hidden">Just Eat</span>
                </a>
            </div>
            <nav class="header-nav" id="User-Panel">
                <div class="user-panel">
                    <ul class="user-panel-elements">
                        <li>
                            <a href="{{ route ('welcome') }}"><strong>Iniciar sesión</strong></a>
                        </li>
                        <li>
                            <a href="{{ route ('welcome') }}" onclick="logOut()"><strong>Cerrar sesión</strong></a>
                        </li>
                        <li>
                            <a class="visually-hidden" href=""><strong>Nombre Usuario</strong></a>
                        </li>
                        <li>
                            <a href=""><strong>Ayuda</strong></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div></header>
    <main>
        <div class="food-types page-section">
            <div>
                <p>Cocinas Populares</p>
            </div>
            <div class="header-filters">
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/italiana" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-italiana">
                        <label for="check-italiana" tabindex="-1" title="Italiana">
                            Italiana
                        </label>
                    </a></span>
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/china" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-china">
                        <label for="check-china" tabindex="-1" title="China">
                            China
                        </label>
                    </a></span>
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/japonesa" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-japonesa">
                        <label for="check-japonesa" tabindex="-1" title="Japonesa">
                            Japonesa
                        </label>
                    </a></span>
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/americana" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-americana">
                        <label for="check-americana" tabindex="-1" title="Americana">
                            Americana
                        </label>
                    </a></span>
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/turca" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-turca">
                        <label for="check-turca" tabindex="-1" title="Turca">
                            Turca
                        </label>
                    </a></span>
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/española" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-española">
                        <label for="check-española" tabindex="-1" title="Española">
                            Española
                        </label>
                    </a></span>
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/pizza" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-pizza">
                        <label for="check-pizza" tabindex="-1" title="Pizza">
                            Pizza
                        </label>
                    </a></span>
                <span class="food-type-container">
                    <a href="" tabindex="-1">
                        <div class="food-type-image-container">
                            <img src="https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_180,q_auto,w_290/v1/es/cuisine-icons/india" tabindex="0">
                        </div>
                        <input type="checkbox" id="check-india">
                        <label for="check-india" tabindex="-1" title="India">
                            India
                        </label>
                    </a></span>
            </div>
        </div>
        <main class="main-section page-section">
            <div class="filters-section">
                <div class="adress-chooser">
                    <div>
                        <img src="https://www.flaticon.com/svg/static/icons/svg/684/684809.svg" width="20" height="20">
                    </div>
                    <div>
                        <h3>Calle Nombre, CP(08012) Municipio</h3>
                        <a href=""><strong>cambiar dirección</strong></a>
                    </div>
                </div>
                <div class="food-chooser">
                    <div class="filters-chooser-head">
                        <p>Todas las cocinas A-Z</p>
                        <a href="">Reiniciar</a>
                    </div>
                    <div class="food-chooser-types">
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-americana">
                                <label for="type-americana">Americana</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-caribeña">
                                <label for="type-caribeña">Caribeña</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-casera">
                                <label for="type-casera">Casera</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-china">
                                <label for="type-china">China</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-española">
                                <label for="type-española">Española</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-fusion">
                                <label for="type-fusion">Fusión</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-hamburguesas">
                                <label for="type-hamburguesas">Hamburguesas</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-italiana">
                                <label for="type-italiana">Italiana</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-japonesa">
                                <label for="type-japonesa">Japonesa</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-kebab">
                                <label for="type-kebab">Kebab</label>
                            </div>
                            <p>Nº</p>
                        </span>
                    </div>
                    <button class="food-chooser-extend-button" type="button">
                        <div>
                            <p>Ver más</p>
                            <img src="https://www.flaticon.com/svg/static/icons/svg/152/152415.svg" width="15" height="15"> 
                        </div>
                    </button>
                    <div class="food-chooser-types visually-hidden">
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-mediterranea">
                                <label for="type-mediterranea">Mediterránea</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-oriental">
                                <label for="type-oriental">Oriental</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-pizza">
                                <label for="type-pizza">Pizza</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-sandwiches">
                                <label for="type-sandwiches">Sandwiches</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-sushi">
                                <label for="type-sushi">Sushi</label>
                            </div>
                            <p>Nº</p>
                        </span>
                        <span class="food-chooser-container">
                            <div>
                                <input type="checkbox" id="type-turca">
                                <label for="type-turca">Turca</label>
                            </div>
                            <p>Nº</p>
                        </span>
                    </div>
                </div>
                <div class="filters-chooser">
                    <div class="filters-chooser-head">
                        <p>Filtros</p>
                        <a href="">Reiniciar</a>
                    </div>
                    <div class="filters">
                        <span class="filters-container">
                            <div>
                                <input type="checkbox" id="type-ofertas">
                                <label for="type-ofertas">Ofertas Especiales</label>
                            </div>
                        </span>
                        <span class="filters-container">
                            <div>
                                <input type="checkbox" id="type-entrega_gratis">
                                <label for="type-entrega_gratis">Gastos de entrega gratis</label>
                            </div>
                        </span>
                        <span class="filters-container">
                            <div>
                                <input type="checkbox" id="type-5_estrellas">
                                <label for="type-5_estrellas">Más de 5 estrellas</label>
                            </div>
                        </span>
                        <span class="filters-container">
                            <div>
                                <input type="checkbox" id="type-abiertos">
                                <label for="type-abiertos">Abiertos ahora</label>
                            </div>
                        </span>
                        <span class="filters-container">
                            <div>
                                <input type="checkbox" id="type-recogida">
                                <label for="type-recogida">Recogida</label>
                            </div>
                        </span>
                        <span class="filters-container">
                            <div>
                                <input type="checkbox" id="type-nuevo">
                                <label for="type-nuevo">Nuevo </label>
                            </div>
                        </span>
                        <span class="filters-container">
                            <div>
                                <input type="checkbox" id="type-halal">
                                <label for="type-halal">Halal </label>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="results-section">
                <form id="Search bar" action="search.php" method="">
                    <fieldset class="search-bar">
                        <input type="image" src="https://www.flaticon.com/svg/static/icons/svg/157/157958.svg" width="20" height="20">
                        <input type="search" name="search" placeholder="Buscar restaurante o cocina">
                    </fieldset>
                </form>
                <div class="search-header">
                    <h2>Nº restaurantes abiertos</h2>
                    <ul>
                        <li>Ordenar por Relevantes</li>
                    </ul>
                </div>
                <div class="search-results-open">
                    <section class="restaurant-card">
                        <a href="">
                            <div class="restaurant-photos">
                                <div class="restaurant-cover-page">
                                    <img src="https://scalar.usc.edu/works/chinese-food-in-the-us/media/Screen%20Shot%202019-07-10%20at%2010.37.06%20PM.png">
                                </div>
                                <div class="restaurant-logo">
                                    <img src="https://i.etsystatic.com/11979725/r/il/425b9a/1431687786/il_570xN.1431687786_w5a8.jpg">
                                </div>
                            </div>
                            <div class="restaurant-info">
                                <h3 class="restaurant-name">Nombre del restaurante</h3>
                                <p class="restaurant-type">
                                    Tipo de cocina
                                </p>
                                <div class="restaurant-rate">
                                    "estrellas"
                                    <p id="numero-valoraciones">
                                        Nº
                                    </p>
                                </div>
                            </div>
                            <div class="delivery-info">
                                <div class="delivery-offer">
                                    X% de descuento a partir de Y €
                                </div>
                                <div class="delivery-price">
                                    Entrega X€ - Pedido mínimo Y€
                                </div>
                                <div class="delivery-time">
                                    <strong>30 - 50 min.</strong>
                                </div>
                            </div>
                            <div class="sponsored-box">
                                <p>Patrocinado</p>
                            </div>
                        </a>
                    </section>

                    <section class="restaurant-card">
                        <a href="">
                            <div class="restaurant-photos">
                                <div class="restaurant-cover-page">
                                    <img src="https://scalar.usc.edu/works/chinese-food-in-the-us/media/Screen%20Shot%202019-07-10%20at%2010.37.06%20PM.png">
                                </div>
                                <div class="restaurant-logo">
                                    <img src="https://i.etsystatic.com/11979725/r/il/425b9a/1431687786/il_570xN.1431687786_w5a8.jpg">
                                </div>
                            </div>
                            <div class="restaurant-info">
                                <h3 class="restaurant-name">Restaurante 1</h3>
                                <p class="restaurant-type">
                                    Tipo de cocina
                                </p>
                                <div class="restaurant-rate">
                                    "estrellas"
                                    <p id="numero-valoraciones">
                                        Nº
                                    </p>
                                </div>
                            </div>
                            <div class="delivery-info">
                                <div class="delivery-offer">
                                    X% de descuento a partir de Y €
                                </div>
                                <div class="delivery-price">
                                    Entrega X€ - Pedido mínimo Y€
                                </div>
                                <div class="delivery-time">
                                    <strong>30 - 50 min.</strong>
                                </div>
                            </div>
                            <div class="sponsored-box">
                                <p>Patrocinado</p>
                            </div>
                        </a>
                    </section>

                    <section class="restaurant-card">
                        <a href="">
                            <div class="restaurant-photos">
                                <div class="restaurant-cover-page">
                                    <img src="https://scalar.usc.edu/works/chinese-food-in-the-us/media/Screen%20Shot%202019-07-10%20at%2010.37.06%20PM.png">
                                </div>
                                <div class="restaurant-logo">
                                    <img src="https://i.etsystatic.com/11979725/r/il/425b9a/1431687786/il_570xN.1431687786_w5a8.jpg">
                                </div>
                            </div>
                            <div class="restaurant-info">
                                <h3 class="restaurant-name">Restaurante 2</h3>
                                <p class="restaurant-type">
                                    Tipo de cocina
                                </p>
                                <div class="restaurant-rate">
                                    "estrellas"
                                    <p id="numero-valoraciones">
                                        Nº
                                    </p>
                                </div>
                            </div>
                            <div class="delivery-info">
                                <div class="delivery-offer">
                                    X% de descuento a partir de Y €
                                </div>
                                <div class="delivery-price">
                                    Entrega X€ - Pedido mínimo Y€
                                </div>
                                <div class="delivery-time">
                                    <strong>30 - 50 min.</strong>
                                </div>
                            </div>
                            <div class="sponsored-box">
                                <p>Patrocinado</p>
                            </div>
                        </a>
                    </section>

                    <section class="restaurant-card">
                        <a href="">
                            <div class="restaurant-photos">
                                <div class="restaurant-cover-page">
                                    <img src="https://scalar.usc.edu/works/chinese-food-in-the-us/media/Screen%20Shot%202019-07-10%20at%2010.37.06%20PM.png">
                                </div>
                                <div class="restaurant-logo">
                                    <img src="https://i.etsystatic.com/11979725/r/il/425b9a/1431687786/il_570xN.1431687786_w5a8.jpg">
                                </div>
                            </div>
                            <div class="restaurant-info">
                                <h3 class="restaurant-name">Restaurante 3</h3>
                                <p class="restaurant-type">
                                    Tipo de cocina
                                </p>
                                <div class="restaurant-rate">
                                    "estrellas"
                                    <p id="numero-valoraciones">
                                        Nº
                                    </p>
                                </div>
                            </div>
                            <div class="delivery-info">
                                <div class="delivery-offer">
                                    X% de descuento a partir de Y €
                                </div>
                                <div class="delivery-price">
                                    Entrega X€ - Pedido mínimo Y€
                                </div>
                                <div class="delivery-time">
                                    <strong>30 - 50 min.</strong>
                                </div>
                            </div>
                            <div class="sponsored-box">
                                <p>Patrocinado</p>
                            </div>
                        </a>
                    </section>

                    <section class="restaurant-card">
                        <a href="">
                            <div class="restaurant-photos">
                                <div class="restaurant-cover-page">
                                    <img src="https://scalar.usc.edu/works/chinese-food-in-the-us/media/Screen%20Shot%202019-07-10%20at%2010.37.06%20PM.png">
                                </div>
                                <div class="restaurant-logo">
                                    <img src="https://i.etsystatic.com/11979725/r/il/425b9a/1431687786/il_570xN.1431687786_w5a8.jpg">
                                </div>
                            </div>
                            <div class="restaurant-info">
                                <h3 class="restaurant-name">Restaurante 4</h3>
                                <p class="restaurant-type">
                                    Tipo de cocina
                                </p>
                                <div class="restaurant-rate">
                                    "estrellas"
                                    <p id="numero-valoraciones">
                                        Nº
                                    </p>
                                </div>
                            </div>
                            <div class="delivery-info">
                                <div class="delivery-offer">
                                    X% de descuento a partir de Y €
                                </div>
                                <div class="delivery-price">
                                    Entrega X€ - Pedido mínimo Y€
                                </div>
                                <div class="delivery-time">
                                    <strong>30 - 50 min.</strong>
                                </div>
                            </div>
                            <div class="sponsored-box">
                                <p>Patrocinado</p>
                            </div>
                        </a>
                    </section>


                </div>
            </div>
        </main>
    </main>
    <footer>
        <div class="footer-links page-section">
            <span class="footer-links-conatiner">
                <h2>Servicio al cliente</h2>
                <ul class="footer-links-list">
                    <li><a href="">Inicia Sesión</a></li>
                    <li><a href="">Regítrate</a></li>
                    <li><a href="">Nuestro Blog</a></li>
                    <li><a href="">Información De La Cuenta</a></li>
                </ul>
            </span>
            <span class="footer-links-conatiner">
                <h2>Tiupos de cocina</h2>
                <ul class="footer-links-list">
                    <li><a href="">Pizza a domicilio</a></li>
                    <li><a href="">Kebab a domicilio</a></li>
                    <li><a href="">Comida china a domicilio</a></li>
                    <li><a href="">Sushi a domicilio</a></li>
                    <li><a href="">Hamburguesas a domicilio</a></li>
                    <li><a href="">Mas tipos de cocina</a></li>
                </ul>
            </span>
            <span class="footer-links-conatiner">
                <h2>Ciudades</h2>
                <ul class="footer-links-list">
                    <li><a href="">Madrid</a></li>
                    <li><a href="">Barcelona</a></li>
                    <li><a href="">Valencia</a></li>
                    <li><a href="">Zaragoza</a></li>
                    <li><a href="">Las Palmas</a></li>
                    <li><a href="">Más ciudades</a></li>
                </ul>
            </span>
            <span class="footer-links-conatiner">
                <h2>Sobre nosotros</h2>
                <ul class="footer-links-list">
                    <li><a href="">Registrarse en el restaurante</a></li>
                    <li><a href="">Quienes somos</a></li>
                    <li><a href="">Ayuda</a></li>
                    <li><a href="">Garantía de precio</a></li>
                    <li><a href="">Política de Privacidad</a></li>
                    <li><a href="">Términos y Condiciones</a></li>
                    <li><a href="">Política de Cookies</a></li>
                    <li><a href="">5% de descuento</a></li>
                    <li><a href="">Programa de Afiliación</a></li>
                    <li><a href="">Gestiona tu restaurante</a></li>
                </ul>
            </span>
        </div>

        <div class="country-section page-section">
            <button class="country-chooser" type="button">
                <div>
                    <p>España</p>
                    <img src="https://www.flaticon.com/svg/static/icons/svg/152/152415.svg" width="15" height="15"> 
                </div>
            </button>
            <div class="web-stamps">
                <span><img src="https://d2egcvq7li5bpq.cloudfront.net/sw/img/icons/cards/mastercard--securecode.svg"></span>
                <span><img src="https://d2egcvq7li5bpq.cloudfront.net/sw/img/icons/cards/amex--safekey.svg"></span>
                <span><img src="https://d2egcvq7li5bpq.cloudfront.net/sw/img/icons/cards/paypal.svg"></span>
                <span><img src="https://d2egcvq7li5bpq.cloudfront.net/sw/img/icons/certificates/confianza.svg"></span>
            </div>
        </div>
    </footer>


    <!-- This script deletes the auth token-->
    <script>
        function logOut(){
            window.localStorage.removeItem('auth_token');
        }
    </script>
</body>
</html>
