<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css">
    <link rel="stylesheet" href="materialize/css/YXzLBN.css">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript">
        function toggle_visibility(id) {
        var e = document.getElementById(id);
        if(e.style.display == 'flex')
        e.style.display = 'none';
        else
        e.style.display = 'flex';
        }
    </script>
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
    <div id="map"></div>
    <script>
        var customLabel = {
            1: {
                label: 'R'
            },
            3: {
                label: 'I'
            },
            2: {
                label: 'A'
            }
            4: {
                label: "C"
            }
        };//según el tipo de incidente pone una letra en el globo
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 22.122616, lng: -100.983920},
                disableDefaultUI: true,
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },//inicializa el mapa con centro en SLP y´el único control es el de zoom a la mitad del lado derecho de la pantalla
                zoom: 13,
            });
            var infoWindow = new google.maps.InfoWindow;
            // Change this depending on the name of your PHP or XML file
            downloadUrl('echoxm2.php', function(data) {//manda a llamar el código XML generado por el archivo echoxm2.php
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                    var id = markerElem.getAttribute('id');
                    var publicacion = markerElem.getAttribute('publicacion');
                    var fecha = markerElem.getAttribute('fecha');
                    var type = markerElem.getAttribute('type');
                    var point = new google.maps.LatLng(
                        parseFloat(markerElem.getAttribute('lat')),
                        parseFloat(markerElem.getAttribute('lng')));//se recuperan todos los elementos del XML
                    var infowincontent = document.createElement('div');
                    var strong = document.createElement('strong');
                    strong.textContent = publicacion
                    infowincontent.appendChild(strong);
                    infowincontent.appendChild(document.createElement('br'));//añade la ventana y agrega el comentario del incidente
                    var text = document.createElement('text');
                    text.textContent = fecha
                    infowincontent.appendChild(text);//añade la fecha del incidente
                    var icon = customLabel[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        label: icon.label
                    });//imprime los marcadores en la posición con los valores definidos
                    marker.addListener('click', function() {
                        infoWindow.setContent(infowincontent);
                        infoWindow.open(map, marker);
                    });
                });
            });
        }
        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };
            request.open('GET', url, true);
            request.send(null);
        }
        function doNothing() {}
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCS5ZCsVolHn1hcjDvo5BVCwt_v-KjVCi8&callback=initMap"></script>
</body>
</html>