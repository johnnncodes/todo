<div id="todo-con">

	<div id="todo-form">
		<h3>Simple Todo Web App</h3>

		<div class="alert alert-error errors">
		  <p>Todo Required</p>
		</div>
		

		{{ Form::open('todos', 'POST', array('id' => 'todo-form')) }}
			{{ Form::text('name', '', array('id' => 'name', 'placeholder' => 'What needs to be done?', 'autofocus' => 'autofocus')) }}
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
		    			<label class="edit {{ ($todo->done == 1) ? 'done' : '' }}" id="todo-{{ $todo->id }}" data-id="{{ $todo->id }}">{{ e($todo->name) }}</label>
		    			<a href="#" class="toggle-btn {{ ($todo->done == 1) ? 'active' : '' }}" data-id="{{ $todo->id }}">&#10003;</a>
		    			<a href="#" class="delete-btn" data-id="{{ $todo->id }}">x</a>
		    		</div>
		    	</li>
			
			@endforeach
		</ul>
	
	</div>

</div>

<p id="footer-text"><a href="https://www.odesk.com/users/Web-and-Mobile-Developer_~01f1dbcff7ace73fae?tot=1&pos=0" target="_blank">Created By: John Kevin M. Basco</a></p>

<!--
// End of file
// @author John Kevin M. Basco
-->

	
	

