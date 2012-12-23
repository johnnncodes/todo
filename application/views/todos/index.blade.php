<div id="todo-con">

	<div id="todo-form">
		<h3>Simple Todo Web App</h3>
		{{ Form::open('todos', 'POST', array('id' => 'todo-form')) }}
			{{ Form::text('name', '', array('id' => 'name', 'placeholder' => 'What needs to be done?')) }}
		{{ Form::close() }}
	</div>

	<div id="todo-list-con">
		
		<div id="ajax-loader">
			<img src="{{ asset('img/ajax-loader.gif'); }}">
			<p>Loading...Please wait</p>
		</div>

		<ul id="todo-list">
			@foreach($todos as $todo)
			
		    	<li id="todo-{{ $todo->id }}">
		    		<div class="view">
		    			<label class="edit" id="todo-{{ $todo->id }}" data-id="{{ $todo->id }}">{{ $todo->name }}</label>
		    			<a href="#" class="delete-btn" data-id="{{ $todo->id }}">x</a>
		    		</div>
		    	</li>
			
			@endforeach
		</ul>
	
	</div>

</div>

<p id="footer-text">Created By: John Kevin M. Basco</p>

<!--
// End of file
// @author John Kevin M. Basco
-->

	
	

