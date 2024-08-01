@extends('layouts.app')
@section('title')
    Úkolovníček
@endsection
@section('content')


    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @foreach($todos as $todo)
                    <li class="list-group-item">
                        {{$todo->id}}
                        {{$todo->name}}
                        <a href="/details/{{$todo->id}}"><span class="btn btn-default">Zobrazit</span></a> 
                        <a href="/edit/{{$todo->id}}"><span class="btn btn-primary">Upravit</span></a>
                        <a href="/delete/{{$todo->id}}" onclick="return confirm('Opravdu chcete tento úkol smazat?')"><span class="btn btn-danger">Smazat</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection