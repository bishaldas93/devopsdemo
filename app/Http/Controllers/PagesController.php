<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;

class PagesController extends Controller
{
    public function index(){

        $title = 'Welcome To Laravel World...!';
                return view('pages.index', compact('title'));
    }
        
    public function about(){

        $title = 'About Us';
                return view('pages.about', compact('title'));
        }
        

    public function services(){
        $data=array(
            'title'=>'Services',
            'services'=>['Web Design', 'CEO', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
