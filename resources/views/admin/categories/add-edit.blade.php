@extends('layouts.admin.layout')

@section('content')

<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title bg-blue">
					<h6 class="title c-white">{{$title}}</h6>
					<div class="align-right">
						<a href="{{route('category_list')}}" class="btn btn-primary">Categories</a>
					</div>
				</div>
				<div class="ui-block-content">

		@if(isset($record))
            {{ Form::model($record,
            array('url' => '/categories/edit/'.$record->slug,
            'method'=>'patch','novalidate'=>'','name'=>'formUsers ', 'files'=>'true' )) }}

          @else
            {!! Form::open(array('url' => '/categories/add', 'method' => 'POST', 'name'=>'formUsers ', 'files'=>'true')) !!}
          @endif
						<div class="row">
							<?php
             $selected  = null;
             if(isset(($record)))
             {
              	if($record->parent_id)
              	$selected = $record->parent_id;
             }
             $options = \App\Category::getParents()->pluck('title','id');


             ?>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Is Parent</label>


									{!!Form::select('parent_id', $options, $selected)!!}
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Title</label>
									<?php
							             $title  = '';
							             if(isset(($record)))
							             {
							              	if($record->title)
							              	$title  = $record->title;
							             }
             						?>
									<input class="form-control" type="text" name="title" placeholder="Title here" value="{{$title}}">

								</div>
								@if ($errors->has('title'))
						            <span class="invalid-input">
						                <strong>{{ $errors->first('title') }}</strong>
						            </span>
						        	@endif
							</div>

							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">About </label>
									<?php
							             $about_user  = '';
							             if(isset(($record)))
							             {
							              	if($record->about_user)
							              	$about_user  = $record->about_user;
							             }
             						?>
									<textarea class="form-control" style="height: 140px" name="about_user">{{$about_user}}</textarea>
								</div>
								@if ($errors->has('about_user'))
						            <span class="invalid-input">
						                <strong>{{ $errors->first('about_user') }}</strong>
						            </span>
						        	@endif

							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Status</label>
									<?php
							             $status  = null;
							             if(isset(($record)))
							             {
							              	if($record->status)
							              	$status  = $record->status;
							             }

							             $options = array('active'=>'Active','inactive'=>'Inactive');
             						?>
             						{!!Form::select('status', $options, $status)!!}

								</div>
								<?php
			             	if(isset(($record))) {
     						?>
								<input type="hidden" name="id" value="{{$record->id}}"  class="form-control">
								<input type="hidden" name="slug" value="{{$record->slug}}"  class="form-control">
							<?php
								}
							?>
							</div>



							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<button class="btn btn-blue btn-lg full-width">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>


	</div>
</div>
<style>
    .ui-block-title{
        background-color: #e91d24;
    }
</style>
<!-- ... end Window Popup Favourite Page -->
@endsection
