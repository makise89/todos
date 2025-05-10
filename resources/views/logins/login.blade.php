<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/logins/login.css">
</head>
<body>
      
    <div class="login-main">
        <div class="border">
            <h1>ログイン</h1>
            @if ($errors->has('login'))
               <p class="error">{{ $errors->first('login') }}</p>
            @endif
            <form method="post" action="/login" autocomplete="off">
            @csrf  {{-- ← これを入れる！ --}}
                <div class="user">
                    <p>ユーザ名</p>
                    <input type="text" name="user">
                </div>
        
                <div class="password">
                    <p>パスワード</p>
                    <input type="text" name="password">
                </div>
                <input type="submit" value="ログイン">      
            </form>
            <a href="/newCreate">新規作成</a>
        </div>       
    </div>

    <script src="js/logins/login.js"></script>
</body>
</html>