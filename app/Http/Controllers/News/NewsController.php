<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsAPI;

    public function __construct()
    {
        $this->newsAPI = new NewsAPIController();
    }

    public function index(Request $request)
    {

        $sources = $request->input('sources');
        $from = $request->input('from');
        $to = $request->input('to');

        if ($query = $request->input('q') || $sources) {
            // return $this->topHeadLines($query, $sources);
            return $this->newsAPI->getEverythingAbout($query, $sources, null, null, $from, $to);
        } else {
            return $this->topHeadLines('');
        }
    }

    public function topHeadLines($query, $sources = null)
    {
        return $this->newsAPI->getTopHeadlines($query, $sources);
    }

    public function categories()
    {
        return $this->newsAPI->getCategories();
    }

    public function sources(Request $request)
    {
        $cat = $request->input('category');

        return $this->newsAPI->getSources($cat);
    }

    public function authors(Request $request)
    {
        $sources = $request->input('sources');

        $news = $this->newsAPI->getEverythingAbout(null, $sources);
        $authors = [];

        foreach ($news->articles as $key => $value) {
            if (!$value->author) continue;

            $authors[] = $value->author;
        }

        $uniqueData = array_unique($authors);

        return response()->json(array_merge($uniqueData));

        // return $this->newsAPI->getEverythingAbout(null, $sources);
    }
}
