<!-- 
// $fichero = $_GET['file'];
// $name = $_GET['name'];

// header('Content-Description: File Transfer');
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="'.$fichero.'.mp3"');
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Length: ' . filesize($fichero));
// readfile($fichero);
// exit;

// $idfichero = $_GET['id'];
// $response = http_get("https://api.soundcloud.com/tracks/".$idfichero."/stream?consumer_key=02gUJC0hH2ct1EGOcYXQIzRFU91c72Ea", array("timeout"=>1), $info);
// print_r($info);
// $http_response_header;
// function get_contents() {
//   file_get_contents("https://api.soundcloud.com/tracks/".$idfichero."/stream?consumer_key=02gUJC0hH2ct1EGOcYXQIzRFU91c72E");
//   var_dump($http_response_header);
// }
// get_contents();
// var_dump($http_response_header);

//   -->
<?php


// if (!$fp = fopen($url, 'r')) {
//     trigger_error("Incapaz de abrir la URL ($url)", E_USER_ERROR);
// }

// $meta = stream_get_contents($fp);
// echo $meta;

// fclose($fp);

// function my_url(){
//     $url = (!empty($_SERVER['HTTPS'])) ?
//                "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] :
//                "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
//     echo $url;
// }
// my_url();
$name = $_GET['name'];
$id = $_GET['file'];
$key = $_GET['_key'];
$dirMp3    = 'mp3/';
$files = scandir($dirMp3);
$fileDir = 'mp3/'.$name.'.mp3';
if (in_array($name.'.mp3', $files)) {
	getMp3($fileDir,$name);
}else{
	$url = 'https://api.soundcloud.com/tracks/'.$id.'/stream?consumer_key='.$key;
	$header = get_headers($url);
	$urlMp3 = str_replace("Location: ","",$header[8]);
	file_put_contents($fileDir, file_get_contents($urlMp3));
	getMp3($fileDir,$name);
}
function getMp3($path,$name){
	header('Content-Type: application/force-download');
	header('Content-Disposition: attachment; filename="'.$name.'.mp3"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($path));
	readfile($path);
	exit;
}


// $getContent = file_get_contents($urlMp3);
// var_dump($getContent);

// $curlSession = curl_init();
// curl_setopt($curlSession, CURLOPT_URL, 'https://chart.googleapis.com/chart?cht=p3&chs=250x100&chd=t:60,40&chl=Hello|World&chof=json');
// curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
// curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

// $jsonData = json_decode(curl_exec($curlSession));
// curl_close($curlSession);

// header('Content-Description: File Transfer');
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="mio.mp3"');
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Length: ' . filesize($urlMp3));
// readfile($urlMp3);
// exit;

// function get_contents() {
//   file_get_contents("https://api.soundcloud.com/tracks/193698625/stream?consumer_key=02gUJC0hH2ct1EGOcYXQIzRFU91c72Ea");
//   var_dump($http_response_header);
// }
// get_contents();
// var_dump($http_response_header);


// $response = file_get_contents("https://api.soundcloud.com/tracks/193698625/stream?consumer_key=02gUJC0hH2ct1EGOcYXQIzRFU91c72Ea");
// header('Content-Description: File Transfer');
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="myfile.mp3"');
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Length: ' . filesize($response));
// readfile($response);
// exit;


// $file = 'https://api.soundcloud.com/tracks/193698625/stream?consumer_key=ae1c0d2a28b3eae3bd0d11eb9e1704a4';
// download($file);

// function download($url) {
// 	$ch = curl_init();
// 	curl_setopt($ch, CURLOPT_URL, $url);
// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// 	$data = curl_exec($ch);
// 	curl_close ($ch);
// 	header('Expires: 0'); // no cache
//     // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//     // header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
//     // header('Cache-Control: private', false);
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="' . basename($url) . '.mp3"');
//     // header('Content-Transfer-Encoding: binary');
//     header('Content-Length: ' . strlen($data)); // provide file size
//     header('Connection: close');
//     echo $data;
	

    // set_time_limit(0);
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $host);
    // curl_setopt($ch, CURLOPT_VERBOSE, 1);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    // curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
	// curl_setopt($ch, CURLOPT_URL, $url);
	// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    // $r = curl_exec($ch);
    // curl_close($ch);
    // header('Expires: 0'); // no cache
    // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    // header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
    // header('Cache-Control: private', false);
    // header('Content-Type: application/force-download');
    // header('Content-Disposition: attachment; filename="' . basename($url) . '.mp3"');
    // header('Content-Transfer-Encoding: binary');
    // header('Content-Length: ' . strlen($r)); // provide file size
    // header('Connection: close');
    // echo $r;
// }
// var_dump(stream_get_wrappers());
?>

