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
            <a href="{{URL_USERS_LIST}}" class="btn btn-primary">Users</a>
          </div>
        </div>
        <div class="ui-block-content">
          {{ Form::model($record,
          array('url' => 'admin/users/edit/'.$record->slug,
          'method'=>'patch','novalidate'=>'','name'=>'formUsers ', 'files'=>'true' )) }}
          <div class="row">
            <?php
              $roles = \App\Role::getRoles();
                        $selected = ROLE_USER;
                if(isset($record))
                {
                 $selected = $record->role()->first();
                 if($selected)
                   $selected = $selected->id;
                }
            ?>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Role</label>
                {!!Form::select('role', $roles, $selected)!!}
              </div>
            </div>
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label class="control-label">Name</label>
                <?php
                  $name  = '';
                  if(isset(($record)))
                  {
                    if($record->name)
                    $name  = $record->name;
                  }
                  ?>
                <input class="form-control" type="text" name="name" placeholder="Name" value="{{$name}}" readonly>
              </div>
              @if ($errors->has('name'))
              <span class="invalid-input">
              <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
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
                <?php
                  $email  = '';
                  if(isset(($record)))
                  {
                    if($record->email)
                    $email  = $record->email;
                  }
                  ?>
                <input class="form-control" type="email" name="email" placeholder="Email" value="{{$email}}" readonly>
              </div>
              @if ($errors->has('email'))
              <span class="invalid-input">
              <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
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
                  if(isset(($record)))
                  {
                    if($record->status)
                    $status  = $record->status;
                  }

                  $options = array('active'=>'Active','inactive'=>'Resigned');
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
              <button class="btn btn-blue btn-lg full-width">{{$button_text}}</button>
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

