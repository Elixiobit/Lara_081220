<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        echo "admin index"; exit;
    }

    public function create(Request $request)
    {

        return redirect()->route('admin::news::create');
        /*$route = route('admin::news::create');
        return response('')->header("Location", $route);*/
    }

    public function createView()
    {
        return view('admin.news.create');
    }


    public function update()
    {
        echo "admin update"; exit;
    }
}
