<!DOCTYPE html>
<html lang="ja">
    <style>
        body {
            background-color: #fffacd;
        }
        h1 {
            font-size: 16px;
            color: #ff6666;
        }
        #button {
            width: 200px;
            text-align: center;
        }
            #button a {
            padding: 10px 20px;
            display: block;
            border: 1px solid #2a88bd;
            background-color: #FFFFFF;
            color: #2a88bd;
            text-decoration: none;
            box-shadow: 2px 2px 3px #f5deb3;
        }
            #button a:hover {
            background-color: #2a88bd;
            color: #FFFFFF;
        }
    </style>
    <body>
        <p>{{$text}}</p></br>
        <p>{{$data}}</p>

        <p>ログインしてご確認ください。</p>
        <a href="#">マイページへ</a>

        </br>
        <p>こちらのメールは送信専用です。</p>

        <p>お問い合わせは、下記メールアドレスもしくは専用フォームよりお願い致します。</p>
        <a href="mailto:medista.online@gmail.com">メールはこちらへ</a>

    </body>
</html>
