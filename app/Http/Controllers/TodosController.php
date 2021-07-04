<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        return view('todos.index')->with('todos', Todo::all());
    }
    public function show(Todo $todo){
        return view('todos.show')->with('todo', $todo);
    }
    public function create(){
        return view('todos.create');
    }
    public function store(){
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        session()->flash('success', 'Todo created successfully');
        return redirect('/todos');
    }
    public function edit(Todo $todo){
        return view('todos.edit')->with('todo', $todo);
    }
    public function update(Todo $todo){
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        $data = request()->all();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash('success', 'Todo update successfully');
        return redirect('/todos');
    }
    public function destroy(Todo $todo){
        $todo->delete();
        session()->flash('success', 'Todo delete successfully');
        return redirect('/todos');
    }
    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();
        session()->flash('success', 'Todo success completed successfully');
        return redirect('/todos');
    }
    
}
