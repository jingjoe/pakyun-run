<?php
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use edofre\markerclusterer\Map;
use edofre\markerclusterer\Marker;

$this->title = 'Google Map Cluster';
?>
<?php
$map = new Map([
    'center' => new LatLng(['lat' => 15, 'lng' => 100]),
    'zoom' => 15,
    'width' => '100%',
    'height' => '600',
    'containerOptions' => [
        'id' => 'map-canvas',
    ]
]);
foreach ($markers as $key => $val) {

//var_dump($val);
$marker = new Marker([
    'position' => $val['lat_long'],
    'title' => $val['place'],
    'clickable' => true,
    //'icon' => 'https://mapicons.mapsmarker.com/wp-content/uploads/mapicons/shape-default/color-5ec8bd/shapecolor-dark/shadow-1/border-white/symbolstyle-white/symbolshadowstyle-no/gradient-no/departmentstore.png',
]);

$marker->attachInfoWindow(new InfoWindow(['content' => "
<h4><strong>{$val['place']}</strong></h4>

<table class='table table-bordered'>
    <tr>
        <td>Latitude/Longitude</td>
        <td>{$val['lat_long']}</td>
    </tr>
</table>
       
"]));
$map->addOverlay($marker);
}
$map->center = $map->getMarkersCenterCoordinates();//กำหนดให้แผนที่อยู่ตรงกลางใน Marker
$map->zoom = $map->getMarkersFittingZoom() - 1;

?>

<div class="row">
    <div class="col-sm-12 text-center">
        <?= $map->display(); ?>
    </div>
</div>