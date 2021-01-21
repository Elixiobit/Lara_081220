<?php


namespace App\Services;


use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser
{
    public function parse($source)
    {
        try {
            $xml = XmlParser::load($source);
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'description' => ['uses' => 'channel.description'],
                'items' => ['uses' => 'channel.item[title, description]'],
            ]);
        } catch (\Exception $e) {
            dd($source);
        }
    }
}
