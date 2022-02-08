<?php

namespace Goxens;


require '../vendor/autoload.php';

include_once '../src/Goxens.php';

# Initialize the Goxens class

$apiKey = 'YOUR_API_KEY';
$userUid = 'YOUR_USER_ID';

# Create a new Goxens instance

$goxens =  new Goxens($apiKey, $userUid);

############### Get user solde ###############

$solde = $goxens->verifySolde($apiKey);

var_dump($solde);



####################### send SMS ##############################

$sender = 'Goxens'; // Valid sender name
$number = '+229XXXXXXXX ';
$message = 'Bienvenue sur Goxens';

$send = $goxens->sendSms($apiKey,$userUid,$number,$sender,$message);

var_dump($send);
