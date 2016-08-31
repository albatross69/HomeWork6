<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkin</title>
<!--    <script src='https://www.google.com/recaptcha/api.js'></script>-->
</head>
<body>
    <form name="checkform" method="post" action="/checkin/reg" enctype="multipart/form-data">
        <p><label for="username">Логин<br/>
                <input type="text" name="username"></label></p>

        <p><label for="password">Пароль<br/>
                <input type="password" name="password"></label></p>

        <p><label for="name">Имя<br/>
                <input type="text" name="fullname"></label></p>

        <p><label for="age">Возраст<br/>
                <input type="number" name="age"></label></p>

        <p><label for="about">О себе<br/>
                <textarea name="about"></textarea></label></p>

        <p><label for="photo">Фотография<br/>
                <input type="file" name="photo"></label></p>

<!--        <div class="g-recaptcha" data-sitekey="6LdE9ygTAAAAAPc5wVxfyQ6d3TbPGkslQoOqDCJ-"></div>-->

        <p><input type= "submit" value="Регистрация"></p>
    </form>
    <p><a href="/">На главную</a></p>
</body>
</html>