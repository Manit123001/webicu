
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <title>I Care U</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {

        height: 100%;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: blue;
      }
      a,#date_time{
        color: white;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="date_time.js"></script>
  </head>

  <body>

  <div style="height: 17%; " align="center">
    <h1 style="color: white">ICAREU แจ้งเหตุทั่วไป</h1>
     <span id="date_time"></span><br>
     <script type="text/javascript">window.onload = date_time('date_time');</script>
  </div>

    <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

var map;
var markerA= [];
  

        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(13.75664, 100.50190),
          zoom: 11
        });

        
       var infoWindow;




          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://icareuserver.comscisau.com/org/etc0.php', function(data) {
            infoWindow = new google.maps.InfoWindow;
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');

            Array.prototype.forEach.call(markers, function(markerElem) {
              var subject = markerElem.getAttribute('subject');
              var detail = markerElem.getAttribute('detail');
              var type = markerElem.getAttribute('type');
              var flname = markerElem.getAttribute('flname');
              var tel = markerElem.getAttribute('tel');
              var img = markerElem.getAttribute('img');

              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng'))
              );

              var infowincontent = document.createElement('div');

              var xx = document.createElement('center');
              var yy = document.createElement('h2');       
              yy.textContent = "ข้อมูลการแจ้งเหตุ"                 
              xx.appendChild(yy);   
              infowincontent.appendChild(xx);          
              

              var aa = document.createElement('b');
              aa.textContent = 'ประเภทการแจ้งเหตุ';
              infowincontent.appendChild(aa);
              infowincontent.appendChild(document.createElement('br'));

              var strong = document.createElement('text');   
              strong.textContent = subject;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));


              var bb = document.createElement('b');
              bb.textContent = 'รายละเอียดการแจ้งเหตุ';
              infowincontent.appendChild(bb);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');             
              text.textContent = detail;
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));


              var cc = document.createElement('b');
              cc.textContent = 'รูปภาพการแจ้งเหตุ';
              infowincontent.appendChild(cc);
              infowincontent.appendChild(document.createElement('br'));

              var elem = document.createElement("img");
              elem.setAttribute("src", img);
              elem.setAttribute("height", "180");
              elem.setAttribute("width", "180"); 
              infowincontent.appendChild(elem);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));


              var dd = document.createElement('b');
              dd.textContent = 'ข้อมูลผู้แจ้งเหตุ';
              infowincontent.appendChild(dd);
              infowincontent.appendChild(document.createElement('br'));

              var flname1 = document.createElement('text');             
              flname1.textContent = 'ชื่อ : ' + flname;
              infowincontent.appendChild(flname1);
              infowincontent.appendChild(document.createElement('br'));

              var tel1 = document.createElement('text');             
              tel1.textContent = 'เบอร์โทรศัพท์ติดต่อ : ' + tel;
              infowincontent.appendChild(tel1);



              //var icon = customLabel[type] || {};
              var iconBase;              
              if(type == "ไฟฟ้าขัดข้อง"){
                iconBase = 'marker/b1.png';
              }else if(type == "ปะปาชำรุด"){
                iconBase = 'marker/b2.png';
              }else if(type == "จุดเสี่ยง"){
                iconBase = 'marker/b3.png';
              }else if(type == "ถนนชำรุด"){
                iconBase = 'marker/b4.png';
              }else{
                iconBase = 'marker/b5.png';
              }
                           

              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: iconBase
                //label: icon.label
              });

              

              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

              markerA.push(marker);
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

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function clearOverlays() {
for (var i = 0; i < markerA.length; i++ ) {
      markerA[i].setMap(null);
    }
    markerA = [];
  } 


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$(function(){  
   setInterval(function(){
      console.log('xxx');
clearOverlays();
      downloadUrl('http://icareuserver.comscisau.com/org/etc0.php', function(data) {
        infoWindow = new google.maps.InfoWindow;
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');

             Array.prototype.forEach.call(markers, function(markerElem) {

            var subject = markerElem.getAttribute('subject');
              var detail = markerElem.getAttribute('detail');
              var type = markerElem.getAttribute('type');
              var flname = markerElem.getAttribute('flname');
              var tel = markerElem.getAttribute('tel');
               var img = markerElem.getAttribute('img');

              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng'))
              );

              var infowincontent = document.createElement('div');

              var xx = document.createElement('center');
              var yy = document.createElement('h2');       
              yy.textContent = "ข้อมูลการแจ้งเหตุ"                 
              xx.appendChild(yy);   
              infowincontent.appendChild(xx);          
              

              var aa = document.createElement('b');
              aa.textContent = 'ประเภทการแจ้งเหตุ';
              infowincontent.appendChild(aa);
              infowincontent.appendChild(document.createElement('br'));

              var strong = document.createElement('text');   
              strong.textContent = subject;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));


              var bb = document.createElement('b');
              bb.textContent = 'รายละเอียดการแจ้งเหตุ';
              infowincontent.appendChild(bb);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');             
              text.textContent = detail;
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));


              var cc = document.createElement('b');
              cc.textContent = 'รูปภาพการแจ้งเหตุ';
              infowincontent.appendChild(cc);
              infowincontent.appendChild(document.createElement('br'));

              var elem = document.createElement("img");
              elem.setAttribute("src", img);
              elem.setAttribute("height", "180");
              elem.setAttribute("width", "180"); 
              infowincontent.appendChild(elem);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));


              var dd = document.createElement('b');
              dd.textContent = 'ข้อมูลผู้แจ้งเหตุ';
              infowincontent.appendChild(dd);
              infowincontent.appendChild(document.createElement('br'));

              var flname1 = document.createElement('text');             
              flname1.textContent = 'ชื่อ : ' + flname;
              infowincontent.appendChild(flname1);
              infowincontent.appendChild(document.createElement('br'));

              var tel1 = document.createElement('text');             
              tel1.textContent = 'เบอร์โทรศัพท์ติดต่อ : ' + tel;
              infowincontent.appendChild(tel1);



              //var icon = customLabel[type] || {};
              var iconBase;              
              if(type == "ไฟฟ้าขัดข้อง"){
                iconBase = 'marker/b1.png';
              }else if(type == "ปะปาชำรุด"){
                iconBase = 'marker/b2.png';
              }else if(type == "จุดเสี่ยง"){
                iconBase = 'marker/b3.png';
              }else if(type == "ถนนชำรุด"){
                iconBase = 'marker/b4.png';
              }else{
                iconBase = 'marker/b5.png';
              }
                           

              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: iconBase
                //label: icon.label
              });

             

              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

              markerA.push(marker);

            });

      });


   },5000);      
});  

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


      function doNothing() {}
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk3toqUfHDv7vpFQL_2pIyOymcGYC8-jk&callback=initMap">

    </script>
  </body>
</html>