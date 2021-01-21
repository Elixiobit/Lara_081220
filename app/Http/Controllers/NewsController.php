<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    private $categories = [
        1 => 'Здоровье',
        2 => 'ИТ',
        3 => 'Спорт'
    ];

    public function index()
    {
        return view(
            'news.index',
            [
                'categories' => $this->categories,
            ]);
    }

    public function list($categoryId)
    {
        /** @var News[] $news */
        $news = (new News())->getByCategoryId($categoryId);

        return view(
            'news.list',
            [
                'news' => $news
            ]);
    }

    public function newsCard($id)
    {
        $news = News::find($id);
        return view(
            'news.card',
            [
                'news' => $news,
            ]
        );
    }

    public function upload(Request $request)
    {
        if($request->isMethod('post')){
            $request->file('file')->store('uploads');
        }
        return view('news.upload');
    }


}
