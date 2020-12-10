<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        1 => [
            'title' => 'news 1',
        ],
        2 => [
            'title' => 'news 2',
        ],
    ];


    public function index()
    {

        foreach ($this->news as $id => $item) {
            $url = route('news-card', ['id' => $id]);
            echo "<div><a href='{$url}'>{$item['title']}</a></div>";
        }

        echo "this is main page";
        exit;
    }

    public function newsCard($id)
    {
        echo "concrete news {$id}";
        exit;
    }
}
