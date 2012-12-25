<?php

class Todos_Controller extends Base_Controller 
{
	public function __construct()
    {
    	header('Access-Control-Allow-Origin: *'); // allow cross domain origin access
        parent::__construct();
    }

	/**
	 * Handles showing lists
	 */
	public function get_index()
	{
		$this->layout->content = View::make('todos.index')->with('todos', Todo::order_by('created_at', 'desc')->get());
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
			return Response::eloquent(Todo::order_by('created_at', 'desc')->get());
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
			return Response::eloquent(Todo::order_by('created_at', 'desc')->get());
		} else {
			return 'error';
		}
	}

	/**
	 * Handles editing data
	 */
	public function put_index()
	{

		$action = Input::get('action');

		if ($action === 'toggle') {
			$id = Input::get('id');
			$todo = Todo::find($id);

			if ($todo->done === 1) {
				$todo->done = 0;
			} else {
				$todo->done = 1;
			}

			if ($todo->save()) {
				return Response::json('success');
			} else {
				return Response::json('error');
			}

		} else { // action is not equal to toggle, so we will assume the action is editing the name of the todo

			$id = Input::get('id');
			$todo = Todo::find($id);
			$todo->name = Input::get('name');
		
			if ($todo->save()) {
				return Response::json('success');
			} else {
				return Response::json('error');
			}

		}

		
	}



}

// End of file
// @author John Kevin M. Basco