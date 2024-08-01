<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TodoController extends Controller
{
	public function index(){
        if(Auth::check()){
            $todo = Todo::all();
            return view('index')->with('todos', $todo);
        }
  
        return redirect("login")->withSuccess('Nemáte opravnění.');
	}
	
	public function create(){
	    return view('create');
	}

	public function details(Todo $todo){
	    return view('details')
	    	->with('todos', $todo);
	}	

    public function edit(Todo $todo){
        return view('edit')
            ->with('todos', $todo);
    }

    public function update(Todo $todo, Request $request){

        $data = $request->all();

        try {
            $request->validate([
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
            return redirect()->action(
                [TodoController::class, 'edit'], ['todo' => $todo]
            )->with('error', 'Prosím vyplňte všechny povinné údaje.');;
        }


        $data = $request->all();
       
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Úkol byl uložen.');

        return redirect('/');

    }    

	public function delete(Todo $todo){

        $todo->delete();

        return redirect('/');

    }

	public function store(Request $request){

        try {
            $request->validate([
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
            return redirect()->action(
                [TodoController::class, 'create'],
            )->with('error', 'Prosím vyplňte všechny povinné údaje.');;
        }

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Nový úkol byl vytvořen.');

        return redirect('/');

    }
}
