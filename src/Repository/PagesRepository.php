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
        return $this->get();
    }

    public function get(): array
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

    public function getSlugExists(string $slug): bool
    {
        /**
         * Checks if a page with the given slug exists in the database.
         *
         * @param string $slug The slug to search for in the pages table.
         * @return bool True if a page with the given slug exists, false otherwise.
         */
        $stmt = $this->pdo->prepare('SELECT COUNT(*) as count FROM pages WHERE slug = :slug');
        $stmt->execute(['slug' => $slug]);
        return (bool) $stmt->fetchColumn();
    }

    public function create(string $title, string $slug, string $content)
    {

        $stmt = $this->pdo->prepare('INSERT INTO pages (title, slug, content) VALUES (:title, :slug, :content)');
        return $stmt->execute([
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM pages WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function sanitizeSlug($slug)
    {
        // Convert to lowercase
        $slug = strtolower($slug);

        // Replace spaces and slashes with hyphens
        $slug = str_replace(['/', ' ', '.'], ['-'], $slug);

        // Remove all non-alphanumeric characters except hyphens
        $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);

        return $slug;
    }
}
