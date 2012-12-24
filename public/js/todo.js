(function($){ // to avoid conflicts

	$(function() { // document.ready 

    	// initialize
    	bindAllTabs(); // bind the .editable in initialization

    	/**
    	 * Binds .editable to the list
    	 * We call this every time we refresh/add lists dynamically via js to bind the .editable
    	 */
		function bindAllTabs() {

			$('.edit').editable(function(value, settings) { 
			    
			    // console.log(this);
			    // console.log(value);
			    // console.log(settings);

		     	// save data
				$.ajax({
				  	type: "POST",
				  	// url: todosUrl,
				  	url: 'todos',
				  	data: { name: value, id: $(this).data('id'), _method: 'PUT' }
				}).done(function( data ) {

				  	// ajax request success, do something here if you want
				  	console.log(data);

				  	$('.errors').hide();

				  	if (data === 'error') {
				  		console.log('Updating in database failed. Please report error to basco.johnkevin@gmail.com');
				  	}

				});

			    return(value);

			}, { 
					cssclass : 'editable',
			     	// type    : 'textarea',
			    	// submit  : 'OK',
			});

		}

    	/**
    	 * add
    	 */
    	$('form#todo-form').submit(function() {

    		if ($('form#todo-form').find('input#name').val() === '') {
    			// alert('Input a todo first!');
    			$('.errors').show();
    			return false; // stop execution of code
    		};

    		$('.errors').hide();

    		$('ul#todo-list').hide();

    		$('div#ajax-loader').show();

    		var name = $('#name').val();

    		$('#name').val("");	

    		// save data in the server
    		$.ajax({
			  	type: "POST",
			  	url: 'todos',
			  	dataType: "json", // parse json to js object automatically
			  	data: { name: name }
			}).done(function( data ) {

			  	console.log(data);	  	

			  	if (data !== 'failed') { // if validation in the server didn't failed

			  		var list = '';

			  		// data = $.parseJSON(data); // quick fix for FireFox but breaks in oher browsers, 
			  									 // so I added dataType: "json", in the ajax request above 
			  									 // to let jquery automatigically parse the JSON to a js object

				  	$.each(data, function(i, data) {

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

			  	} else if(data === 'failed') {
			  		$('div#ajax-loader').hide();

				  	$('ul#todo-list').show();

				  	console.log('Validation failed. Are you cheating??!');
			  	} else {
			  		$('div#ajax-loader').hide();

				  	$('ul#todo-list').show();

				  	console.log('Saving to database failed. Please report error to basco.johnkevin@gmail.com');
			  	}

			});

    		 return false; // to avoid submitting the form

    	});


    	/**
    	 * edit
    	 */
		// $('ul#todo-list').find('a.delete-btn').live('click', function() { // deprecated as of jquery 1.7
		$('ul#todo-list').on('click', 'a.delete-btn', function(event) {
    		
			$('.errors').hide();

			$('ul#todo-list').hide();

    		$('div#ajax-loader').show();

    		$this = $(this); // cache the current $('a.delete-btn');

    		var id = $this.data('id');

			// delete the list
			$.ajax({
			  	type: "POST",
			  	url: 'todos',
			  	dataType: "json",
			  	data: { id: id, _method: 'DELETE' }
			}).done(function( data ) {

			  	console.log(data);

			  	if (data !== 'error') {

			  		var list = '';

				  	$.each(data, function(i, data) {

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

			  	} else {
			  		$('div#ajax-loader').hide();

				  	$('ul#todo-list').show();

				  	console.log('Deleting data in database failed. Please report error to basco.johnkevin@gmail.com');
			  	}
	
			});

    		return false;
    	});

	}); 

})(jQuery);

// End of file
// @author John Kevin M. Basco