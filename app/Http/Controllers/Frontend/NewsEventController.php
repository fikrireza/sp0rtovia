<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DateTime;
use App\Models\NewsEvent;
use App\Models\ConfigContent;

class NewsEventController extends Controller
{
    function index(){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

		$callEventNew = NewsEvent::select(
            'id',
    		'judul',
    		'deskripsi',
    		'img_banner',
    		'slug'
    	)
    	->where('news_event', '0')
    	->where('flag_publish', '1')
        ->whereDATE('tanggal_publish', '<=', $format_date)
        ->orderBy('tanggal_event', 'desc')
    	->first();
    	
    	$callEvent = NewsEvent::select(
    		'judul',
    		'deskripsi',
    		'img_thumb',
    		'slug'
    	)
    	->where('news_event', '0')
    	->where('flag_publish', '1')
        ->whereDATE('tanggal_publish', '<=', $format_date)
        ->orderBy('tanggal_event', 'desc')
    	->get();

    	$callNews = NewsEvent::select(
    		'judul',
    		'deskripsi',
    		'img_thumb',
    		'slug'
    	)
    	->where('news_event', '1')
    	->where('flag_publish', '1')
        ->whereDATE('tanggal_publish', '<=', $format_date)
        ->orderBy('tanggal_publish', 'desc')
    	->get();

        $callConfigContent = ConfigContent::find(2);

	    return view('frontend.news-event-page.index', compact(
	    	'callEventNew',
	    	'callEvent',
	    	'callNews',
            'callConfigContent'
	    ));
	}

	function view($slug){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

    	$call = NewsEvent::select(
            'id',
    		'news_event',
    		'judul',
    		'deskripsi',
    		'img_banner',
    		'slug'
    	)
        ->where('slug', $slug)
    	->where('flag_publish', '1')
        ->whereDATE('tanggal_publish', '<=', $format_date)
    	->first();
        
        if($call == null){
            abort(404);
        }
        else{
    	    return view('frontend.news-event-page.view', compact(
    	    	'call'
    	    ));
        }
        
	}

}
