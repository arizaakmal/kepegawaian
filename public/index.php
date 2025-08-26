<?php
require_once '../config/database.php';
require_once '../app/controller/HomeController.php';

$controller = new HomeController();
$controller->index();
