 
$dataPoints = array(
     @if(count($results) > 0) 
     @foreach ($results as $data)
     array("y" => $results->value, "label"
     @foreach (range(1, 6) as $i)
     => "{{ $data->created_at }}', {{ $data->value + $data->value}}") 
 @endforeach
@endforeach
@else
<div class="col-md-4"><h1 class="text-danger">No data found</h1></div>
@endif
);
 