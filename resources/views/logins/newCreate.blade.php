<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newCreate</title>
    <link rel="stylesheet" href="/css/logins/newCreate.css">
</head>
<body>
         @error('user')  {{-- ← ここも 'username' → 'user' に修正！ --}}
    <div class="error">{{ $message }}</div>
         @enderror
    <div class="login-main">
        <div class="border">
            <h1>新規作成</h1>
            <form method="post" action="/login/newCreate" autocomplete="off">
            @csrf  {{-- ← これを入れる！ --}}
                <div class="user">
                    <p>ユーザ名</p>
                    <input type="text" name="user">
                </div>
        
                <div class="password">
                    <p>パスワード</p>
                    <input type="text" name="password">
                </div>
                <input type="submit" value="新規登録">      
            </form>
        </div>       
    </div>

    <script src="/js/logins/newCreate.js"></script>
</body>
</html>