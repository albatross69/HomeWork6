<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="7">
        <tr>
            <th>Имя файла</th>
        </tr>
        <?php foreach ($data as $row):?>
            <tr>
                <td><?php echo $row['Img']?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <p><a href="/">На главную</a></p>
    <p><a href="/user">Назад</a></p>
</body>
</html>