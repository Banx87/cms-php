<?php

namespace App\Frontend\Controller;

class PagesController extends AbstractController
{
    public function showPage($pageKey)
    {
        // TODO FETCH THE ACTUAL PAGE

        $this->render('pages/showPage', [
            'pageKey' => $pageKey,
        ]);
    }
}
