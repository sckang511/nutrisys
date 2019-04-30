@extends('layouts.app')
@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded" style="background-color: white">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-left">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif 
                    <div class="page-header text-info">
                        <div class="row">
                        <div class="col-3">
                            @if(!empty($user->profile_picture))
                                <img class="rounded-circle" src="{{ asset('storage/avatars/' . $user->profile_picture) }}" style="width: 120px; height: 120px; margin: 5px;">
                            @else
                                <img class="img-responsive img-rounded" src="{{ asset('images/user.jpg') }}" alt="User picture" style="width: 120px; height: 120px; margin: 5px;"> 
                            @endif
                        </div>
                        <div class="col float-left">
                            <h1>Welcome, {{ $user->username }}</h1>
                        </div>
                    </div>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <form class="form-horizontal" action = "{{ route('profile') }}" method = "POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Fields</th>
                                        <th scope="col"><i class="fa fa-edit"></i>&emsp; Edit Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Username: </td>
                                            <td><input class="form-control input-lg" type="text" name="username" value="{{ $user->username }}"></td>
                                        </tr>
                                        <tr>
                                            <td>First Name: </td>
                                            <td><input class="form-control input-lg" type="text" name="first_name" value="{{ $user->first_name }}" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name: </td>
                                            <td><input class="form-control input-lg" type="text" name="last_name" value="{{ $user->last_name }}" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Gender: </td>
                                            <td><input class="form-control input-lg" type="text" name="gender" value="{{ $user->gender }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Birthdate: </td>
                                            <td><input class="form-control input-lg" type="date" name="birthdate" value="{{ $user->birthdate }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Phone: </td>
                                            <td><input class="form-control input-lg" type="text" name="phone" value="{{ $user->phone }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Email: </td>
                                            <td><input class="form-control input-lg" type="text" name="email" value="{{ $user->email }}" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Height in inches: </td>
                                            <td><input class="form-control input-lg" type="number" name="height" value="{{ $user->height }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Weight in pounds: </td>
                                            <td><input class="form-control input-lg" type="number" name="weight" value="{{ $user->weight }}"></td>
                                        </tr>
                                        <tr>
                                          <td>Add Profile Image</td>
                                          <td><input type="file" class="form-control-file" name="profile_picture" id="avatarFile" aria-describedby="fileHelp">
                                          <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group row"><br>
                                    <div class="col-md-offset-4 col-md-4">                        
                                    <button type="submit" class="btn btn-success btn-lg mb-2" style="padding: 7px 20px;"><i class="fa fa-floppy-o"></i>&emsp; Save Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h5>@include('message/message')</h5>
        </div>
    </div><br>
</div>
@endsection

