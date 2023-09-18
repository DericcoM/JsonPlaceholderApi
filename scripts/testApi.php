<?php
require __DIR__ . '/../vendor/autoload.php';

class JsonPlaceholderApi
{
    private $baseUri;
    private $httpClient;

    public function __construct()
    {
        $this->baseUri = 'https://jsonplaceholder.typicode.com';
        $this->httpClient = new \GuzzleHttp\Client(['verify' => false]);
    }

    public function getUsers()
    {
        $response = $this->httpClient->get($this->baseUri . '/users');
        return json_decode($response->getBody(), true);
    }

    public function getUserPosts($userId)
    {
        $response = $this->httpClient->get($this->baseUri . "/users/{$userId}/posts");
        return json_decode($response->getBody(), true);
    }

    public function getPost($postId)
    {
        $response = $this->httpClient->get($this->baseUri . "/posts/{$postId}");
        return json_decode($response->getBody(), true);
    }

    public function createPost($data)
    {
        $response = $this->httpClient->post($this->baseUri . '/posts', [
            'json' => $data,
        ]);
        return json_decode($response->getBody(), true);
    }

    public function updatePost($postId, $data)
    {
        $response = $this->httpClient->put($this->baseUri . "/posts/{$postId}", [
            'json' => $data,
        ]);
        return json_decode($response->getBody(), true);
    }

    public function deletePost($postId)
    {
        $this->httpClient->delete($this->baseUri . "/posts/{$postId}");
    }
}
