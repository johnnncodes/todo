<?php

class Base_Controller extends Controller {

	public $restful = true; // set restful to true to utilize restful controllers
	public $layout = 'layouts.common'; // set default layout

	public function __construct()
	{
	    parent::__construct();
	    $this->layout->page_title = "Todo Web App"; // set default page title
        // $this->layout->content = View::make('topics.index');
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}


}