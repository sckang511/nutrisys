@extends('layouts.app')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded" style="background-color: white"">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-left">
                <div class="page-header text-info">
                    <h1>DAILY GOAL</h1>
                </div><br>
                <table class="table table-striped table-responsive-md">
                    <thead>
                    <tr>
                        <th scope="col" class="text-info text-uppercase">Nutrition Facts</th>
                        <th scope="col" class="text-info text-uppercase">Current Progress</th>
                        <th scope="col" class="text-info text-uppercase">Daily Serving</th>
                        <th scope="col" class="text-info text-uppercase">Daily Goal</th>
                        <th scope="col" class="text-info text-uppercase">Edit</th>
                        <th scope="col" class="text-info text-uppercase">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($query) > 0)
                            @foreach ($query as $goals)
                                <tr>
                                    <th scope="row">{{ $goals->nutrition_type}}</th>
                                    <td><progress value="{{ $goals->protein }}" max="{{ $goals->value }}"></progress>&emsp;&emsp;{{ number_format(((($goals->protein)/($goals->value)) * 100), 0, '.','')}}%</td>
                                    <td>{{ $goals->protein }} {{ $goals->serving_unit }}</td>
                                    <td contenteditable="true">{{ $goals->value }} {{ $goals->serving_unit }}</td>
                                    <td><button class="btn btn-info btn-rounded btn-sm btn_edit" value="{{ $goals->goal_id }}"><i class="fas fa-pencil-square-o ml-1"></i>&emsp;Edit</td>
                                    <td><button class="btn btn-danger btn-rounded btn-sm btn_delete" value="{{ $goals->goal_id }}"><i class="fas fa-times ml-1"></i>&emsp;Delete</td>
                                </tr>
                            @endforeach
                        @else
                            <div class="col-md-10"><h5 class="text-danger">No data found this time!</h5></div>
                        @endif
                    </tbody>
                </table>
                <h5 class="text-left">{{ $query->links() }}</h5>
                @if(count($recommend) > 0)
                    @foreach ($recommend as $goals)
                        @if(($goals->value - $goals->protein) < 0)
                            <h4 class="text-left text-warning">{{ $goals->goal_type }} recommended intake of {{ $goals->nutrition_type }} is : {{ abs($goals->value - $goals->protein) }} {{ $goals->serving_unit }}</h4>
                        @endif
                    @endforeach
                @endif
                <!-- Delete confirmation modal -->
                <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" ariellabeled_by="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color: rgba(0, 0, 0, 0.7); color: #fff">
                            <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                            <button type="button" class="close text-white font-weight-bold" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <form id="modalDeleteForm">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" id="delete_id">
                                    <h4 class="text-secondary">Are you sure, do you like to delete this record?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h5>@include('message/message')</h5>
                    </div>
                </div><br>
            </div>   
        </div>
    </div>
    <div class="row ">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="page-header text-success">Weekly Progress</h2>
            {{-- <div class="lead">
                <form class="form-group" action = "{{ route('store') }}" method = "POST">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <label class="control-label"><h4>Select Goal:</h4></label>&emsp;
                        <select class="form-control input-lg col-6" name="view_goel">
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                        </select>
                    </div>
                </form>
            </div> --}}
            <div class="jumbotron" id="curve_chart" style="width: auto; height: 550px">
            </div>
        </div>
    </div><br>
</div>
<!-- Chart -->
<script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                @if(count($chart) > 0)
                    ['Days', '{{ $chart[0]->nutrition_type }}', 'Daily Goal'],
                    @foreach($chart as $data)
                        //['{{ date("D M, j", strtotime($chart[3]->created_at)) }}', {{ $chart[2]->protein }}, {{ $chart[1]->value }}],
                        @foreach(range(1, count($chart)) as $i)
                            ['{{ date("D M, j", strtotime($chart[3]->created_at)) }}', {{ $chart[2]->protein }} + {{ $chart[2]->protein }}, {{ $chart[1]->value }}],
                            //['{{ date("D M, j", strtotime($data->created_at.'+1 days')) }}', {{ $data->protein }}, {{ $data->value }}],  
                        @endforeach
                    @endforeach
                @else
                    <div class="col-md-4"><h5 class="text-danger">No data found</h5></div>
                @endif
            ]);
            var options = {
                /* @if(count($chart) > 0)
                    title: 'Weekly {{ $chart[0]->nutrition_type }} Chart',
                @else
                    <div class="col-md-4"><h5 class="text-danger">No data found</h5></div>
                @endif */
                curveType: 'function',
                legend: { position: 'right'}
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    </script>
  <!-- Ajax data deletion -->
    <script type="text/javascript">

        $(document).ready(function() { 
            $('.btn_delete').on('click', function (e) {
                e.preventDefault();
                $('#delete_modal').modal('show');
                var id_data = $('.btn_delete').attr('value');
                $('#delete_modal').find('input[name="id"]').val(id_data);
                $('#delete_id').val(id_data);
            });

            $('#modalDeleteForm').on('submit', function(e){
                e.preventDefault();
                var id = $('#delete_id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
                
                $.ajax({
                    type: "DELETE",
                    url: "/goal/progress/deleteRecord/"+id,
                    data: $('#modalDeleteForm').serialize(),
                    success: function(response){
                        $('#delete_modal').modal('hide');
                        alert('Data Deleted');
                    }
                });
            });
        });
  </script>
@endsection
