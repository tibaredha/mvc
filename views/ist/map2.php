<?php
//<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAu2TJGLg9TUlanp3meAS2Z0Gl-p9CwyMo&sensor=false"></script>
//https://maps.google.fr/  SITE POUR AVOIRE LES COORDONNES
?>

<script>
var myCenter=new google.maps.LatLng(36.365786,6.611227);
function initialize()
{
var mapProp = {center:myCenter,zoom:9,mapTypeId:google.maps.MapTypeId.ROADMAP};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker=new google.maps.Marker({position:myCenter,});
marker.setMap(map);  
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>


<div   id="map"     >
<?php
echo "</BR>";
echo "<div id=\"googleMap\" style=\"width:100%;height:380px;\"></div>";
?>
</div>	