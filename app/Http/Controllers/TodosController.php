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
}
