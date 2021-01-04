<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'link', 'image', 'tag', 'source'];

    public function getAll($skip, $take, $filter, $options)
    {
    	$data = $this;
    	foreach ($options as $key => $value) {
    		if(!is_null($value) && $key != 'keyword'){
    			$data = $data->where($key, $value);
    		}
    		
    	}

    	if(!is_null($options['keyword'])){
    		$keyword = $options['keyword'];
    		$data = $data->where('title', 'ilike', "%{$keyword}%");
    	}
    	
    	return [$data->orderBy($filter[0], $filter[1])
                    ->skip($skip)->take($take)->get(), $data->count()];
    	
    }
}
