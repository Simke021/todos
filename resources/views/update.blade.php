@extends('layout')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h2>Update todo:</h2>
			<hr>
			<form action="{{ route('todo.save', ['id' => $todo->id ]) }}" method="post">
				{{ csrf_field() }}
				<input type="text" value="{{ $todo->todo }}" class="form-control input-lg" name="todo">
			</form>
			<hr>
			<p>and just hit enter :)</p>
		</div>
	</div>
@stop