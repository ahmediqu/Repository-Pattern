<?php
namespace App\Repositories;
use App\Subscriber;
class SubcriberRepositories {

	public function all(){
		return Subscriber::orderBy('id','desc')->get();
	}

}