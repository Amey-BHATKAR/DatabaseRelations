<?php

namespace AB\databaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class FeatureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('featureName')
            ->add('product', 'entity', array(
            		'class' => 'AB\databaseBundle\Entity\Product',
            		'property' => 'name',))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AB\databaseBundle\Entity\Feature'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ab_databasebundle_feature';
    }
}
