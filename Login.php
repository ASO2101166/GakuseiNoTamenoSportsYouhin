<!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <link rel="stylesheet" href="./css/login_style.css" />
        <title></title>
        <?php
            if(!isset($_SESSION)){
                session_start();
            }
        ?>
    </head>
    <body>
        <h1>学生のためのスポーツ用品</h1>
        <?php
            if(isset($_GET['error'])){
        ?>
            <div class="error" style="text-align: center;">メールアドレスまたはパスワードが違います</div>
        <?php
            }
        ?>
        <div id="app">
            <div class="allform">
                <form action="php/LoginCheck.php" method="post">
                    <input class="form" type="email" name="mail" v-model="email" placeholder="mail address"><br>
                    <p v-if="isInValidEmail" class="error">正しいメールアドレスの形式で入れてください</p>
                    <input class="form" type="password" v-model="password" name="password" placeholder="password">
                    <p v-if="isInValidPassword" class="error">パスワードは8桁以上の英数字で入れてください</p>
                    <input class="form" type="submit" value="ログイン">
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="./js/LoginCheck.js"></script>
    </body>
</html>

<?php
    require_once './php/UserInfo.php';
    require_once './php/SessionCheck.php';
    $ClsSessionCheck = new SessionCheck();
    if($ClsSessionCheck->usersessioncheck() == true){
        header('Location: ItemList.php', true, 304);
        exit();
    }
?>