<?php

namespace App\Http\Controllers;
use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
	// Todos page
    public function index(){
    	// Utimam iz baze sve
    	$todos = Todo::all();
    	return view('todos')->with('todos', $todos);
    }

    // Data from form, new todo - post request
    public function store(Request $request){
    	//Ubacujem u bazu novi Todo
    	$todo = new Todo;
    	$todo->todo = $request->todo;
    	$todo->save();
    	// Redirekcija
    	return redirect()->back();
    }

    // Brisadnje todo-a po id-u
    public function delete($id)
    {
    	// Trazim iz baze todo po id-u
    	$todo = Todo::find($id);
    	// Brisem ga
    	$todo->delete();
    	// Redirekcija
    	return redirect()->back();
    }

    // Update todo-a
    public function update($id)
    {
    	// Treazim todo po id-u
    	$todo = Todo::find($id);
    	// Prikazujem ga na strani za update
    	return view('update')->with('todo', $todo);
    }

    // Post metod forme za update todo-a
    public function save(Request $request, $id)
    {
    	// Treazim todo po id-u
    	$todo = Todo::find($id);
    	// Uzimam vrednost iz forme
    	$todo->todo = $request->todo;
    	// Sacuvavam u bazi
    	$todo->save();
    	// Redireckija
    	return redirect(route('todos'));
    }
}
