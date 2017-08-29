<?php

namespace App\Http\Controllers;
use App\Todo;
use Session;

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
        // Flash message
        Session::flash('success', 'Your todo was creted successfully!');
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
        // Flash message
        Session::flash('success', 'Your todo was deleted successfully!');
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
        // Flash message
        Session::flash('success', 'Your todo was updated successfully!');
    	// Redireckija
    	return redirect(route('todos'));
    }

    // Completed
    public function completed($id)
    {
        // Utimam todo iz baze po id-u
        $todo = Todo::find($id);
        // Complleted je ako je 1, menjam sa 0 na 1
        $todo->completed = 1;
        $todo->save();
        // Flash message
        Session::flash('success', 'Your todo was completed successfully');
        // Redirekcija
        return redirect()->back();
    }
}
