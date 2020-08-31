<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SubcriberRepositories;
use App\Subscriber;
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
}
