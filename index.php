
<?php 
    include('login.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Secure</title>
        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css">
        <link rel="stylesheet" href="materialize/css/YXzLBN.css">
        <meta name="viewport" content="width=device.width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }

            #map{
                min-height: 100%;
                position: relative;
                display: flex;
                width: 100%;
                height: 100vh;
            }

            #secciones{
                padding-top: 0px;
            }

            #btncentrado{
                width: 100%
            }

            @media only screen and (max-width: 992px) {
                #infor {
                    display: none;
                }


            }

            @media only screen and (min-width: 992px) {
                #modal1, #modal2{
                    width: 33%;
                }
            }

            /* label color 
            .input-field label {
                color: #1565c0;
            }
            /* label focus color 
            .input-field input[type=tel]:focus + label {
                color: #1565c0;
            }
            /* label underline focus color 
            .input-field input[type=tel]:focus {
                border-bottom: 1px solid #1565c0;
                box-shadow: 0 1px 0 0 #1565c0;
            }
            /* valid color 
            .input-field input[type=tel].valid {
                border-bottom: 1px solid #1565c0;
                box-shadow: 0 1px 0 0 #1565c0;
            }
            /* invalid color 
            .input-field input[type=tel].invalid {
                border-bottom: 1px solid #1565c0;
                box-shadow: 0 1px 0 0 #1565c0;
            }
            /* icon prefix focus color 
            .input-field .prefix.active {
                color: #1565c0;
            }*/
        </style>
    </head>

    <body>
        <nav>
            <div class="nav-wrapper blue darken-3">
                <a style="width: 100px; padding: 10px;" href="#" class="brand-logo"><img style="width: 100%;"  src="recursos/logocompleto.png"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php if (isset($_SESSION['login_user_sys'])) { ?>
                        <li style="padding-right: 20px"><i class="material-icons left">person</i><?php echo "Numero de teléfono: ".$_SESSION['login_user_sys']; ?></li>
                        <li><a class="modal-trigger" href="#modal3">Realizar una Denuncia</a></li>
                        <li><a href="check.php">Cerrar Sesión</a></li>
                    <?php }else{ ?>
                        <li><a class="modal-trigger" href="#modal2">Registro</a></li>
                        <li><a class="modal-trigger" href="#modal1">Iniciar Sesión</a></li>
                    <?php } ?>
                    
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <ul id="slide-out" class="sidenav">
            <li><div class="user-view">
                    <div class="background">
                        <img src="img/homer.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="img/trollface.jpg"></a>
                    <a href="#name"><span class="white-text name">Nombre de usuario</span></a>
                    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div></li>
            <li><a class="modal-trigger" href="#modal2">Registro</a></li>
            <li><a class="modal-trigger" href="#modal1">Iniciar Sesión</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>
        

        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.fixed-action-btn').floatingActionButton();
            });

            $(document).ready(function(){
                $('.sidenav').sidenav();
            });

            $(document).ready(function(){
                $('.modal').modal();
            });

            $(document).ready(function(){
                $('.tabs').tabs({ 'swipeable': true });
            });


            $(document).ready(function() {
                M.updateTextFields();
            });

            $(document).ready(function(){
                $('select').formSelect();
            });

            $(document).ready(function(){
                $('.datepicker').datepicker({ 'format': 'yyyy-mm-dd' });
            });

            $(document).ready(function(){
                $('.timepicker').timepicker({ 'twelveHour': false });

            });

            $(document).ready(function() {
                $('input#input_text, textarea#descripcion').characterCounter();
            });

            $(document).ready(function() {
                $("#latitud").val('30');
            });

            $(document).ready(function() { 
            if ("geolocation" in navigator){ 
                navigator.geolocation.getCurrentPosition(function(position){ 
                    $("#latitud").val(position.coords.latitude);
                    $("#longitud").val(position.coords.longitude);
                });
            }
            else{
                console.log("Browser doesn't support geolocation!");
            }
            });
        </script>


        <!-- Modal Structure -->
        
        
         
         <script>
             $(document).ready(function(){
                $('#alert').open();
             });
         </script>
         <div id="alert" class="modal red lighten-2">
             <div class="modal-content">
                <h4>Ok</h4>
             </div>
         </div>
        <div id="modal1" class="modal grey lighten-2">
            <div class="modal-content">
                <h4>Iniciar Sesión</h4>
                <div class="row">
                    <form action="login.php" method="POST"  class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_telephone" required="" type="tel" name="tel" class="validate input-field">
                                <label for="icon_telephone">Teléfono</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="icon_key" required="" type="password" name="passwd" class="validate">
                                <label for="icon_key">Contraseña</label>
                            </div>

                            <div class="input-field col s12">
                                <div style="margin: auto; width: 170px">
                                    <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="login">Iniciar Sesión</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer grey lighten-2">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
            </div>
        </div>
        
        <div id="modal2" class="modal grey lighten-2">
            <div class="modal-content">
                <h4>Registro</h4>
                <div class="row">
                    <form class="col s12" action="registro.php" method="POST">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input type="text" id="nom_usuario" class="form-input" required/>
                                <label for="nom_usuario">Nombre de usuario (obligatorio)</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input type="text" id="num_tel" class="form-input" required/>
                                <label for="num_tel">Numero de telefono (obligatorio)</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input type="text" id="correo" class="form-input" />
                                <label for="correo">Email (obligatorio)</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" id="passwd" class="form-input" />
                                <label for="passwd">Contraseña (obligatorio)</label>
                            </div>

                            <div class="input-field col s12">
                                <div style="margin: auto; width: 170px">
                                    <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="action">Suscribirse</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer grey lighten-2">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
            </div>
        </div>

        <div id="modal3" class="modal">
            <div class="modal-content">
                <h4>Formulario</h4>
                <div class="row">
                    <form class="col s12" action="enviar.php" method="POST">
                        <div class="input-field col s6">
                            <select required name="categoria">
                                <option value="" disabled selected>-- Elige una opción --</option>
                                <option value="1">Robo</option>
                                <option value="2">Asesinato</option>
                                <option value="3">Incendio</option>
                                <option value="4">Choque</option>
                            </select>
                            <label>Categoría</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" class="datepicker" name="fecha" required>
                            <label>Fecha de incidente</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" class="timepicker" name="hora" required>
                            <label>Hora del incidente</label>
                        </div>

                        <div class="file-field input-field col s6">
                            <div class="btn blue darken-3">
                                <span>Foto</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <textarea id="descripcion" name="descripcion" data-length="255" maxlength="255" class="materialize-textarea" required></textarea>
                            <label for="descripcion">Descripción de los hechos</label>
                        </div>
                        <h6>Coordenadas:</h6>
                        <div class="input-field col s6">
                            <input id="latitud" name="latitud" type="text" class="validate" value=" " readonly>
                            <label>Latitud </label>
                        </div>

                        <div class="input-field col s6">
                            <input id="longitud" name="longitud" type="text" class="validate" value=" " readonly>
                            <label for="longitud">Longitud </label>
                        </div>

                        <div class="input-field col s12">
                            <div style="margin: auto; width: 190px">
                                <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="reportar">Enviar Informe</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

        <div id="map" class="col s12">
            <iframe src="https://secureslp.tk/map.php" style="width: 100%;" frameborder="0"></iframe>
        </div>
        <div id="info" class="col s12 red">Test 2</div>
        <div id="ayuda" class="col s12 green">Test 3</div>
        




        <footer class="page-footer blue darken-3" id="secciones">
            <ul class="tabs tabs-fixed-width tab-demo blue darken-3" id="">
                <li class="tab"><a style="display: flex; display: -webkit-flex; align-items: center; -webkit-align-items: center; justify-content: center; -webkit-justify-content: center; " class="active" href="#map"><i class="white-text material-icons">map</i><span class="white-text">Mapa</span></a></li>
                <li class="tab"><a href="#info"><span class="white-text">Información</span></a></li>
                <li class="tab"><a href="#ayuda"><span class="white-text">Ayuda</span></a></li>
            </ul>

            <div class="footer-copyright" id="infor">
                <div class="container">
                    © 2019 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>
    </body>
</html>