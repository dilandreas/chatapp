<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
$_POST = json_decode(file_get_contents('php://input'), true);
require('../vendor/autoload.php');
define("APP_KEY", 'cabcc969c12fd8e852cd');
define("APP_SECRET", 'ce28ec76bee486ecff35');
define("APP_ID", '531270');
$pusher = new Pusher(
	APP_KEY, APP_SECRET, APP_ID, [
		'cluster' 	=> 'ap1',
		'encrypted'	=>	true
	]
);

if($GET_['method'] == 'sendMessage'){
	$data['username'] 	== $_POST['username'];
	$data['message'] 	== $_POST['message'];
	$data['time'] 		== $_POST['time'];
	$pusher->trigger('chat-channel','chat-event',$data);

}

// app_id = "531270"
// key = "cabcc969c12fd8e852cd"
// secret = "ce28ec76bee486ecff35"
// cluster = "ap1"
