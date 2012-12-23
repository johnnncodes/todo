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



<!-- <div class="edit" id="div_1">Dolor</div> -->

<script type="text/javascript">
	//  $(document).ready(function() {
 //     $('.edit').editable('http://localhost/todo/public/todos/', {
 //     	// method : "PUT",
 //     	// submitdata : { _method: 'PUT' }, // fake the PUT request
 //     	// indicator : 'Saving...',
 //        // tooltip   : 'Click to edit...',
 //      //    callback : function(value, settings) {
	//      //     console.log(this);
	//      //     console.log(value);
	//      //     console.log(settings);
	//      // }
 //     });
 // });

bindAllTabs(); // bind the .editable in initialization


function bindAllTabs() {

	$('.edit').editable(function(value, settings) { 
	    

	    //console.log(this);
	    // console.log(value);
	    //console.log(settings);


     	// save data
		$.ajax({
		  	type: "POST",
		  	url: "<?php action('todos'); ?>",
		  	data: { name: value, id: $(this).data('id'), _method: 'PUT' }
		}).done(function( data ) {
		  	console.log(data);

			var list = '';

		  	$.each(data, function(i, data){
		  		// console.log(data.name);

		  		list = list + 
		  		"<li id=" + data.id + ">"
		  		+ "<div class='view'>"
		  		+ "<label class='edit' id='todo-" + data.id + "' data-id='" + data.id + "'>" + data.name + "</label>"
		  		+ "<a href='#' class='delete-btn' data-id='" + data.id + "'>x</a>"
		  		+ "</div>";
		  		+ "<li>";

		  	});

		  	// console.log(list);

		  	//$('ul#todo-list').html(list);

		  
		});


	     return(value);

	}, { 
			cssclass : 'editable',
	     //type    : 'textarea',
	    // submit  : 'OK',
	});

}


 





</script>



<script type="text/javascript">
(function($){ // to avoid conflicts

	$(function() { // document.ready 

    	// console.log('working');

    	/**
    	 * add
    	 */
    	$('form#todo-form').submit(function() {

    		console.log('form submit');

    		$('ul#todo-list').hide();

    		$('div#ajax-loader').show();

    		var name = $('#name').val();

    		$('#name').val("");	

    		// save data
    		$.ajax({
			  	type: "POST",
			  	url: "<?php action('todos'); ?>",
			  	data: { name: name }
			}).done(function( data ) {

			  	console.log(data);

			  	if (data !== 'failed') { // if validation in the server didn't failed

			  		var list = '';

				  	$.each(data, function(i, data){
				  		// console.log(data.name);

				  		list = list + 
				  		"<li id=" + data.id + ">"
				  		+ "<div class='view'>"
				  		+ "<label class='edit' id='todo-" + data.id + "' data-id='" + data.id + "'>" + data.name + "</label>"
				  		+ "<a href='#' class='delete-btn' data-id='" + data.id + "'>x</a>"
				  		+ "</div>";
				  		+ "<li>";

				  	});

				  	// console.log(list);

				  	$('ul#todo-list').html(list);

				  	bindAllTabs(); // re-bind the .editable to the list

				  	$('div#ajax-loader').hide();
				  	$('ul#todo-list').show();

			  	};

				

			  
			});

    		return false; // to avoid submitting the form

    	});


    	/**
    	 * edit
    	 */
		// $('ul#todo-list').find('a.delete-btn').live('click', function() { // deprecated as of jquery 1.7
		$('ul#todo-list').on('click', 'a.delete-btn', function(event) {
    		


			$('ul#todo-list').hide();

    		$('div#ajax-loader').show();

    		$this = $(this); // cache the current $('a.delete-btn');

    		// console.log($this.data('id'));

    		var id = $this.data('id');

			// delete the list
			$.ajax({
			  	type: "DELETE",
			  	url: "<?php action('todos'); ?>",
			  	data: { id: id }
			}).done(function( data ) {
			  	//console.log(data);
	
			  	var list = '';

			  	$.each(data, function(i, data){
			  		// console.log(data.name);

			  		list = list + 
			  		"<li id=" + data.id + ">"
			  		+ "<div class='view'>"
			  		+ "<label class='edit' id='todo-" + data.id + "' data-id='" + data.id + "'>" + data.name + "</label>"
			  		+ "<a href='#' class='delete-btn' data-id='" + data.id + "'>x</a>"
			  		+ "</div>";
			  		+ "<li>";

			  	});

			  	console.log(list);

			  	$('ul#todo-list').html(list);

			  	bindAllTabs(); // re-bind the .editable to the list

			  	$('ul#todo-list').show();

    			$('div#ajax-loader').hide();

			});

    		return false;
    	});

	}); 

})(jQuery);
</script>