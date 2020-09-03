<?php
namespace App\Repositories;
use App\Subscriber;
use Illuminate\Support\Str;

class SubcriberRepositories {
	
	public function all(){
		return Subscriber::orderBy('id','desc')->get();
	}

	public function starts_with($pera){
		return Subscriber::query()
		   ->where('first_name', 'LIKE', "%{$pera}%")
		   ->get()->map(function ($subscriber){
		   	return [
		   		'first_name' => $subscriber->first_name,
		   	];
		   });
	}

	public function imageupload($image = null){

		$image_one = $image;
        if ($image_one) {
            $image_name = Auth::user()->id.time().'.'.request()->image_one->getClientOriginalExtension();


            $image_full_name = $image_name;
            $destination_path = 'uploads/aboutus/';
            $image_url = $destination_path . $image_full_name;
            $success = $image->move($destination_path, $image_full_name);
            if ($success) {
                
                return $image_url;
        	}
        	return false;
		}

	}
	public function dateRange($start = null,$end = null){
		
		return Subscriber::whereBetween('created_at', [$start, $end])->get();
	}
	public function dateRangeafter($start = null){
		
		return Subscriber::where('created_at', '>=' , $start)->get();
	}
	public function dateRangebefore($start = null){
		
		return Subscriber::where('created_at', '<=' , $start)->get();
	}
}