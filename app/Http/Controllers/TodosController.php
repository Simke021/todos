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
}
