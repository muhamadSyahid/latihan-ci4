<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dosen extends BaseController
{
    public function display()
    {
        return view('hello-world');
    }
}
