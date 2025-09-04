<?php

namespace Src\Blog\Services;

use Src\Blog\DTO\BlogPostDTO;

class BlogService
{
    protected $posts = [];

    public function createPost(BlogPostDTO $postDTO): void
    {
        $this->posts[] = $postDTO;
    }

    public function updatePost(int $postId, BlogPostDTO $postDTO): bool
    {
        if (isset($this->posts[$postId])) {
            $this->posts[$postId] = $postDTO;
            return true;
        }
        return false;
    }

    public function deletePost(int $postId): bool
    {
        if (isset($this->posts[$postId])) {
            unset($this->posts[$postId]);
            return true;
        }
        return false;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function getPost(int $postId): ?BlogPostDTO
    {
        return $this->posts[$postId] ?? null;
    }
}