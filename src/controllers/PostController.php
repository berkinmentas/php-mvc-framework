<?php

namespace App\src\controllers;

use App\lib\Response;
use App\lib\View;
use App\src\models\Post;

class PostController extends Controller
{
    private $postModel;

    public function __construct(&$request, &$response)
    {
        parent::__construct($request, $response);
        $this->postModel = new Post();
    }

    public function index()
    {
        $posts = $this->postModel->all();
        return Response::success($posts);
    }

    public function show()
    {
        $id = $this->request->getParam('id');

        if (!$id) {
            throw new \Exception("Post ID required");
        }

        $data = $this->postModel->find($id);

        if (!$data) {
            throw new \Exception("Post not found");
        }

        $viewContent = View::render('test', $data);

        return Response::success($viewContent);
    }

    public function store()
    {
        $data = $this->request->getBody();

        if (!$data) {
            throw new \Exception("Request body required");
        }

        if (!isset($data['title']) || empty($data['title'])) {
            throw new \Exception("Title required");
        }

        if (!isset($data['content']) || empty($data['content'])) {
            throw new \Exception("Content required");
        }

        $postId = $this->postModel->create($data);

        if (!$postId) {
            throw new \Exception("Post not created");
        }

        return Response::success($postId);
    }
    public function update()
    {
        $id = $this->request->getParam('id');

        if (!$id) {
            throw new \Exception("Post ID required");
        }

        $data = $this->request->getBody();

        if (!$data) {
            throw new \Exception("Request body required");
        }

        $post = $this->postModel->find($id);

        if (!$post) {
            throw new \Exception("Post not found");
        }

        $result = $this->postModel->update($id, $data);

        if (!$result) {
            throw new \Exception("Post not updated");
        }

        return Response::success([
            'id' => $id,
            'message' => 'Post updated successfully'
        ]);
    }

    public function destroy()
    {
        $id = $this->request->getParam('id');

        if (!$id) {
            throw new \Exception("Post ID required");
        }

        $post = $this->postModel->find($id);

        if (!$post) {
            throw new \Exception("Post not found");
        }

        $result = $this->postModel->delete($id);

        if (!$result) {
            throw new \Exception("Post not deleted");
        }

        return Response::success([
            'message' => 'Post deleted successfully'
        ]);
    }
}