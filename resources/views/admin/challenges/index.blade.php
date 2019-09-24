@extends('layouts.admin.layout')
@section('content')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<style>
    .custom-ul {
         list-style: inside !important;
        padding: 0;
    }
</style>

 <div class="container">
 	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			@if(session('message'))
			<div class="flash-message">
			    @if(Session::has('type'))
			      <p class="alert alert-{{session('type')}}">{{session('message')}} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			      @endif
		  	</div> <!-- end .flash-message -->
		  	@endif
			<div class="ui-block">
				<div class="ui-block-title bg-blue">
					<h6 class="title c-white">Challenge List</h6>
					<div class="align-right">
						<a href="{{route('challenges_add')}}" class="btn btn-primary btn-md-2">New Challenge</a>
					</div>
				</div>
				<div class="ui-block-content">
				 <table class="table" id="challenge">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
                      <th scope="col">Image</th>
                      <th scope="col">Category</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				</table>
				</div>
			</div>
		</div>
	</div>
 </div>
@endsection
     @section('javascript')
         <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

{{--         <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}

<script type="text/javascript">
    table = $('#challenge').dataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{{route('challenge_data')}}',
        deferRender: true,
        pageLength: 10,

        order: [[ 0, "desc" ]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'image', name: 'image', "searchable": false, "sortable": false},
            {data: 'categories', name: 'categories.title'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', "searchable": false, "sortable": false}
        ]
    });
	function deleteChallenge(slug)
	{
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this Challege!",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {

		  	$.ajax({
		        method: "POST",
		        url: '{{ route('challenge_delete') }}',
		        data:{
		        	"_token": "{{ csrf_token() }}",
		        	"slug": slug
	        	}
	        }).done(function( msg ) {

		        if(msg.status == true){
		            swal(msg.message, {
				      icon: "success",
				    });
                    table._fnDraw();
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
@endsection
