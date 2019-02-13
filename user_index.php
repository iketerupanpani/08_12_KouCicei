<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>課題</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
        body{
            background-color:ivory;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">メンバー登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="user_index.php">メンバー登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_select.php">登録一覧</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="user_insert.php">
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="名前を入力してください">
        </div>
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid">
        </div>
        <div class="form-group">
            <label for="lpw">パスワード</label>
            <input type="password" class="form-control" id="lpw" name="lpw">
        </div>
         <div class="form-group">
            <label for="kanri_flg"></label>
            <input type="radio" class="form-control" id="kanri_flg" name="kanri_flg" value='0'>一般
            <input type="radio" class="form-control" id="kanri_flg" name="kanri_flg" value='1'>管理者
        </div>
         <div class="form-group">
            <label for="life_flg"></label>
            <input type="radio" class="form-control" id="life_flg" name="life_flg"  value='0'>アクティブ
            <input type="radio" class="form-control" id="life_flg" name="life_flg"  value='1'>非アクティブ

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>

</body>

</html>