<?php

class PostTable
{
    protected $table = 'posts';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get(int $id): Post
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $sth->bindParam(':id', $id);
        $result = $sth->execute();
        return $sth->fetchAll();
    }

    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    public function create(Post $post): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title, content) VALUES (:title, :content)");
        $title = $post->getTitle();
        $content = $post->getContent();
        $sth->bindParam(':title', $title);
        $sth->bindParam(':content', $content);
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation with the table {$this->table}");
        }
    }

    public function update(Post $post): void
    {
        $sth = $this->db->prepare("UPDATE {$this->table} (title, content) VALUES (:title, :content)");
        $sth->bindParam(':title', $post->getTitle());
        $sth->bindParam(':content', $post->getContent());
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during update with the table {$this->table}");
          }
    }

    public function delete(int $id): void
    {
      $sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
      $sth->bindParam(':id', $id);
      $result = $sth->execute();
    }
}
