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
            <a href="{{route('users_list')}}" class="btn btn-primary">Users</a>
          </div>
        </div>
        <div class="ui-block-content">
       
          {!! Form::open(array('url' => 'admin/users/store', 'method' => 'POST', 'name'=>'formUsers ', 'files'=>'true')) !!}
       
          <div class="row">
            <?php
              $roles = \App\Role::getRoles(); 
              
            ?>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Role</label>
                {!!Form::select('role', $roles)!!}
              </div>
            </div>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Name">
              </div>
             
              <span class="invalid-input">
              <strong></strong>
              </span>
            
            </div>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Campaign</label>
                <?php
    
                  if(isset($record))
                           {
                              if($record->campaign_id)
                              $campaign_id  = $record->campaign_id;
                           }
                ?>
                 {!!Form::select('campaign_id', $campaign, old('campaign_id'))!!}
              </div>
              @if ($errors->has('campaign_id'))
              <span class="invalid-input">
              <strong>{{ $errors->first('campaign_id') }}</strong>
              </span>
              @endif
            </div>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Email</label>
               
                <input class="form-control" type="email" name="email" placeholder="Email" >
              </div>
             
              <span class="invalid-input">
              <strong></strong>
              </span>
             
            </div>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Image</label>
                <input class="form-control" type="file" name="image" placeholder="Choose Optional Tags">
              </div>
            </div>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Status</label>
                <?php
                  $status  = null;
                 
                  $options = array('active'=>'Active','inactive'=>'Inactive');
                  ?>
                {!!Form::select('status', $options, $status)!!}
              </div>
            
            </div>
           <div class="col col-xl-2 col-lg-2 col-md-3 col-sm-3 col-3">
                <button class="btn btn-blue  btn-small">Save</button>
              </div>
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

