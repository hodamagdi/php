<?php
phpinfo();

$website_name='HODA';
define('website_name','HODA');
echo $website_name;
 
echo($_SERVER['SERVER_NAME'])."<br>";
echo($_SERVER['SERVER_ADDR'])."<br>";
echo($_SERVER['SERVER_PORT']);

echo(__FILE__);

$BROTHER_AGE=10;
switch(true){
    case($BROTHER_AGE <5):
    echo"stay at home";
    break;
    case($BROTHER_AGE == 5):
    echo"Go to Kindergarden";
    break;
    case($BROTHER_AGE > 5 && $BROTHER_AGE < 13):
    echo"Go to grade";
}
?>