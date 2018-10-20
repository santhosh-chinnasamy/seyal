<?php
$db= new Mysqli;

$db-> connect('localhost','root','root','crud');

if($db){
    echo "success";
}

?>