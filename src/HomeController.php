<?php

namespace Exan\Phprint;

class HomeController
{
    public function index(): void
    {
        echo file_get_contents(__DIR__ . '/pages/index.html');
    }
}
