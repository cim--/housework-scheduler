@extends('layout/layout')

@section('title', 'Housework task list')

@section('content')
<h1>New Task</h1>
<p><a href='{{route('dashboard')}}'>Back to list</a></p>

<form action='{{route('task.create')}}' method='post'>
  <table>
	<tr>
	  <th>Name</th>
	  <td><input name='taskname' size='40' required></td>
	</tr>
	<tr>
	  <th>Repetition</th>
	  <td>
		<select name='schedule'>
		  @foreach ($schedules as $schedule)
		  <option value='{{$schedule->id}}'>{{$schedule->description}}</option>
		  @endforeach
		</select>
		<input name='frequency' value='7' type='number' min='1'>
	  </td>
	</tr>
	<tr>
	  <th>Initial date</th>
	  <td><input name='date' type='date' required></td>
	</tr>
	<tr>
	  <th>Visible from</th>
	  <td><input name='visibility' type='number' value='0' min='0'> (0 for always)</td>
	</tr>
  </table>
  <input type='submit' value='Create task'>
  {{ csrf_field() }}
</form>

@stop
