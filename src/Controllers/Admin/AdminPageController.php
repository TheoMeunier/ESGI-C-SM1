<?php

namespace App\Controllers\Admin;

use App\Form\Admin\page\AdminPageCreateType;
use App\Form\Admin\page\AdminPageEditType;
use App\Models\Page;
use Core\Controller\AbstractController;
use Core\Views\View;

class AdminPageController extends AbstractController
{
    public function index(): View
    {
        return $this->render('admin/pages/index', 'back', [
            'pages' => Page::findAll(),
        ]);
    }

    public function create(): View
    {
        $page = new Page();
        $form = new AdminPageCreateType();
        $form->handleRequest();
        if ($form->isSubmitted() && $form->isValid()) {
            $page->setName($form->get('name'));
            $page->setSlug(slug($form->get('slug')));
            $page->setMetadescription($form->get('metadescription'));
            $page->setContent($form->get('content'));
            $page->save();
            $this->addFlash('success', 'La page à bien été créé');
            $this->redirect('/admin/pages');
        }
        $form = $form->getConfig();

        return $this->render('admin/pages/create', 'back', [
            'form' => $form,
        ]);
    }

    public function edit(int $id): View
    {
        $page = Page::find($id);
        $form = new AdminPageEditType($page);
        $form->handleRequest();
        if ($form->isSubmitted() && $form->isValid()) {
            $page->setTitle($form->get('title'));
            $page->setName($form->get('name'));
            $page->setMetadescription($form->get('metadescription'));
            $page->setContent($form->get('content'));
            $page->setUpdatedAt(date('Y-m-d H:i:s'));
            $page->save();
            $this->addFlash('success', 'La page a bien été modifiée');
            $this->redirect('/admin/pages');
        }
        $form = $form->getConfig();

        return $this->render('admin/pages/edit', 'back', [
            'form' => $form,
            'page' => $page,
        ]);
    }

    public function hidden($id): void
    {
        $page = Page::find($id);
        $page->setIsHidden($page->getIsHidden() == 1 ? 0 : 1);
        $page->save();
        $this->addFlash('success', 'La page a bien été modifiée');
        $this->redirect('/admin/pages');
    }

    public function delete(int $id): void
    {
        $user = Page::find($id);

        if ($user) {
            $user->setIsDeleted(1);
            $user->save();

            $this->addFlash('success', 'L\'utilisateur a bien été supprimé');
            $this->redirect('/admin/pages');
        }
    }
}