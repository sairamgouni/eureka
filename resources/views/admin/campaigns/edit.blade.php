@extends('layouts.admin.layout')

@section('content')

<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title bg-blue">
					<h6 class="title c-white">{{$title}}n</h6>
					<div class="align-right">
						<a href="{{route('category_list')}}" class="btn btn-primary">Campaigns</a>
					</div>
				</div>
				<div class="ui-block-content">

            {{ Form::model($record,
            array('url' => 'admin/campaigns/edit/'.$record->slug,
            'method'=>'patch','novalidate'=>'','name'=>'formUsers ', 'files'=>'true' )) }}


						<div class="row">
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Campaign</label>
									<?php
							             $title  = '';
                                    if(isset($record))
							             {
							              	if($record->campaign)
							              	$title  = $record->campaign;
							             }
             						?>
									<input class="form-control" type="text" name="campaign" placeholder="Title here" value="{{$title}}">
								</div>

                                <?php
                            if(isset($record)) {
     						?>
								<input type="hidden" name="id" value="{{$record->id}}"  class="form-control">
								<input type="hidden" name="slug" value="{{$record->slug}}"  class="form-control">
							<?php
								}
							?>
							</div>
                            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label">Code</label>
                                    <?php
                                    $code  = '';
                                    if(isset($record))
                                    {
                                        if($record->code)
                                            $title  = $record->code;
                                    }
                                    ?>
                                    <input class="form-control" type="text" name="code" placeholder="Title here" value="{{$code}}">
                                </div>

                            </div>


                            <div class="col col-xl-2 col-lg-2 col-md-3 col-sm-3 col-3">
								<button class="btn btn-blue  btn-small">Update</button>
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
