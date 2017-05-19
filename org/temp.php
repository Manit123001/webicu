
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {

        height: 100%;
        width: 70%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  </head>

  <body>

  <table width="100%" border="1">
    <tr><td colspan="2">I Care U</td></tr>
    <tr>
      <td>
      <div id="map"></div>
      </td>
      <td></td>
    </tr>
  </table>


    

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

var map ;
  

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(13.75664, 100.50190),
          zoom: 12
      });

        
       var infoWindow = new google.maps.InfoWindow;




          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/iCareU/test2.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');

            Array.prototype.forEach.call(markers, function(markerElem) {
              var subject = markerElem.getAttribute('subject');
              var detail = markerElem.getAttribute('detail');
              var type = markerElem.getAttribute('type');
              var flname = markerElem.getAttribute('flname');
              var tel = markerElem.getAttribute('tel');

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
              elem.setAttribute("src", "http://icareuserver.comscisau.com/icare/images/1489077814678.jpg");
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
              if(type ==1){
                iconBase = 'marker/a11.png';
              }else if(type == 2){
                iconBase = 'marker/a22.png';
              }else if(type == 3){
                iconBase = 'marker/a33.png';
              }else{
                iconBase = 'marker/a44.png';
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



$(function(){  
   setInterval(function(){
      console.log('xxx');
      downloadUrl('http://localhost/iCareU/test2.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');

             Array.prototype.forEach.call(markers, function(markerElem) {

            });

      });


   },1000);      
});  

      function doNothing() {}
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk3toqUfHDv7vpFQL_2pIyOymcGYC8-jk&callback=initMap">

    </script>
  </body>
</html>