<?php

namespace App\Models;

use Core\DB\Model;
use Core\DB\Relation\BelongToMany;

class Category extends Model
{
    protected ?int $id = null;

    protected ?string $name = null;

    protected string $slug;

    protected int $is_deleted = 0;

    protected string $created_at;

    protected string $updated_at;

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

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIsDeleted(): int
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(int $is_deleted): void
    {
        $this->is_deleted = $is_deleted;
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

    public function pictures(): BelongToMany
    {
        return $this->belongsToMany(Picture::class, 'picture_category', 'category_id', 'picture_id');
    }
}
