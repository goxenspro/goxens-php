<?php

namespace Goxens;


require '../vendor/autoload.php';

include_once '../src/Goxens.php';


$apiKey = 'YOUR_API_KEY';
$userUid = 'YOUR_USER_ID';


$goxens =  new Goxens($apiKey, $userUid);

$solde = $goxens->verifySolde($apiKey);


var_dump($solde);