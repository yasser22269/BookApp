@extends('layouts.admin')
@section('title','user Show')
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
            <li class="breadcrumb-item active">user show
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="row" id="header-styling">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Profile</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                            <h4 class="form-section"><i class="ft-eye"></i>About User</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput1" >Name Name</label>
                                        <input disabled value="{{$user->name}}"  type="text" id="userinput1" class="form-control" placeholder="Name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput2" >Email</label>
                                        <input disabled value="{{$user->email}}"     type="text" id="userinput2" class="form-control" placeholder="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput3" >Username</label>
                                        <input disabled value="{{$user->user_name}}"     type="text" id="userinput3" class="form-control" placeholder="user_name" name="user_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput4" >Phone</label>
                                        <input disabled value="{{$user->phone}}"     type="text" id="userinput4" class="form-control" placeholder="phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="form-section"><i class="ft-user-plus"></i> Children</h4>
                            @foreach($user->children as $child)
                                <div class="form-group">
                                    <label for="userinput5" >child Name</label>
                                    <input disabled value="{{$child->name}}"     class="form-control" type="text" name="c_name" placeholder="email" id="userinput5">
                                </div>
                                <div class="form-group">
                                    <label for="age" >Age</label>
                                    <input disabled value="{{$child->age}}"     class="form-control" type="text" name="age"  id="age">
                                </div>
                                <hr>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection
