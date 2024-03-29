<?php

namespace App\Models;

use Core\DB\Model;
use Core\DB\Relation\HasOne;

class Comment extends Model
{
    protected ?int $id = null;

    protected ?string $content = null;

    protected int $is_reported = 0;

    protected int $user_id;

    protected int $is_deleted = 0;

    protected ?int $comment_id = null;

    protected string $created_at;

    protected string $updated_at;

    protected int $picture_id;

    public function __construct()
    {
        parent::__construct($this);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = strip_tags($content);
    }

    public function getIsReported(): int
    {
        return $this->is_reported;
    }

    public function setIsReported(int $is_reported): void
    {
        $this->is_reported = $is_reported;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setComment(int $comment_id): void
    {
        $this->comment_id = $comment_id;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(): void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(): void
    {
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function getIsDeleted(): int
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(int $is_deleted): void
    {
        $this->is_deleted = $is_deleted;
    }

    public function getPictureId(): int
    {
        return $this->picture_id;
    }

    public function setPictureId(int $picture_id): void
    {
        $this->picture_id = $picture_id;
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
