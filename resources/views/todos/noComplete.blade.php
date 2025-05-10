
@extends('layouts.appTodo')

@section('title','ToDoNoComplete')

@section('cssFile','/css/todos/noComplete.css')

@section('content')     
    <section class="todo-main" id="todo-main">
        <div class="taskHeader">
            <h2 class="noColumn">No.</h2>
            <h2 class="taskColumn">タスク名</h2>
            <h2 class="createdDataColumn">作成日</h2>
            <h2 class="priorityColumn">重要度</h2s>
            <h2 class="checkColumn">進行状況</h2>
        </div>
        <ul id="lists" class="lists">
            @foreach($todos as $todo)
            @if($todo->priority)
            <li class="{{$todo->id}}">
                    <p class="no">{{$loop->iteration}}</p>
                    <p class="taskName">{{$todo->title}}</p>
                    <p class="createdData">{{$todo->created_at}}</p>
                    <p class="priority">★</p>
                    <p class="check"><input type="checkbox" id="check" class="{{$todo->id}}"></p>
                </li>
            @else
                <li class="{{$todo->id}}">
                    <p class="no">{{$loop->iteration}}</p>
                    <p class="taskName">{{$todo->title}}</p>
                    <p class="createdData">{{$todo->created_at}}</p>
                    <p class="priority">☆</p>
                    <p class="check"><input type="checkbox" id="check" class="{{$todo->id}}"></p>
                </li>
            @endif
            @endforeach
            </ul>
    </section>
@endsection

@section('jsFile',"/js/todos/noComplete.js")

