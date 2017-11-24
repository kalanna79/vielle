<?php
	
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 07/10/2017
	 * Time: 15:42
	 */
	namespace Vielle\CatalogBundle\Services;
	
	use Symfony\Component\HttpFoundation\Request;
	use Doctrine\ORM\EntityManager;
	use Symfony\Component\Swift_Mailer;
	
	class Message
	{
		public function __construct(EntityManager $em,
								\Swift_Mailer $mailer)
		{
			$this->em = $em;
			$this->mailer = $mailer;
		}
		
		public function SendMessage($data)
		{
			$message = new \Swift_Message('Un nouveau message de votre site');
			$message	->setFrom('natachanoelwork@gmail.com')
						->setTo('kalanna79@gmail.com')
						->setSubject("Site Boudet Luthiers : " . $data->getSubject())
						->setBody($data->getName() . " (" .$data->getEmail(). ") vous a écrit : <br> " . $data->getBody(), 'text/html');
			$this->mailer->send($message);
		}
	}
