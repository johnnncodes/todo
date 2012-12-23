<?php

class Todos_Controller extends Base_Controller 
{

	/**
	 * Handles showing lists
	 */
	public function get_index()
	{
		$this->layout->content = View::make('todos.index')->with('todos', Todo::all());
	}

	/**
	 * Handles saving data
	 */
	public function post_index()
	{
		// validate
		$input = Input::all();

		$rules = array(
		    'name'  => 'required|max:200',
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
		    return 'failed';
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

	/**
	 * Handles deleting data
	 */
	public function delete_index()
	{
		$todo = Todo::find(Input::get('id'));

		if ($todo->delete()) {
			return Response::eloquent(Todo::all());
		}

	}

	/**
	 * Handles editing data
	 */
	public function put_index()
	{
		$id = Input::get('id');

		$todo = Todo::find($id);
		$todo->name = Input::get('name');
	
		if ($todo->save()) {
			return 'good';
		}
	}



}

// end of file