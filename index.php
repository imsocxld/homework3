<?php require_once "form.php" ?>

<!doctype html>
<!doctype html>
<html lang="ru">

<body bgcolor="#f0f0f0">
<div>

    <form action="./" method="post">
        <label>Введите имя:</label> <input name="name"/><br>
        <label>Введите фамилию:</label> <input name="surname"/><br>
        <label>Введите логин:</label> <input name="login"/><br>
        <label for="password">Введите пароль:</label><input type="password" name="password"/><br>

        <button type="submit">Отправить</button>

    </form>


    <?php $validate = valid($_POST)?>
    <?php if (!empty($validate['error']) and $validate['error']): ?>
        <?php foreach ($validate['messages'] as $message): ?>
            <p style="color: red">
                <?= $message ?>
            </p>
        <?php endforeach;  ?>
    <?php endif;?>
    <?php if (!empty($validate['success']) and $validate['success']):?>
        <?php foreach ($validate['messages'] as $message):?>
            <p style="color: green">
                <?= $message ?>
            </p>
        <?php endforeach;?>
    <?php endif;?>

    <style lang="html">

        .reg-form {
            text-align: left;
            width: 40%;
        }

        .content label, input {
            width: 70%;
            display: block;
            padding: 5px;
        }

    </style>
</div>
</body>