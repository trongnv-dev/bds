var mapStyles = [{featureType:'water',elementType:'all',stylers:[{hue:'#d7ebef'},{saturation:-5},{lightness:54},{visibility:'on'}]},{featureType:'landscape',elementType:'all',stylers:[{hue:'#eceae6'},{saturation:-49},{lightness:22},{visibility:'on'}]},{featureType:'poi.park',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-81},{lightness:34},{visibility:'on'}]},{featureType:'poi.medical',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-80},{lightness:-2},{visibility:'on'}]},{featureType:'poi.school',elementType:'all',stylers:[{hue:'#c8c6c3'},{saturation:-91},{lightness:-7},{visibility:'on'}]},{featureType:'landscape.natural',elementType:'all',stylers:[{hue:'#c8c6c3'},{saturation:-71},{lightness:-18},{visibility:'on'}]},{featureType:'road.highway',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-92},{lightness:60},{visibility:'on'}]},{featureType:'poi',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-81},{lightness:34},{visibility:'on'}]},{featureType:'road.arterial',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-92},{lightness:37},{visibility:'on'}]},{featureType:'transit',elementType:'geometry',stylers:[{hue:'#c8c6c3'},{saturation:4},{lightness:10},{visibility:'on'}]}];


var locations = [
    {"name":"Building 1","address":"Địa chỉ building 1","price":"Đã bán","status":1,"lat":10.8475,"long":106.70191,"image":"images/demo-buildings/property-01.jpg","type":"images/building-types/apartment.png"},
    {"name":"Building 2","address":"Địa chỉ building 2","price":"3 tỷ 4","status":0,"lat":10.8461091,"long":106.7017813,"image":"images/demo-buildings/property-02.jpg","type":"images/building-types/apartment.png"},
    {"name":"Building 3","address":"Địa chỉ building 3","price":"4 tỷ","status":1,"lat":10.8445496,"long":106.7023392,"image":"images/demo-buildings/property-03.jpg","type":"images/building-types/construction-site.png"},
    {"name":"Building 4","address":"Địa chỉ building 4","price":"3 tỷ 6","status":0,"lat":10.8429901,"long":106.7031975,"image":"images/demo-buildings/property-04.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 5","address":"Địa chỉ building 5","price":"3 tỷ 8","status":1,"lat":10.8485116,"long":106.7042274,"image":"images/demo-buildings/property-06.jpg","type":"images/building-types/garage.png"},
    {"name":"Building 6","address":"Địa chỉ building 6","price":"5 tỷ","status":0,"lat":10.8476264,"long":106.705987,"image":"images/demo-buildings/property-08.jpg","type":"images/building-types/houseboat.png"},
    {"name":"Building 7","address":"Địa chỉ building 7","price":"3 tỷ 2","status":1,"lat":10.8488487,"long":106.7080469,"image":"images/demo-buildings/property-07.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 8","address":"Địa chỉ building 8","price":"4 tỷ 1","status":0,"lat":10.8445074,"long":106.7092056,"image":"images/demo-buildings/property-09.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 9","address":"Địa chỉ building 9","price":"3 tỷ 7","status":1,"lat":10.8424843,"long":106.7137546,"image":"images/demo-buildings/property-10.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 10","address":"Địa chỉ building 10","price":"5 tỷ 6","status":0,"lat":10.8400396,"long":106.7107935,"image":"images/demo-buildings/property-08.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 11","address":"Địa chỉ building 11","price":"4 tỷ 2","status":0,"lat":10.8383115,"long":106.7088194,"image":"images/demo-buildings/property-12.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 12","address":"Địa chỉ building 12","price":"2 tỷ 3","status":0,"lat":10.8414306,"long":106.7050428,"image":"images/demo-buildings/property-08.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 13","address":"Địa chỉ building 13","price":"2 tỷ 4","status":1,"lat":10.8424421,"long":106.7018242,"image":"images/demo-buildings/property-01.jpg","type":"images/building-types/apartment.png"},
    {"name":"Building 14","address":"Địa chỉ building 14","price":"2 tỷ 6","status":0,"lat":10.8449289,"long":106.7004509,"image":"images/demo-buildings/property-05.jpg","type":"images/building-types/condominium.png"},
    {"name":"Building 15","address":"Địa chỉ building 15","price":"3 tỷ 1","status":1,"lat":10.847795,"long":106.7103643,"image":"images/demo-buildings/property-06.jpg","type":"images/building-types/construction-site.png"},
    {"name":"Building 16","address":"Địa chỉ building 16","price":"3 tỷ 3","status":0,"lat":10.847795,"long":106.7064161,"image":"images/demo-buildings/property-03.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 17","address":"Địa chỉ building 17","price":"3 tỷ","status":0,"lat":10.8411777,"long":106.7094631,"image":"images/demo-buildings/property-04.jpg","type":"images/building-types/houseboat.png"},
    {"name":"Building 18","address":"Địa chỉ building 18","price":"3 tỷ 2","status":1,"lat":10.8380586,"long":106.7096777,"image":"images/demo-buildings/property-08.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 19","address":"Địa chỉ building 19","price":"3 tỷ 5","status":0,"lat":10.843538,"long":106.7007942,"image":"images/demo-buildings/property-09.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 20","address":"Địa chỉ building 20","price":"3 tỷ 7","status":0,"lat":10.8466149,"long":106.7027254,"image":"images/demo-buildings/property-10.jpg","type":"images/building-types/vineyard.png"},
    {"name":"Building 21","address":"Địa chỉ building 21","price":"3 tỷ 9","status":1,"lat":10.8462355,"long":106.7052574,"image":"images/demo-buildings/property-08.jpg","type":"images/building-types/warehouse.png"},
    {"name":"Building 22","address":"Địa chỉ building 22","price":"3 tỷ 4","status":0,"lat":10.8449289,"long":106.7063303,"image":"images/demo-buildings/property-12.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 23","address":"Địa chỉ building 23","price":"4 tỷ 2","status":1,"lat":10.8413463,"long":106.7083902,"image":"images/demo-buildings/property-10.jpg","type":"images/building-types/apartment.png"},
    {"name":"Building 24","address":"Địa chỉ building 24","price":"3 tỷ 8","status":1,"lat":10.8417256,"long":106.7098923,"image":"images/demo-buildings/property-01.jpg","type":"images/building-types/industrial-site.png"},
    {"name":"Building 25","address":"Địa chỉ building 25","price":"3 tỷ 4","status":1,"lat":10.8404611,"long":106.7098923,"image":"images/demo-buildings/property-02.jpg","type":"images/building-types/construction-site.png"},
    {"name":"Building 26","address":"Địa chỉ building 26","price":"3 tỷ 1","status":0,"lat":10.8406297,"long":106.7122955,"image":"images/demo-buildings/property-03.jpg","type":"images/building-types/cottage.png"},
    {"name":"Building 27","address":"Địa chỉ building 27","price":"3 tỷ 9","status":0,"lat":10.8414306,"long":106.7144842,"image":"images/demo-buildings/property-04.jpg","type":"images/building-types/garage.png"}];


function initialize() {
    var mapOptions = {
        center: { lat: 10.842486522265114, lng: 106.71139668258662},
        zoom: 15,
        maxZoom:20,
        minZoom:1,
        scrollwheel: false
    };
    var map = new google.maps.Map(document.getElementById('google-map'),
        mapOptions);
    var newMarkers = [];
    for (var i = 0; i < locations.length; i++) {
        var pictureLabel = document.createElement("img");
        pictureLabel.src = locations[i].type;
        var boxText = document.createElement("div");
        infoboxOptions = {
            content: boxText,
            disableAutoPan: false,
            //maxWidth: 150,
            pixelOffset: new google.maps.Size(-100, 0),
            zIndex: null,
            alignBottom: true,
            boxClass: "infobox-wrapper",
            enableEventPropagation: true,
            closeBoxMargin: "0px 0px -8px 0px",
            closeBoxURL: "images/close-btn.png",
            infoBoxClearance: new google.maps.Size(1, 1)
        };
        var labelClass="marker-style";
        if(locations[i].status==1){
            labelClass="red-marker-style";
        }
        var marker = new MarkerWithLabel({
            title: locations[i][0],
            position: new google.maps.LatLng(locations[i].lat, locations[i].long),
            map: map,
            icon: 'images/marker.png',
            labelContent: pictureLabel,
            labelAnchor: new google.maps.Point(50, 0),
            labelClass: labelClass
        });
        newMarkers.push(marker);
        boxText.innerHTML =
            '<div class="infobox-inner">' +
            '<a href="' + locations[i][5] + '">' +
            '<div class="infobox-image" style="position: relative">' +
            '<img src="' + locations[i].image + '">' + '<div><span class="infobox-price '+ ((locations[i].status==0)?'blue':'red') +'">' + ((locations[i].status==0)?'Chưa bán':'Đã bán') + '</span></div>' +
            '</div>' +
            '</a>' +
            '<div class="infobox-description">' +
            '<div class="infobox-title"><a href="'+ locations[i].name +'">' + locations[i].name + '</a></div>' +
            '<div class="infobox-location">' + locations[i].address + '</div>' +
            '</div>' +
            '</div>';
        //Define the infobox
        newMarkers[i].infobox = new InfoBox(infoboxOptions);
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                for (h = 0; h < newMarkers.length; h++) {
                    newMarkers[h].infobox.close();
                }
                newMarkers[i].infobox.open(map, this);
            }
        })(marker, i));

    }
    var clusterStyles = [
        {
            url: 'images/cluster.png',
            height: 37,
            width: 37
        }
    ];
    var markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 2});

    var imageBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(10.8367762,106.6967579),
        new google.maps.LatLng(10.8510930,106.7203760));
    imageOverlay = new google.maps.GroundOverlay(
        'images/map-overlay.png',
        imageBounds);
    imageOverlay.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);