<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	function deleteCategory(slug)
	{
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this Category!",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {

		  	$.ajax({
		        method: "POST",
		        url: "{{URL_CATEGORIES_DELETE}}",
		        data:{
		        	"_token": "{{ csrf_token() }}",
		        	"slug": slug
	        	}
	        }).done(function( msg ) {
       	
		        if(msg.status == true){
		            swal(msg.message, {
				      icon: "success",
				    });
		            window.location.href = '{{URL_CATEGORIES_LIST}}';
		        }else{
		        	swal(msg.message, {
				      icon: "error",
				    });
		        }
		    });
		  } 
		});
	}

</script>
