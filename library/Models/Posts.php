<?php
declare(strict_types=1);

namespace Gewaer\Models;

class Posts extends BaseModel
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $author;

    /**
     * @var integer
     */
    public $post_types_id;

    /**
     * @var integer
     */
    public $games_id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $summary;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $media_url;

    /**
     * @var integer
     */
    public $likes_count;

    /**
     * @var integer
     */
    public $shares_count;

    /**
     * @var integer
     */
    public $views_count;

    /**
     * @var integer
     */
    public $is_published;

    /**
     * @var datetime
     */
    public $published_at;

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
        $this->setSource('posts');
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource(): string
    {
        return 'posts';
    }

}