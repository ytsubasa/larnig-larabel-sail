<!DOCTYPE html>
<htmle lang="ja">
<head>
    <mata charset='utf-8'>
        <title>トップ画面</title>
</head>
<body>
    <p>こんにちは！
@if (Auth::check())
    {{n\Auth::user()->name }}さん</p>
    <p><anhref="/logout">ログアウト</a><br><a href="/register">会員登録</a></p>
@else
    ゲストさん</p>
    <p><a href="/logout ">ログイン</a><br><a href="/register">会員登録</a></p>
@endif
</body>
</htmle>