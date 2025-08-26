<?php
require_once '../config/database.php';
require_once '../app/model/Model.php';

class HomeController
{
    public function index()
    {
        include '../app/view/home.php';
    }
}
