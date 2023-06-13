<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;

class NewsAPIController
{
    const API_KEY = 'd88ece46dce84c3f92aedc3289515a52';
    // const API_KEY = 'e06e6caaa16f412c805c5193e53d5477';
    // const API_KEY = 'fdaa44b7399a4dcbba984ad487dc2ed9';

    protected $news_api;

    public function __construct()
    {
        $this->news_api = $this->setup();
    }

    public function setup()
    {
        return new NewsApi(self::API_KEY);
    }

    public function getEverythingAbout($q = null, $sources = null, $domains = null, $exclude_domains = null, $from = null, $to = null)
    {
        return $this->news_api->getEverything($q, $sources);
    }

    public function getTopHeadlines($q, $sources = null, $country = 'us', $category = null)
    {

        // $sources = $this->getSources('business', 'en', 'us');

        // $sourcesString = '';
        // foreach ($sources->sources as $key => $value) {
        //     $sourcesString .= $value->id . ',';
        // }

        if (!$sources) {
            # code...
            return $this->news_api->getTopHeadlines($q, null, 'us', $category, 10);
        } else {
            return $this->news_api->getTopHeadlines($q, $sources);
        }
    }

    public function getCategories()
    {
        return $this->news_api->getCategories();
    }

    public function getSortBy()
    {
        return $this->news_api->getSortBy();
    }

    function getSources($category, $language = 'en', $country = 'us')
    {
        return  $this->news_api->getSources($category, $language, $country);
    }
}
