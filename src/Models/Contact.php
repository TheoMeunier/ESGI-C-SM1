<?php

namespace App\Models;

use Core\DB\DB;

class Contact extends DB
{
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}