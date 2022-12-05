<?php

namespace App\Http\Controllers;


class PostController extends Controller
{


    public function first()
    {
    return view('first');
    }

    public function index()
    {
        return view('index');
    }






    public function authentification()
    {
        return view('authentification');
    }

    public function tbl_bootstrap()
    {
        return view('tbl_bootstrap');
    }

    public function sample_page()
    {
        return view('sapmle_page');
    }


}