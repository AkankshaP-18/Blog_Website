
$(document).on('click', '.btnsubmit', function(e)
{
	e.preventDefault();
	// alert(123);
	var data = $('form').serialize();
    var cate_id = $('#category').find('option:selected').attr("id");
	// console.log(cate_id);
	$.ajax({
		type: "POST",
        url: "ajax_author.php",
        data: { type: "blog_data" ,data: data, cate_id: cate_id},
        cache: false,
        success: function(result)
        {
        	if(result == 1)
        	{
        		swal({
                        title: "Post Entered successfully!",
                        text: "Proceed to Next Post..",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        swal.close();
                        window.location.reload();
                   	});
        	}
        	else
        	{
        		swal({
						title: "Post Not Entered",
						// text: "This mobile number and email  already exist plsease use another or please login",
						icon: "warning",
						button: "Ok",
					});
        	}
        }
	})
});