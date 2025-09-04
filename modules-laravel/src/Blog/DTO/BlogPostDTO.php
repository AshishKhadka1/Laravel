<?php

namespace Src\Blog\DTO;

class BlogPostDTO
{
    public string $title;
    public string $content;
    public string $author;

    public function __construct(string $title, string $content, string $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    public function validate(string $title, string $content, string $author): bool
    {
        return !empty($this->title) && !empty($this->content) && !empty($this->author);
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'author' => $this->author,
        ];
    }
}