<?php

// http://vk.com/dev/wall.post
include_once 'Data/new_respuesta.php';
include_once 'Data/config.php';
include_once 'lib/vk.php';
$v = new Vk($config);

$unico= uniqid();
$img1= file('Datos/img_tumblr.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
	
if($img1 == null)die('Fin por falta de imagenes!');

$image = $img1[0];

$image_url = $image;
$image_file = $unico.".jpg";
$dir = "img/";          
$fp = fopen($dir . basename($image_url), "w+");
$ch2 = curl_init($image_url);
curl_setopt($ch2, CURLOPT_FILE, $fp);          
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_TIMEOUT, 10);      
curl_setopt($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0');
curl_exec($ch2);
curl_close($ch2);                              
fclose($fp);

$archivo_destino = $dir . basename($image_url);


$attachments = $v->upload_photo(0, array($archivo_destino), false);
$proses = implode(',', $attachments);

  // публикация на стене
  $response = $v->wall->post(array(
  //'owner_id' => -76629376,
    'message' => $respuesta ,
	'friends_only' => 0,
	//'services' => 'facebook',
    'attachments' => $proses,//',http://chicassexyhot.sigue.la/2018/01/atheltic-girl-showing-her-perfect-body.html',
	//'attachments' =>'http://chicassexyhot.sigue.la/2018/01/adult-baby-in-diapers-assfucked-by-mom.html'
    )
  );
  
 unlink($archivo_destino);
 
 
 //ELIMINAMOS LA  LINEA 0 Y SU CONTENIDO 
$i=0; 
$numlinea = 0; //línea que se desea borrar
$aux = array();
// Abrimos el archivo
$archivo = fopen(__DIR__ .'/Datos/img_tumblr.txt','r');
if($archivo){
// Hacemos un ciclo y vamos recogiendo linea por linea del archivo.
while ($linea = fgets($archivo)){
// Si la linea que deseamos eliminar no es esta 
if ($i != $numlinea){  
$aux[] = $linea; // La agregamos a nuestra variable auxiliar
                  }
// Incrementamos nuestro contador de lineas
$i++;
}

// Cerramos el archivo.
fclose($archivo);
// Convertimos el arreglo(array) en una cadena de texto (string) para guardarlo.
$aux = implode($aux, '');
// Reemplazamos el contenido del archivo con la cadena de texto (sin la linea eliminada)
file_put_contents(__DIR__ .'/Datos/img_tumblr.txt', $aux);
}
 
 
 /*
 echo $proses;
 
	

$cadena ='';
    $directory="img";
    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {
    if (preg_match( '/\.(?:jpe?g|png|gif)$/i', $archivo)) {
    $cadena .= $directory."/".$archivo.",\n";
    }
    }
    $dirint->close();
	$array = explode(",", $cadena);
	echo $array[0];
	
	 unlink($array[0]);
  
	 
$cadena =''; 
$directory= 'img/';
foreach (glob($directory. '*.{jpg,JPG,jpeg,JPEG}', GLOB_BRACE) as $archivo) {
	
	$cadena .= $archivo.",\n";
}
	$array = explode(",", $cadena);
	echo $array[0];
	
	*/
?>