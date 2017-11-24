<?php

namespace Vielle\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();
        $content = $this->get('templating')->render('VielleCatalogBundle:Default:index.html.twig', array('_locale'
                                                                                                         =>$locale));
        return new Response($content);
    }
    
    
}
