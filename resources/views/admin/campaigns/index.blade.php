@extends('layouts.admin.layout')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <div class="container">
 	
 <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-user">Add New</a>
 <br><br>
 <table class="table table-bordered table-striped" id="laravel_datatable">
   <thead>
      <tr>
         <th>ID</th>
         <th>Campaign</th>
         <th>Action</th>
      </tr>
   </thead>
</table>
		
			
	
	</div>

	<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="userForm" name="userForm" class="form-horizontal">
           <input type="hidden" name="user_id" id="user_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Campaign</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="campaign" name="campaign" placeholder="Enter Name" value="" maxlength="50" required="">
                </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        
    </div>
</div>
</div>
</div>
	<!-- <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script> -->
	
	
   
<script type="text/javascript">

$('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ route('campaign_get') }}",
         columns: [
                  {data: 'id', name: 'id', 'visible': false},
                  {data: 'campaign', name: 'campaign', orderable: false,searchable: false},
               ],
		order: [[0, 'desc']]
			}
	  });
	

// $(document).ready( function () {
//        $('#users').DataTable({
//         "serverSide": true,
//         "ajax": "{{ route('campaign_get') }}",
//         "columns": [
//             {data: 'id', name: 'id'},
//             {data: 'campaign', name: 'campaign'}
//         ]
//     });
// } );
// $(document).ready(function() {
//      $('#users').DataTable({
//         "processing": true,
//         "serverSide": true,
//         "ajax": "{{ route('campaign_get') }}",
//         "columns": [
//             {data: 'id', name: 'id'},
//             {data: 'campaign', name: 'campaign'}
//         ]
//     });
// });
</script>
<!-- 
<script type="text/javascript">

    $(document).ready(function() {
        $('#table').DataTable();
    } );
	function deletecampaign(slug)
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
		        url: '/campaigns/delete',
		        data:{
		        	"_token": "{{ csrf_token() }}",
		        	"slug": slug
	        	}
	        }).done(function( msg ) {

		        if(msg.status == true){
		            swal(msg.message, {
				      icon: "success",
				    });
		            window.location.href = '/campaigns';
		        }else{
		        	swal(msg.message, {
				      icon: "error",
				    });
		        }
		    });
		  }
		});
	}
</script> -->
@endsection
