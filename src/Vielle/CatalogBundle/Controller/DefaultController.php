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
		$subcategories = $this->getDoctrine()->getManager()->getRepository(Subcategory::class)->findBy(array('category' => "1"));
	
		$content = $this->get('templating')->render('VielleCatalogBundle:Default:index.html.twig', array('_locale'
                                                                                                         =>$locale,
																										 'subcategories'=>$subcategories));
        return new Response($content);
    }
    
    
}
