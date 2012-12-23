<?php

class Todos_Controller extends Base_Controller 
{

	public function get_index()
	{
		//$this->layout = View::make('layouts.topics'); // override the default layout that is set in the base controller

		// $this->layout->page_title = "Welcome";

        //$this->layout->content = View::make('topics.index');

        $this->layout->content = 'im a content!';
	}

}