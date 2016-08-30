<?php

class Controller
{
    public $model;

    function __construct()
    {
        $this->view = new View();
    }
}