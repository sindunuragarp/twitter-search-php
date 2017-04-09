<?php
/**
 * Created by PhpStorm.
 * User: sindunuragarp
 * Date: 9-4-17
 * Time: 22:47
 */

namespace App\Http\Controllers;

class SearchController
{
    public function index()
    {
        return view('search.home');
    }

    public function search()
    {
        $response = [];
        dd($response);
    }
}