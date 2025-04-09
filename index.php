<?php

require __DIR__ . '/inc/all.inc.php';

$route = @(string) $_GET['route'] ?? 'pages';

$pagesRepository = new \App\Repository\PagesRepository($pdo);

if ($route === 'pages' || empty($route)) {
    $page = @(string) $_GET['page'] ?? 'index';

    $pagesController = new \App\Frontend\Controller\PagesController($pagesRepository);
    $pagesController->showPage($page);
} else {
    $notFoundController = new \App\Frontend\Controller\NotFoundController($pagesRepository);
    $notFoundController->error404();
}
