<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 25/11/2017
	 * Time: 17:42
	 */
	
	namespace Vielle\CatalogBundle\Form;
	
	use Vielle\CatalogBundle\Entity\Image;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\FileType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	use Symfony\Component\Validator\Constraints as Assert;
	
	class PhotoType extends AbstractType
	{
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder
				->add('file', FileType::class, array(
					'label' => false,
					'attr' => array(
						'accept' => 'image/*',
						'capture' =>'',
					),
					'constraints' =>new Assert\Image(),
				));
		}
		
		public function configureOptions(OptionsResolver $resolver)
		{
			$resolver->setDefaults([
				'data_class' => Image::class
								   ]);
		}
		
		public function getBlockPrefix()
		{
			return 'vielle_catalogbundle_image';
		}
	}
