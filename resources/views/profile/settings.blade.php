@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                
                    <div class="dark-link shadow p-3 mb-5 bg-white rounded">
                    <h3>Account Settings</h3>
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
@endsection
