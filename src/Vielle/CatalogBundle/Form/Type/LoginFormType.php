<?php
	
	namespace Vielle\CatalogBundle\Form\Type;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\PasswordType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	use Symfony\Component\Validator\Constraints\NotBlank;
	use Gregwar\CaptchaBundle\Type\CaptchaType;
	
	class LoginFormType extends AbstractType
	{
		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder
				->add('_username')
				->add('_password', PasswordType::class)
				->add('captcha', CaptchaType::class, ['attr' =>['class' => 'captcha-control',]
				])
				->add('envoyer', 	SubmitType::class);
		}
		
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix()
		{
			return ;
		}
		
		
	}
