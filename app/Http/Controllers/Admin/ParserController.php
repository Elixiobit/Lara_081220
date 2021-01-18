<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {

        $xml = XmlParser::load('https://3dnews.ru/news/rss/');
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description]'],
        ]);

        dd($data);
    }
}
