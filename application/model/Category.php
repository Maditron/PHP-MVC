<?php

namespace application\model;

class Category extends Model
{
    public function all()
    {
        return $this->query("SELECT * FROM `categories`; ")->fetchAll();
    }

    public function articles($catid)
    {
        return $this->query("SELECT * FROM `articles` WHERE `catid` = ? ", [$catid])->fetchAll();
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM `categories` WHERE `id` = ?", [$id])->fetch();
    }

    public function insert($values)
    {
        $this->execute("INSERT INTO `categories` (`name`, `description`, `created_at`) VALUES (?,?, now())", array_values($values));
    }

    public function update($id, $values)
    {
        $values = array_merge(array_values($values), [$id]);
        $this->execute("UPDATE `categories` SET `name` = ?, `description` = ?, `updated_at` = now() where `id` = ?", $values);
    }

    public function delete($id)
    {
        $this->execute("DELETE FROM `categories` WHERE `id` = ?", [$id]);
    }
}