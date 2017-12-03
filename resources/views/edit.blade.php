@extends('layout/layout')

@section('title', 'Housework task list')

@section('content')
<h1>Edit Task: {{$task->tasktype->name}}</h1>
<p><a href='{{route('dashboard')}}'>Back to list</a></p>

<form action='{{route('update', $task->id)}}' method='post'>
  <table>
	<tr>
	  <th>Repetition</th>
	  <td>
		<select name='schedule'>
		  @foreach ($schedules as $schedule)
		  <option value='{{$schedule->id}}'
			@if ($task->tasktype->scheduler_id == $schedule->id)
			selected='selected'
			@endif
			>{{$schedule->description}}</option>
		  @endforeach
		</select>
		<input name='frequency' value='{{$task->tasktype->schedule}}' type='number' min='1'>
	  </td>
	</tr>
	<tr>
	  <th>Next date</th>
	  <td><input name='date' type='date' value='{{$task->date->format("Y-m-d")}}' required></td>
	</tr>
	<tr>
	  <th>Visible from</th>
	  <td><input name='visibility' type='number' value='{{$task->tasktype->visibility}}' min='0'> (0 for always)</td>
	</tr>
  </table>
  <input type='submit' value='Update task'>
  {{ csrf_field() }}
</form>

@stop
