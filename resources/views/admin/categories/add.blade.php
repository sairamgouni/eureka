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

                            {!! Form::open(array('url' => 'admin/categories/store', 'method' => 'POST', 'name'=>'formUsers ', 'files'=>'true')) !!}

                        <div class="row">

                            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label">Title</label>

                                    <input class="form-control" type="text" name="title" placeholder="Title here" value="">

                                </div>

                                    <span class="invalid-input">
						                <strong></strong>
						            </span>

                            </div>

                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label">About </label>

                                    <textarea class="form-control" style="height: 140px" name="about_user"></textarea>
                                </div>
                                @if ($errors->has('about_user'))
                                    <span class="invalid-input">
						                <strong></strong>
						            </span>
                                @endif

                            </div>

                            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-blue btn-lg full-width">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <!-- ... end Window Popup Favourite Page -->
@endsection
