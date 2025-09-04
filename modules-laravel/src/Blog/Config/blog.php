<?php

return [
    'default_per_page' => 10,
    'allowed_image_types' => ['jpg', 'jpeg', 'png', 'gif'],
    'max_image_size' => 2048, // in kilobytes
    'default_author' => 'Admin',
    'blog_post_status' => [
        'draft' => 'Draft',
        'published' => 'Published',
        'archived' => 'Archived',
    ],
];