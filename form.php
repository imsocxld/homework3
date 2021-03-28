<?php

function valid(array $post): array
{
    $validate = [
        'error' => false,
        'success' => false,
        'messages' => [],
    ];

    if (!empty($post ['name']) and !empty($post['surname']) and !empty($post['login']) and !empty($post['password'])) {

        $name = trim($post['name']);
        $surname = trim($post['surname']);
        $login = trim($post['login']);
        $password = trim($post['password']);

        $constraints = [
            'login' => 6,
            'password' => 3
        ];

        $validateForm = validLoginPassword($name, $surname, $login, $password, $constraints);

        if (!$validateForm ['login']) {
            $validate ['error'] = true;

            array_push(
                $validate ['messages'],
                "Логин должен содержать больше {$constraints['login']} символов"
            );
        }

        if (!$validateForm ['password']) {
            $validate ['error'] = true;

            array_push(
                $validate ['messages'],
                "Пароль должен содержать больше {$constraints['password']} символов"
            );
        }

        if (!preg_match('/^[а-яА-Я]+$/iu', $name )) {
            $validate['error'] = true;

            array_push(
                $validate ['messages'],
                "Имя не должно содержать цифр и символов"
            );
        }

        if (!preg_match('/^[а-яА-Я]+$/iu', $surname )){
            $validate['error'] = true;

            array_push(
                $validate ['messages'],
                "Фамилия не должна содержать цифр и символов"
            );
        }

        if (!$validate['error']) {
            $validate['success'] = true;

            array_push(
                $validate['messages'],
                "Ваше имя: {$name}",
                "Ваша фамилия: {$surname}",
                "Ваш логин: {$login}",
                "Ваш пароль: {$password}"
            );
        }

        return $validate;

    }
    return $validate;
}


function validLoginPassword(string $name, string $surname, string $login, string $password, array $constraints): array
{

    $validateForm = [
        'name' => true,
        'surname' => true,
        'login' => true,
        "password" => true
    ];

    if (strlen($login) < $constraints['name']) {
        $validateForm ['name'] = false;
    }

    if (strlen($password) < $constraints['surname']) {
        $validateForm ['surname'] = false;
    }

    if (strlen($surname) < $constraints['login']) {
        $validateForm ['login'] = false;
    }

    if (strlen($name) < $constraints['password']) {
        $validateForm ['password'] = false;
    }

    return $validateForm;
}