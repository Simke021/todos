@extends('layout')
@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="/create/todo" method="post">
				{{ csrf_field() }}
				<input type="text" class="form-control input-lg" name="todo" placeholder="Create new todo">
			</form>
		</div>		
	</div>
	<hr>
    @foreach($todos as $todo)
        {{ $todo->todo }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash btn-xs" aria-hidden="true"></span></a> <a href="{{ route('todo.update', ['id' => $todo->id]) }}"class="btn btn-success"><span class="glyphicon glyphicon-pencil btn-xs" aria-hidden="true"></span></a>
        <hr>
        @endforeach
@stop