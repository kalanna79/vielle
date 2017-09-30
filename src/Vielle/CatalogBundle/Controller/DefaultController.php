<?php

namespace Vielle\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VielleCatalogBundle:Default:index.html.twig');
    }
}
