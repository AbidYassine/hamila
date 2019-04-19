<?php

namespace AmineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RemboursementBackType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idClient',null,['disabled'=>true])
            ->add('idSouscription',null,['disabled'=>true])
            ->add('idAssureur',null,['disabled'=>true])
            ->add('montantOperation',null,['disabled'=>true])
            ->add('montantRembourcement',null,['disabled'=>true])
            ->add('pieceJointe',null,['disabled'=>true])
            ->add('extension',null,['disabled'=>true])
            ->add('commentaireRembourcement',null,['disabled'=>true])
            ->add('typeRembourcement', null,['disabled'=>true])
            ->add('dateRembourcement',null,['disabled'=>true])
            ->add('validation', ChoiceType::class, array('label' => 'validation',
                'choices' => array(
                    ' Accepter' => 'Accepter',
                    'Refuser' => 'Refuser'),
                'required' => true,));

    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmineBundle\Entity\Remboursement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'aminebundle_remboursement';
    }


}
