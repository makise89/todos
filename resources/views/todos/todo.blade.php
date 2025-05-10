<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" href="/css/todoStyle.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="todo"><img src="images/todo/todo.png" alt="todo"></a></li>
                <li><a href="calendar"><img src="images/todo/calendar.png" alt="calendar"></a></li>
                <li><a href="news"><img src="images/todo/news.png" alt="news"></a></li>
            </ul>
        </nav>
    
        <main>
            <div class="todo-header">
                <h1>ToDo</h1>
                <p class="not-completed">未完了</p>
                <p class="completed">完了</p>
                <label class="todo-add" id="todo-add"><p class="add"><img src="images/todo/add.png" class="add-img" alt="追加マーク">追加</p></label>
                <form method = "post" id="new-task" class = "new-task">
                    <label>
                        項目<input type="text" name="task" id="task-title">
                    </label>
                    <input type="button" value="追加" id="submit">
                </form>
            </div>
            <section class="todo-main" id="todo-main">
            <ul id="lists" class="lists">
            @foreach($todos as $todo)
                <li class="task">
                    <input type="checkbox" id = "todo-{{$todo->id}}" class ="{{$todo->id}}">{{$todo->title}}
                  <div class="todo-{{$todo->id}}">
                    <p class="confirmation">復元しますか？</p>
                    <p class="maru">○</p>
                    <p class="batu">×</p>
                  </div>
                </li>
            @endforeach
            </ul>
            </section>
        </main>
    </div> 


    <script src = "/js/todo.js"></script> 
</body>
</html>