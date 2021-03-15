<?php

namespace App\Http\Controllers;

use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Storage;

class SpiderController extends Controller
{
    public function sign_in()
    {
        $link = 'https://codecourse.com/api/auth/login';
        $login = 'tikken23@gmail.com';
        $pass = 'ZAGeF@HrdAN@z4u';
        $crawler = $this->create_crawler($link);
    }
    public function parse($link, $jsonToSave)
    {
        $crawler = $this->create_crawler($link);
        $links = $this->get_all_links($crawler);
        $json = $this->create_json($jsonToSave, $links);

        return $json;
    }

    /**
     * @param $link
     */
    public function create_crawler($link)
    {
        $html = file_get_contents($link);
        $crawler = new Crawler(null, $link);
        $crawler->addHtmlContent($html, 'UTF-8');

        return $crawler;
    }

    public function get_all_images($crawler)
    {
        $images = $crawler->filter('img')->each(function($node) {
            $src = $node->attr('src');

            return compact('src');
        });

        return $images;
    }
    /**
     * Symfony dom crawler
     * @param $crawler
     */
    public function get_all_links($crawler)
    {
        $links = $crawler->filter('a')->each(function($node) {
            $href  = $node->attr('href');
            $title = $node->text();

            return compact('href', 'title');
        });

        return $links;
    }

    public function get_all_iframes($crawler)
    {
        $frames = $crawler->filter('iframe')->each(function($node) {
            $src  = $node->attr('src');

            return compact( 'src');
        });

        return $frames[0]['src'];
    }

    /**
     * Obj should be result of get_all_links func
     * @param $filename
     * @param $obj
     */
    public function create_json($filename, $obj)
    {
        $safeObj = json_decode(json_encode($obj));

        if(Storage::disk('local')->has($filename)) {
            Storage::get($filename);
        }

        Storage::disk('local')->put($filename, json_encode($safeObj));

        return Storage::get($filename);
    }
}
