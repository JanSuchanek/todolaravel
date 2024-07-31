@extends('layouts.app')

@section('title')
    Úkol: {{$todos->name}}
@endsection

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <b>Úkol: {{$todos->name}}</b>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$todos->name}}</h5>
            <p class="card-text">{{$todos->description}}.</p>
            <a href="/edit/{{$todos->id}}"><span class="btn btn-primary">Upravit</span></a>
            <a href="/delete/{{$todos->id}}"><span class="btn btn-danger">Smaza</span></a>
        </div>
    </div>

@endsection