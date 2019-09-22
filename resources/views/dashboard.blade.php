@extends('layout/layout')

@section('title', 'Housework task list')

@section('content')
<h1>Task list</h1>

<div class='row'>
  <div class='col'>
<p><a href="{{route('task.construct')}}">New task</a></p>
<h2>Current tasks</h2>
<table>
  <thead>
	<tr>
	  <th>Task</th>
	  <th>Date</th>
	  <th>Complete</th>
      <th>Edit</th>
	</tr>
  </thead>
  <tbody>
	@foreach ($active as $task)
	<tr class='task'>
	  <td class='name'>{{$task->tasktype->name}}</td>
	  @if ($task->date->isToday())
	  <td class='date date-current'>{{$task->date->format("j F Y")}}</td>
	  @elseif ($task->date->isPast())
	  <td class='date date-overdue'>{{$task->date->format("j F Y")}}</td>
	  @elseif ($task->date->isTomorrow())
	  <td class='date date-soon'>{{$task->date->format("j F Y")}}</td>
	  @else
	  <td class='date date-future'>{{$task->date->format("j F Y")}}</td>
	  @endif
	  <td class='completion'>
		@if ($task->date->isFuture() && ($task->tasktype->visibility != 0 && $task->date->gte(new Carbon\Carbon("+".$task->tasktype->visibility." days"))))
		-
		@else
		<form action='{{route('task.complete', $task->id)}}' method='post'>
		  {{csrf_field()}}
		  <button type='submit'>Done</button>
		</form>
		@endif
	  </td>
	  <td>
		<a href='{{route('task.edit', $task->id)}}'>Edit</a>
	  </td>
	</tr>
	@endforeach
  </tbody>
</table>
  </div>
  <div>
    <p><a href="{{route('item.create')}}">New item</a></p>
    <h2>Required items</h2>
    <table>
      <tr><th>Item</th><th>Done?</th></tr>
      @foreach ($items as $item)
      <tr>
	<td>{{$item->item}}</td>
	<td>
	  <form action='{{route('item.destroy', $item->id)}}' method='post'>
	    {{csrf_field()}}
	    <button type='submit'>Done</button>
	  </form>
	</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>


@stop
