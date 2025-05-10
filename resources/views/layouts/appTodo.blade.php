<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="@yield('cssFile')">
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
                <h1>タスク</h1>
                <a href="/" id="noComplete" class="not-completed">未完了</a>
                <a href="/complete" id="complete" class="completed">完了</a>
                <label class="todo-add" id="todo-add"><p class="add"><img src="images/todo/add.png" class="add-img" alt="追加マーク">追加</p></label>
                <form method = "post" id="new-task" class = "new-task">
                    <label>
                        <input type="text" name="task" id="task-title">
                    </label>
                    <input type="button" value="追加" id="submit">
                </form>
            </div>          
            @yield('content')
        </main>
    </div> 


    <script src="@yield('jsFile')"></script>
</body>
</html>