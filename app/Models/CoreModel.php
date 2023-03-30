<?php

namespace App\Models;

abstract class CoreModel
{
    protected $id;
    protected $created_at;
    protected $updated_at;

    /**
     * Get the value of id
     */ 
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at(): string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }
}