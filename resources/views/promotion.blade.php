@if($action == 'add')
    <h1>Adding a New Promotion</h1>
@elseif($action == 'edit')
    <h1>Editing a Promotion</h1>
@elseif($action == 'detail')
    <h1>Viewing Promotion Details</h1>
@elseif(is_numeric($action))
    <h1>Promotion ID: {{ $action }}</h1>
@else
    <h1>Invalid Promotion Action</h1>
@endif
