// JavaScript File

        add_task(); // Call the add_task function
		delete_task(); // Call the delete_task function

		function add_task() {

			$('.add-new-task').submit(function(){

				var new_task = $('.add-new-task input[name=new-task]').val();

				if(new_task != ''){

					$.post('./phpFunctions/add-task.php', { task: new_task }, function( data ) {

						$('.add-new-task input[name=new-task]').val('');

						$(data).appendTo('.task-list ul').hide().fadeIn();

						delete_task();
					});
				}

				return false; // Ensure that the form does not submit twice
			});
		}

		function delete_task() {

			$('.delete-button').click(function(){

				var current_element = $(this);

				var id = $(this).attr('id');

				$.post('./phpFunctions/delete-task.php', { task_id: id }, function() {

					current_element.parent().fadeOut("fast", function() { $(this).remove(); });
				});
			});
		}
