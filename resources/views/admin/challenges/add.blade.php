@extends('layouts.admin.layout')

@section('content')

<!-- Your Account Personal Information -->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title bg-blue">
					<h6 class="title c-white">Create a New Challenge</h6>
					<div class="align-right">
						<a href="{{route('challenge_list')}}" class="btn btn-primary">Challenges</a>
					</div>
				</div>
				<div class="ui-block-content">

                <!-- <form method="post" action="{{route('challenges_store')}}" name="formUsers", files="true">		 -->
            {!! Form::open(array('url' => 'admin/challenges/store', 'method' => 'POST', 'name'=>'formUsers ', 'files'=>'true')) !!}


						<div class="row">
                          <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Title</label>

									<input class="form-control" type="text" name="title" placeholder="Title here">
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="control-label">Categories</label>
                                {!! Form::select('categories[]', $categories, old('categories'), ['class' => 'form-control', 'multiple' => 'multiple','id'=>'cat']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('categories'))
                        <p class="help-block">
                            {{ $errors->first('categories') }}
                        </p>
                    @endif


								</div>

							</div>



							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Description</label>

									<textarea class="form-control" style="height: 140px" name="description"></textarea>
								</div>


							</div>
							<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
								<div class="form-group">
									<label class="control-label">Activ From</label>
									<input class="form-control date " type="text" name="active_from" placeholder="Choose Optional Tags">
								</div>
							</div>

								<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
								<div class="form-group">
									<label class="control-label">Active To</label>
									<input class="form-control date" type="text" name="active_to" placeholder="Choose Optional Tags">
								</div>
							</div>

								<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Image</label>
									<input class="form-control" type="file" name="image" placeholder="Choose Optional Tags">
								</div>
							</div>





                            <div class="col col-xl-2 col-lg-2 col-md-3 col-sm-3 col-3">
								<button class="btn btn-blue  btn-small">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>


	</div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">

	  $('.date').datepicker({
           format: 'mm-dd-yyyy'
         });

	  $('#cat').select2({
          allowClear:true
      });

{{--	  $(document).ready(function () {--}}
{{--            $('#category').select2({--}}
{{--                ajax: {--}}
{{--                    url: '{{'/categories/getlist'}}',--}}
{{--                    data: function (params) {--}}
{{--                        return {--}}
{{--                            search: params.term,--}}
{{--                            page: params.page || 1--}}
{{--                        };--}}
{{--                    },--}}
{{--                    dataType: 'json',--}}
{{--                    processResults: function (data) {--}}
{{--                        data.page = data.page || 1;--}}
{{--                        return {--}}
{{--                            results: data.items.map(function (item) {--}}
{{--                                return {--}}
{{--                                    id: item.id,--}}
{{--                                    text: item.name--}}
{{--                                };--}}
{{--                            }),--}}
{{--                            pagination: {--}}
{{--                                more: data.pagination--}}
{{--                            }--}}
{{--                        }--}}
{{--                    },--}}
{{--                    cache: true,--}}
{{--                    delay: 250--}}
{{--                },--}}
{{--                placeholder: 'category',--}}
{{--//                minimumInputLength: 2,--}}
{{--                multiple: true--}}
{{--            });--}}
{{--        });--}}
</script>
<!-- ... end Window Popup Favourite Page -->
<style>
    .ui-block-title{
        background-color: #e91d24;
    }
</style>
@endsection
