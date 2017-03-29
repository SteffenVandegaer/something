<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class aboutController extends Controller{
    public function __invoke(){
        return view('pages.about');
    }
}