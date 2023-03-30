<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Category extends CoreModel
{
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

#Region Getters Setters
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
#End Region

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

    /**
     * Undocumented function
     *
     * @return Category []
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query('
        SELECT * FROM `category`'
        );

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);
    }

    /**
     * Only 5 categories selected for homepage
     *
     * @return Category[]
     */
    public function findAllHomepage()
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query('
        SELECT *
        FROM `category`
        WHERE `home_order` > 0
        ORDER BY `home_order` ASC
        LIMIT 5
        ');

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);
    }

    public function insert()
    {
        $pdo = Database::getPDO();

        $query = $pdo->prepare('
        INSERT INTO `category`
        (`name`, `subtitle`, `picture`
        VALUES (:name, :subtitle, :picture');

        $query->execute([
            ':name' => $this-> name,
            ':subtitle' =>$this-> subtitle,
            ':picture' => $this->picture
        ]);

        if ($query->rowCount() > 0) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `category`
            SET
            name = :name,
            subtitle = :subtitle,
            picture = :picture,
            updated_at = NOW()
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':subtitle', $this->subtitle);
        $pdoStatement->bindValue(':picture', $this->picture);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        $pdoStatement->execute();

        return ($pdoStatement->rowCount() > 0);

    }

    /**
     * Méthode qui supprime un enregistrement de la table
     *
     * @return bool
     */
    public function delete()
    {
      $pdo = Database::getPDO();

      $sql = "DELETE * FROM `category` WHERE id = :id";

      $pdoStatement = $pdo->prepare($sql);

      $pdoStatement->execute([
        ":id" => $this->id
      ]);

      return $pdoStatement->rowCount() > 0;
    }

    public static function updateHomeOrder($ids)
    {
        $pdo = Database::getPDO();

        $query = $pdo->prepare('
        UPDATE `category` SET `home_order` = 0;
        UPDATE `category` SET `home_order` = 1 WHERE id = ?;
        UPDATE `category` SET `home_order` = 2 WHERE id = ?;
        UPDATE `category` SET `home_order` = 3 WHERE id = ?;
        UPDATE `category` SET `home_order` = 4 WHERE id = ?;
        UPDATE `category` SET `home_order` = 5 WHERE id = ?;
        ');

        $query->execute($ids);
    }
}