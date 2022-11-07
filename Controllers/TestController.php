<?php
namespace App\Controllers;


class TestController extends Controller
{
    public function index()
    {
        $this->render('test/index');
    }

    public function test()
    {
        $test ="J'envoie a la vue";
        $this->render('test/test');
    }
}