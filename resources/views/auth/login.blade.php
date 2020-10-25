<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Vista ejemplo</title>
</head>
<body>

    <style>
        
        #logo{
            font-weight: bold;
            font-family: serif;
            color: rgb(219, 121, 9); 
        }

        .contenedor{
            border-width: 1px;
            border-style: solid;
            border-color: gray; 
            margin-top: 70px;         
        }

        .nav{
            margin-right: 200px;
            margin-left: 200px;
        }

        .rowbutton{
            justify-content: center;
        }
        
        .facebook{
            background-color: rgb(55, 20, 207);
            width: 100%;
        }

        .google{
            width: 100%;
        }

        .colo{
            text-align: center;
        }

        .colo1{
            text-align: center;
            color: gainsboro;
        }

        .email{
            width: 100%;
        }

        .password{
            width: 100%;
        }

        .links{
            font-weight: bold;
        }

        .btnlogin{
            background-color: orange;
            border-radius: 5px;
            color: white;
            border-width: 0px;
            width: 100%;
            height: 60px;
            font-weight: bold;
        }

        .btnlogin:hover{
            background-color: orangered;
        }

        #texto{
            text-align: justify;
        }

    </style>


    <nav class="navbar">
        <div class="col-1 colo"></div>
        <div class="col-2 colo">
            <a class="navbar-brand nav" href="#">
                <img src="data:image/png;base64,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" wight="100px" height="50px" alt="JustEat">
            </a>
        </div>
        <div class="col-4 colo"></div>
        <div class="col-2 colo"><a class="extra mx-3" href="/register">Regístrate</a> <a class="extra mx-3" href="#">Ayuda</a></div>
        <div class="col-2 colo"></div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col"></div>

            <div class="col contenedor">
                
                <div class="row my-3 mx-3">
                    <h1>Inicia Sesión</h1>
                </div>

                <div class="row my-3 mx-3 rowbutton">
                    <!--Facebook-->
                    <button type="button" class="btn btn-primary btn-lg facebook"><img class="img mr-2" src="https://library.kissclipart.com/20180901/fve/kissclipart-iconos-de-facebook-instagram-twitter-clipart-the-f-752e59a846d1d82c.png" weight="30px" height="30px" alt="Facebook"/>Continuar con Facebook</button>
                </div>

                <div class="row my-3 mx-3 rowbutton">
                    <!--Google +-->
                    <button type="button" class="btn btn-primary btn-lg google"><img class="img mr-4" src="https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1000&fit=clip" weight="30px" height="30px" alt="Google"/> Continuar con Google </button>
                </div>

                <div class="row my-3 mx-3">
                    <div class="col colo1">____________</div>
                    <div class="col-1 colo"> o </div>
                    <div class="col colo1">____________</div>
                </div>

                <div class="row my-3 mx-3 rowbutton">
                    <input class="email" type="email" placeholder="Introduce tu email">
                </div>

                <div class="row my-3 mx-3 rowbutton">
                    <input class="password" type="password" placeholder="Introduce tu contraseña">
                </div>

                <div class="row my-3 mx-3">
                    <a class=links href="#">¿Has olvidado tu contraseña?</a>
                </div>

                <div class="row my-3 mx-3">
                    <label><input id="checkbox" type="checkbox" value="valor">  Guardar sesión<br> No lo marques si compartes ordenador</label>
                </div>

                <div class="row my-3 mx-3">
                    <input class="btnlogin" type="submit" value="Iniciar Sesión">
                </div>

                <div class="row my-3 mx-3">
                    <p>¿Nuevo en Just Eat? <a class=links href=#>Crear cuenta</a></p>
                </div>

                <div class="row my-3 mx-3">
                    <p id="texto">Al crear la cuenta, aceptas nuestros <br>
                    <a class=links href=#>términos y condiciones</a>. Por favor, lee <br>
                    nuestra <a class=links href=#>política de privacidad</a>y nuestra <br>
                    <a class=links href=#>política de cookies</a>.</p>
                </div>

            </div>

            <div class="col"></div>
        </div>

    </div>


    <!-- Si utilizamos componentes de Bootstrap que requieran Javascript agregar estos tres archivos -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
