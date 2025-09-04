<?php

namespace Src\Blog\Http\Controllers;

use Src\Blog\Services\BlogService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        return response()->json(['data' => "adsfasdf"]);

        // $posts = $this->blogService->getPosts();
        // return response()->json(['data' => $posts]);
    }

    public function show($id)
    {
        $post = $this->blogService->getPost($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json(['data' => $post]);
    }

    public function store(Request $request)
    {
        $dto = new \Src\Blog\DTO\BlogPostDTO(
            $request->input('title'),
            $request->input('content'),
            $request->input('author')
        );

        if (!$dto->validate($dto->title, $dto->content, $dto->author)) {
            return response()->json(['message' => 'Validation failed.'], 422);
        }

        $this->blogService->createPost($dto);
        return response()->json(['message' => 'Post created successfully.'], 201);
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        //     'author' => 'required|string|max:255',
        // ]);

        $dto = new \Src\Blog\DTO\BlogPostDTO(
            $request->input('title'),
            $request->input('content'),
            $request->input('author')
        );

        $updated = $this->blogService->updatePost($id, $dto);
        if (!$updated) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json(['message' => 'Post updated successfully.']);
    }

    public function destroy($id)
    {
        $deleted = $this->blogService->deletePost($id);
        if (!$deleted) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json(['message' => 'Post deleted successfully.']);
    }
}
