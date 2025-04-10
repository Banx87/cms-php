<?php

namespace App\Admin\Controller;

use App\Repository\PagesRepository;

class PagesAdminController extends AbstractAdminController
{

    public function __construct(private PagesRepository $pagesRepository) {}

    public function index()
    {

        $pages = $this->pagesRepository->get();

        // $this->error404();
        $this->render('pages/index', ['pages' => $pages]);
    }

    public function create()
    {
        if (!empty($_POST)) {
            // Validate the data
            $title = @(string) ($_POST['title'] ?? '');
            $slug = @(string) ($_POST['slug'] ?? '');
            $content = @(string) ($_POST['content'] ?? '');

            if (!empty($title) && !empty($slug) && !empty($content)) {
                $slugExists = $this->pagesRepository->getSlugExists($slug);
                if (!$slugExists) {
                    // Save the page to the database
                    $this->pagesRepository->create($title, $slug, $content);
                }
            } else {
                // Handle validation error
                echo "All fields are required.";
            }

            header('Location: /admin/pages');
            exit;
        }
        $this->render('pages/create', []);
    }
}