<?php

class Todos_Controller extends Base_Controller 
{

	// public function get_index()
	// {
	// 	//$this->layout = View::make('layouts.topics'); // override the default layout that is set in the base controller

	// 	// $this->layout->page_title = "Welcome";

 //        //$this->layout->content = View::make('topics.index');

 //        $this->layout->content = 'im a content!';
	// }

	public function get_index()
	{
		$this->layout->content = View::make('todos.index')->with('todos', Todo::all());
	}

	// add
	public function post_index()
	{
		// return Input::get('name');

		// validate
		$input = Input::all();

		$rules = array(
		    'name'  => 'required|max:200',
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
		    return 'validation failed!';
		}

		// save
		$todo = new Todo;
		$todo->name = Input::get('name');

		if ($todo->save()) {
			return Response::eloquent(Todo::all());
		} else {
			return 'error';
		}

	}

	// delete
	public function delete_index()
	{
		$todo = Todo::find(Input::get('id'));

		if ($todo->delete()) {
			return Response::eloquent(Todo::all());
		}

	}

}