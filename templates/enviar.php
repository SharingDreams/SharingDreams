<?php
/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 13/02/2015
 * Time: 19:39
 */

$pesq = $_GET["q"];
$id = $_GET["id"];
header("Location: /".$id."/".$pesq."/");