<?php

namespace application\model;

class Article extends Model
{
    public function all()
    {
        return $this->query("SELECT * FROM articles")->fetchAll();
    }

    public function find($id)
    {
        return $this->query("SELECT *, (SELECT `name` from `categories` WHERE `categories`.`id` = `articles`.`catid`) as `category` FROM `articles` WHERE `id` = ?", [$id])->fetch();
    }

    public function insert($values)
    {
        $this->execute("INSERT INTO `articles` (`title`, `catid`, `content`, `created_at`) VALUES (?,?,?, now())", array_values($values));
    }

    public function update($id, $values)
    {
        $values = array_merge(array_values($values), [$id]);
        $this->execute("UPDATE `articles` SET `title` = ?, `catid` = ?, `content` = ?, `updated_at` = now() where `id` = ?", $values);
    }

    public function delete($id)
    {
        $this->execute("DELETE FROM `articles` WHERE `id` = ?", [$id]);
    }


}