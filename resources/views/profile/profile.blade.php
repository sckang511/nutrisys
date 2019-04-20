@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif      
                  <h3>Welcome, {{ $user->username }}&emsp;@include('message/message')</h3>

                  <!--@if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif-->

                  <form class="form-horizontal" action = "{{ route('profile') }}" method = "POST">
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
                              
                                <td>Profile Image: </td>
                                <td><img class="rounded-circle" src="/storage/avatars/{{ $user->profile_picture }}" /></td>
                                
                              
                              </tr>
                              <tr>
                              
                                <td>Add New Image</td>
                                <td><input type="file" class="form-control-file" name="profile_picture" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small></td>
                              
                              </tr>
                              <tr>
                              <tr>
                              
                                <td>Username: </td>
                                <td><input class="form-control input-lg" type="text" name="username" value="{{ $user->username }}"></td>
                                
                              
                              </tr>
                              <tr>
                              
                                <td>First Name: </td>
                                <td><input class="form-control input-lg" type="text" name="first_name" value="{{ $user->first_name }}"></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Last Name: </td>
                                <td><input class="form-control input-lg" type="text" name="last_name" value="{{ $user->last_name }}"></td>
                               
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
@endsection
