<?php

namespace App\Models;

use App\Utils\Database;

class Category extends CoreModel
{
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *  @param int $categoryId
     * @return Category
     */ 
    public function setHome_order(int $home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    public static function find($categoryId)
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query("
        SELECT *
        FROM `category`
        WHERE `id` = {$categoryId}");

        return $pdoStatement->fetchObject(Category::class);
    }

    public static function findAll()
    {
        
    }
}