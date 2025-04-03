<!DOCTYPE html>
<html lang="en">
@include('include.head')
<body>
    @if($action == 'add')
    @include('add')
@elseif($action == 'edit')
    @include('edit')
@elseif($action == 'detail')
    @include('detail')
@elseif(is_numeric($action))
    <h1>Promotion ID: {{ $action }}</h1>
@else
    <h1>Invalid Promotion Action</h1>
@endif
</body>
</html>

