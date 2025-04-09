<?php

namespace App\Repository;

use PDO;
use App\Model\PageModel;


class PagesRepository
{
    // private \PDO $pdo;

    public function __construct(private PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getNavigation(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM pages ORDER BY id ASC');
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);

        return $entries ?: [];
    }

    public function getPageBySlug(string $slug): ?PageModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pages WHERE slug = :slug');
        $stmt->execute(['slug' => $slug]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);

        $entry = $stmt->fetch();

        return $entry ?: null;
    }
}
