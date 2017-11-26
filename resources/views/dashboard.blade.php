@extends('layout/layout')

@section('title', 'Housework task list')

@section('content')
<h1>Task list</h1>

<p><a href="{{route('construct')}}">New task</a></p>
<h2>Current tasks</h2>
<table>
  <thead>
	<tr>
	  <th>Task</th>
	  <th>Date</th>
	  <th>Complete</th>
	</tr>
  </thead>
  <tbody>
	@foreach ($active as $task)
	<tr class='task'>
	  <td class='name'>{{$task->tasktype->name}}</td>
	  @if ($task->date->isToday())
	  <td class='date date-current'>{{$task->date->format("j F")}}</td>
	  @elseif ($task->date->isPast())
	  <td class='date date-overdue'>{{$task->date->format("j F")}}</td>
	  @else
	  <td class='date date-future'>{{$task->date->format("j F")}}</td>
	  @endif
	  <td class='completion'>
		@if ($task->date->isFuture() && ($task->tasktype->visibility != 0 && $task->date->gte(new Carbon\Carbon("+".$task->tasktype->visibility." days"))))
		-
		@else
		<form action='{{route('complete', $task->id)}}' method='post'>
		  {{csrf_field()}}
		  <button type='submit'>Done</button>
		</form>
		@endif
	  </td>
	</tr>
	@endforeach
  </tbody>
</table>
@stop
