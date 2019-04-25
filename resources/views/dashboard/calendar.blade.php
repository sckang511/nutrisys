@extends('layouts.app')

@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-md-10">
            <div class="text-left" style="margin-top: 20px;">
                <div class="page-header text-info">
                    <h1>CALENDAR</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h2>Something</h2>
                            <h5>We deliver a proven program and you'll learn how to eat healthier to help keep yourself healthy.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

