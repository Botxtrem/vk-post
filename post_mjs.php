<?php
include_once 'Data/new_respuesta.php';
include_once 'Data/config.php';
include_once 'lib/vk.php';


$v = new Vk($config);

// example post to user wall
// Method info https://vk.com/dev/wall.post

$response = $v->api('wall.post', array(
    'message' => $respuesta ,
	'friends_only' => 0,
	'services' => 'facebook',
));

// or
/*
$response = $v->wall->post(array(
    'message' => 'I testing API form https://github.com/fdcore/vk.api'
	//'publish_date' => '1516807533',
	'from_group' => 1,
		'from_group' => 1,
	'owner_id' => 76629376,
	//'attachments' => 'http://chicassexyhot.sigue.la/',
));
*/
?>