<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SubcriberRepositories;
use App\Subscriber;
use Carbon\Carbon;
class SubscribersController extends Controller
{
    private $subsriberRepositories;

    public function __construct(SubcriberRepositories $subsriberRepositories){
    	$this->subsriberRepositories = $subsriberRepositories;
    }

    public function index(){
    	$subscriber = $this->subsriberRepositories->all();
    	return $subscriber;
    }

    public function getBySearch($pera){

    	return $subscriber = $this->subsriberRepositories->starts_with($pera);
    }

    public function imageUpload(Request $request){
    
    	$subscriber = $this->subsriberRepositories->imageupload($request->image_one);
    	dd($subscriber);

    }

    public function filter(Request $request){
    	$data = [];
    	$start = Carbon::parse($request->start);
    	$end = Carbon::parse($request->end);
    	$range = $request->filter;


    	$validatedData = $request->validate([
		    'start' => ['required'],
		    'filter' => ['required'],
		]);
		
    	// if(isset($start) && !empty($start) && isset($end) && !empty($end) && isset($range) && !empty($range == 'between')){

    	// 	$data['filter_data'] = $this->subsriberRepositories->dateRange($start,$end);

    	// }elseif(isset($start) && !empty($start) && isset($range) && !empty($range == 'after')){

    	// 	$data['filter_data'] = $this->subsriberRepositories->dateRangeafter($start);

    	// }elseif(isset($start) && !empty($start) && isset($range) && !empty($range == 'before')){

    	// 	$data['filter_data'] = $this->subsriberRepositories->dateRangebefore($start);

    	// }else{
    	// 	echo "sorry";
    		
    	// }
    	

    	switch ($range) {
    		case 'between':
    			$data['filter_data'] = $this->subsriberRepositories->dateRange($start,$end);
    			break;
    		case 'after':
    			$data['filter_data'] = $this->subsriberRepositories->dateRangeafter($start);
    			break;
    		case 'before':
    			$data['filter_data'] = $this->subsriberRepositories->dateRangebefore($start);
    			break;
    		
    		default:
    			$data['filter_data'] = 'Not Match';
    			break;
    	}
    	
    	
		return view('welcome',$data);
    }




}
