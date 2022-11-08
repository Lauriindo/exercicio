<?php


require_once '../users.php';

$user = new User();

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $post->get('email');
    $pass = $post->get('password');

    foreach($users_data as $data) {
        if($email == $data['email'] && $pass == $data['password']){
            $user->setName($data['name']);
            $user->setCpf($data['cpf']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setPicture($data['picture']);
        }
    }

    if($email == $user->getEmail() && $pass == $user->getPassword()) {
        $_SESSION['user'] = $user->getEmail();
        include '../library/main.php';
    } else {
        echo 'dados incorretos e/ou inválidos!';
    }
} else {
    echo 'dados não foram preenchidos!';
}