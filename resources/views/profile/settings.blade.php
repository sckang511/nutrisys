@extends('layouts.app')

@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-md-10">
            <div class="text-left" style="margin-top: 20px;">
                <div class="page-header text-info">
                    <h1>SETTINGS</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                                <h3>Account Settings</h3>     
                                <h5>@include('message/message')</h5>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Receive Occasional Emails</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Option 2</label>
                                </div>
                                <div class="checkbox disabled">
                                    <label><input type="checkbox" value="">Option 3</label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

