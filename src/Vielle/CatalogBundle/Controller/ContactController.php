<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 06/10/2017
	 * Time: 11:25
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Vielle\CatalogBundle\Form\ContactType;
	use Vielle\CatalogBundle\Entity\Subcategory;
	
	class ContactController extends Controller
	{
		public function ContactAction(Request $request)
		{
			$form = $this->createForm(ContactType::class);
			$seo = $this->container->get('vielle_catalog.seoservice')->contactSeo();
			
			if ($request->isMethod('POST'))
			{
				$form->handleRequest($request);
				if ($form->isSubmitted() && $form->isValid()) {
					$contact = $form->getData();
					$this->get('vielle_catalog.message')->sendMessage($contact);
					$this->addFlash('success', 'Votre message a bien été envoyé');
					return $this->redirectToRoute('index');
				} else {
						$this->addFlash('error', 'Une erreur s\'est produite, merci de recommencer');
				}
			}
			
			$locale = $request->getLocale();
			
			return $this->render('VielleCatalogBundle:Contact:contact.html.twig', array('form' => $form->createView()
																						,'_locale'
																									   =>$locale,
																						'seopage' => $seo));
		}
	}
