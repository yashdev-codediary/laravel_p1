
<div>Tasks List</div>

@if (count($tasks))
 @foreach ($tasks as $row)
    <div>
        <a href="{{ route('task.showone', ['id' => $row->id ]) }}">{{ $row->title }}</a>
    </div>
 @endforeach
@else
    <div>Enjoy</div>
@endif


