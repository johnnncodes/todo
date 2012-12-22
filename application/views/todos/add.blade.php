{{ Form::open('todos', 'POST', array('id' => 'todo-form')) }}
	{{ Form::text('name', '', array('id' => 'name')) }}
	{{ Form::submit('save') }}
{{ Form::close() }}

<script type="text/javascript">
(function($){ // to avoid conflicts

	$(function() { // document.ready 
    	console.log('working');
    	$('form#todo-form').submit(function(){
    		console.log('form submit');

    		//var name = $('#name').val();

    		// console.log(name);

    		// save data
    		$.ajax({
			  	type: "POST",
			  	url: "<?php action('todos'); ?>",
			  	data: { name: $('#name').val() }
			}).done(function( msg ) {
			  	alert( "Data Saved: " + msg );
			});

    		return false; // to avoid submitting the form
    	});

	});

})(jQuery);
</script>