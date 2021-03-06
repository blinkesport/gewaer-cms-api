<?php
declare(strict_types=1);

namespace Gewaer\Models;

use Phalcon\Di;

class PostsLikes extends BaseModel
{
    /**
     * @var integer
     */
    public $posts_id;

    /**
     * @var integer
     */
    public $users_id;

    /**
     * @var datetime
     */
    public $created_at;

    /**
     * @var datetime
     */
    public $updated_at;

    /**
     * @var integer
     */
    public $is_deleted;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();

        $this->setSource('posts_likes');

        $this->belongsTo(
            'posts_id',
            Posts::class,
            'id',
            ['alias' => 'posts']
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource(): string
    {
        return 'posts_likes';
    }

    /**
     * Get the currents user's post like if it exists
     * @param int $postsId
     * @return array
     */
    public static function getCurrentUsersLike(int $postsId): array
    {
        $userPostLike = PostsLikes::findFirst([
            'conditions'=>'posts_id = ?0 and users_id = ?1',
            'bind'=>[$postsId,Di::getDefault()->get('userData')->getId()]
        ]);

        return $userPostLike ? $userPostLike->toArray() : [];
    }
}
