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
        $errors = [];


        if (!empty($_POST)) {
            // Validate the data
            $title = @(string) ($_POST['title'] ?? '');
            $slug = @(string) ($_POST['slug'] ?? '');
            $content = @(string) ($_POST['content'] ?? '');

            /* This method ensures that the slug is cleaned and formatted properly */
            $slug = $this->pagesRepository->sanitizeSlug($slug);

            if (!empty($title) && !empty($slug) && !empty($content)) {
                $slugExists = $this->pagesRepository->getSlugExists($slug);
                if (!$slugExists) {
                    // Save the page to the database and redirect to the index page
                    $this->pagesRepository->create($title, $slug, $content);
                    header('Location: index.php?route=admin/pages');
                } else {
                    $errors[] = 'Slug already exists!';
                }
            } else {
                // Handle validation error
                $errors[] = 'All fields are required!';
            }
        }
        $this->render('pages/create', [
            'errors' => $errors,
        ]);
    }

    public function delete()
    {
        var_dump("The following entry should be deleted: " . $_POST['id']);
        var_dump($_POST);

        $id = @(int) ($_POST['id'] ?? 0);
        if (!empty($id)) {
            $this->pagesRepository->delete($id);
            header('Location: index.php?route=admin/pages');
        } else {
            // Handle error: ID is not provided
            $this->error404();
        }
    }
}
