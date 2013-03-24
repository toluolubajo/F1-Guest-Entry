<?php

require('../lib/FellowshipOne.php');
require('../lib/FellowshipOne/Groups.php');
require('../lib/F1_OAuthConsumer.php');
$config = parse_ini_file('../lib/config.ini');
$successMessage = '';
$errorMessage = '';
$oauthConsumer = new F1_OAuthConsumer($config);
$f1 = new FellowshipOne($oauthConsumer);
if (!$config) {
    die("Wrong configuration file or settings");
}
if (($r = $f1->login()) === false) {
    die("Failed to login");
}