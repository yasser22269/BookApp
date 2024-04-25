@extends('layouts.admin')
@section('title','profile index')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Admin</a>
            </li>
            {{--  <li class="breadcrumb-item"><a href="#">Tables</a>
            </li>  --}}
            <li class="breadcrumb-item active">profile index
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>


     <div class="card">
          <div class="container">
            <form class="form" method="POST" action="{{ route('admin.update.profile',$admin->id) }}">
                @csrf
                @method('put')
                <div class="form-body">
                  <h4 class="form-section">Admin Info</h4>
                  <input type="hidden"  name="id" value="{{ $admin->id }}">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput2">Name</label>
                        <input type="text" id="projectinput1" class="form-control" placeholder="Enter name" name="name" value="{{ $admin->name }}">
                        @error('name')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput2">Email</label>
                        <input type="text" id="projectinput2" class="form-control" placeholder="Email" name="email" value="{{ $admin->email }}">
                        @error('email')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput2">Password</label>
                        <input type="text" id="projectinput1" class="form-control" placeholder="Enter password" name="password" >
                        @error('password')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput2">password Confirmation</label>
                        <input type="text" id="projectinput2" class="form-control" placeholder="Enter password confirmation" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                  </button>
                </div>
              </form>
        
          </div>
         </div>


         @endsection

 




