<?php

namespace AB\databaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
            ->add('addresses', 'entity', array(
            		'class' => 'AB\databaseBundle\Entity\Address',
            		//'property' => 'id',
            		//'multiple' => true,
            		'query_builder' => function(EntityRepository $er) {
				        return $er->createQueryBuilder('a')
				        			->select('a');
				        			/* ->from('Address', 'a')
				        			->groupBy('a.id');
            						->orderBy('a.streetName', 'ASC'); */
            		},))
            ->add('groups', 'entity', array(
            		'class' => 'AB\databaseBundle\Entity\UGroup',
            		'property' => 'groupName',
            		'multiple' => true,))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AB\databaseBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ab_databasebundle_user';
    }
}
