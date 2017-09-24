<?php 
require "autoload.php";

define("URL_SITIO","http://localhost/conferencias_php");

$apiContent= new \PayPal\Rest\ApiContext( new \PayPal\Auth\OAuthTokenCredential(
	"Ac-ncmTWoqX4RMyKIfC-rjZS5h_T4WQ5XlZ9zwhJ-mmFwJWJU8PEXVnDzfmTiSl3Z0yedOMAX0b1lmtw",
	"ENT3ApmWQzE8mh6iVuM6755tPfVKi4BhWp4bwPStWqE8gWCyHflno_PtO70nv_n4MyKXyraYnAC2N6wk"
)

);




 ?>

