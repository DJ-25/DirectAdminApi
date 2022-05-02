@if($messages && isset($messages['result']))
    <div style="color:green">{{ $messages['result'] }}</div>
@endif

@if($messages && isset($messages['success']))
    <div style="color:green">{{ $messages['success'] }}</div>
@endif

@if($messages && isset($messages['error']))
    <div style="color:red">{{ $messages['error'] }}</div>
@endif