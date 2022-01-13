<!DOCTYPE html>
<html>
<head>
	<title>Map</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<style type="text/css">
		body{
			background: #161616;
			color:white;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
		}
		#map {
			width: 100vw;
			height: 94vh;
		}
        #info{
            width: 100vw;
            min-height: 50px;
            line-height: 50px;
            padding: 0 10px;
            background-color: #444;
        }
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap-grid.min.css">
</head>
<body>
    <div id="map"></div>
    <div id="info"></div>
    <script>
        let maptype_def = L.tileLayer('http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        let map = new L.Map('map', {
            center: new L.LatLng(37.0588348, 37.3451174),
            zoom: parseInt(15),
            attributionControl: false
        });
        let drawnItems = L.featureGroup().addTo(map);

        L.control.layers({
            "Google Hybrid": maptype_def.addTo(map),
            "Google Street": L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }),

            "Google Satellite": L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }),

            "Google Terrain": L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }),

            "OSM": L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: null
            }),
        },
        {
            'Draw Layer': drawnItems
        },
        {
            position: 'topleft',
            collapsed: true
        }
        ).addTo(map);


        const loadTrucks = async () => {
            let century21icon = '';
            let total = 0 ;
            let running = 0 ;
            let stopped = 0 ;
            const result = await fetch("{{route('map.vehicle')}}")
            const final = await result.json()
            // console.log(vehicles)
            document.querySelectorAll('.leaflet-marker-icon').forEach(item => {
                item.remove()
            })
            document.querySelectorAll('.leaflet-popup').forEach(item => {
                item.remove()
            })
            for (let item of final) {
                if( item.Speed == 0 ){
                    century21icon = L.icon({
                        iconUrl: "{{asset('uploads/park.png')}}",
                        iconSize: [24, 24]
                    });
                    stopped++;
                }
                else{
                    century21icon = L.icon({
                        iconUrl: "{{asset('uploads/drive.png')}}",
                        iconSize: [24, 24]
                    });
                    running++;
                }
                let marker = L.marker([item.LatitudeY, item.LongitudeX],{icon: century21icon , title: "Plaka " + item.Plaka + "Kimlik  " + item.Node + " Hız : " + item.Speed + " Adres " + item.Address}).addTo(map);
                total++;

            }
            document.getElementById('info').innerText = `Toplam Araç Sayısı:  ${total} Duran Araç Sayısı:  ${stopped} Çalışan Araç Sayısı:  ${running}`
        }

        // const getStatus = async () => {
        //     let xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             console.log(this.responseText);
        //         }
        //     };
        //     xhttp.open("GET", "{{route('alarm.get')}}", true);
        //     xhttp.send();
        // }
        // getStatus()

        loadTrucks();
        setInterval(loadTrucks, 6000);


    </script>

</body>
</html>
