<?php
require __DIR__ . '/scripts/testApi.php';

$api = new JsonPlaceholderApi();

// Получение пользователей
$users = $api->getUsers();
print_r($users);

// Получение всех постов для пользователя с id 1
$userPosts = $api->getUserPosts(1);
print_r($userPosts);

// Получение поста с id 1
$post = $api->getPost(1);
print_r($post);

// Создание нового поста
$newPost = $api->createPost([
    'userId' => 1,
    'title' => 'New Post',
    'body' => 'This is a new post.',
]);
print_r($newPost);

// Обновление поста с id 1
$updatedPost = $api->updatePost(1, [
    'title' => 'Updated Post',
    'body' => 'This post has been updated.',
]);
print_r($updatedPost);

// Удаление поста с id 1
$api->deletePost(1);
