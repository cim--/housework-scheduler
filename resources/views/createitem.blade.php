@extends('layout/layout')

@section('title', 'Housework task list')

@section('content')
<h1>New Item</h1>
<p><a href='{{route('dashboard')}}'>Back to list</a></p>

<form action='{{route('item.store')}}' method='post'>
  <table>
	<tr>
	  <th>Name</th>
	  <td><input name='item' size='40' required></td>
	</tr>
  </table>
  <input type='submit' value='Create item'>
  {{ csrf_field() }}
</form>

@stop
