<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;



class SiteController extends Controller
{



    public function test(){
        return "test";
    }


    public function getall(){
        $allUsers = Article::all();
        dd( $allUsers);
    }
}
