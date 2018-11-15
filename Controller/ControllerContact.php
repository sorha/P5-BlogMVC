<?php

require_once 'Framework/Controller.php';

class ControllerContact extends Controller
{
    
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $this->generateView(array());
    }
}