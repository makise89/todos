@extends('layouts.appTodo')

@section('title','complete')

@section('cssFile','/css/todos/complete.css')

@section('content')     
    <section class="todo-main" id="todo-main">
        <div class="taskHeader">
            <h2 class="noColumn">No.</h2>
            <h2 class="taskColumn">タスク名</h2>
            <h2 class="createdDataColumn">完了日</h2>
            <h2 class="checkColumn">進行状況</h2>
        </div>
        <ul id="lists" class="lists">
            @foreach($complete as $todo)
                <li class="{{$todo->id}}">
                    <p class="no">{{$todo->id}}</p>
                    <p class="taskName">{{$todo->title}}</p>
                    <p class="createdData">{{$todo->created_at}}</p>
                    <p class="check"><input type="checkbox" id="check" class="{{$todo->id}}"></p>
                </li>
            @endforeach
            </ul>
    </section>
@endsection

@section('jsFile','/js/todos/complete.js')
