<?php

namespace Vielle\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vielle\CatalogBundle\Entity\Subcategory;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();
		$vielles = $this->getDoctrine()->getManager()->getRepository(Subcategory::class)->findBy(array('category' => "1"));
		$decors = $this->getDoctrine()->getManager()->getRepository(Subcategory::class)->findBy(array('category' => "2"));
		$content = $this->get('templating')->render('VielleCatalogBundle:Default:index.html.twig', array('_locale'
                                                                                                         =>$locale,
																										 'vielles'=>$vielles,
																										 'decors'=>$decors));
        return new Response($content);
    }
    
    
}
