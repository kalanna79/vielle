<?php

namespace Vielle\CatalogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array(
			'label' => 'nom de la photo'))
				->add('alt', TextType::class, array(
					'label' => 'description de l\'image'))
			->add('file', FileType::class, array(
				'label' => false,
				'data_class' => null,
				'attr' => array(
					'accept' => 'image/*',
					'capture' =>'',
				),
				
			));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vielle\CatalogBundle\Entity\Photo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vielle_catalogbundle_photo';
    }


}
