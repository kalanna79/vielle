<?php

namespace Vielle\CatalogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Gregwar\CaptchaBundle\Type\CaptchaType;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 		TextType::class, array('constraints' => array(
																new NotBlank(array("message" => "Merci d'entrer votre nom")),
															)))
				->add('email', 		EmailType::class, array('constraints' => array(
					new NotBlank(array("message" => "Merci d'entrer votre adresse mail")),
					new Email(array("message" => "Cette adresse ne semble pas valide")),)))
				->add('subject', 	TextType::class, array('constraints' => array(
					new NotBlank(array("message" => "Merci d'ajouter un sujet")),
				)))
				->add('body', 		TextareaType::class, array('constraints' => array(
					new NotBlank(array("message" => "Merci d'ajouter un message")),
				)))
				->add('captcha', CaptchaType::class, ['attr' =>['class' => 'captcha-control',]
				])
        		->add('envoyer', 	SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vielle\CatalogBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vielle_catalogbundle_contact';
    }


}
