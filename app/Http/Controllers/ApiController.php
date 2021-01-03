<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{News, Stat};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index(Request $request, News $news)
    {
    	// options
    	$limit = (isset($request->limit)) ? $request->limit : 8;
    	$paginator = $this->paginator($request->page, $limit);
    	$order_by = isset($request->order_by) ? $request->order_by : 'latest';
    	$tag = isset($request->tag) ? $request->tag : null;
    	$source = isset($request->source) ? $request->source : null;
    	$keyword = isset($request->keyword) ? $request->keyword : null;

    	$options = [
    		'tag' => $tag,
    		'source' => $source,
    		'keyword' => $keyword,
    	];

    	// default response is latest news
    	$data = $news->getAll($paginator[0], $paginator[1], ['created_at', 'desc'], $options);
    	// check if there is getAll
    	if($order_by == 'oldest'){
    		$data = $news->getAll($paginator[0], $paginator[1], ['created_at', 'asc'], $options);
    	}
    	else if($order_by == 'popular'){
    		$data = $news->getAll($paginator[0], $paginator[1], ['views', 'desc'], $options);
    	}

    	// rebuild the structure of JSON
    	$data = collect($data)->map(function($collection, $key){
    		$collect = (object)$collection;
    		return [
    			'id' => $collect->id,
    			'title' => $collect->title,
    			'image' => $collect->image,
    			'link' => env('app_url').'/go/'.$collect->id,
    			'tag' => $collect->tag,
    			'source' => $collect->source,
    			'views' => $collect->views,
    			'created_at' => $collect->created_at,
    		];
    	});


    	// return the response to JSON
    	return response()->json($data, 200);
    }

    public function tags()
    {
        $data = News::groupBy('tag')
                ->select('tag', DB::raw('count(*) as total'))
                ->orderBy('total', 'desc')
                ->get();

        return response()->json($data);
    }

    public function stat()
    {
    	$stat = Stat::find(1);
    	$total_views = $stat->total_views;
    	$api_hits = $stat->api_hits;

    	$data = [
    		'total_views' => $total_views,
    		'api_hits' => $api_hits,
    		'total_news' => News::count(),
    		'news_today' => News::whereDate('created_at', Carbon::today())->count()
    	];

    	return response()->json($data, 200);
    }

    public function goto(Request $request, News $news)
    {
    	$target = $news->find($request->id);
    	
    	$target->increment('views');
    	Stat::find(1)->increment('total_views');

    	return redirect($target->link);
    }

    public function paginator($page, $limit)
    {
    	$page = (!isset($page) || $page == 1) ? 1 : $page;
    	$limit = $limit;
    	$take =  $page * $limit;

    	return [$take - $limit, $limit];
    }
}
