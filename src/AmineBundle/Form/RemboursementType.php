<?php

namespace AmineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RemboursementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idClient')->add('idSouscription')->add('idAssureur')->add('montantOperation')->add('montantRembourcement')->add('pieceJointe')->add('extension')->add('commentaireRembourcement')
            ->add('typeRembourcement', ChoiceType::class, array('label' => 'TypeRemboursement',
                'choices' => array(
                    ' Medicament' => 'Medicament',
                    ' visite' => 'visite',
                    'operation' => 'operation'),
                'required' => true,))
            ->add('validation', ChoiceType::class, array('label' => 'validation',
                'choices' => array(
                    ' En Cours de Traitement' => 'En Cours de Traitement',
                    ' Accepter' => 'Accepter',
                    'Refuser' => 'Refuser'),
                'required' => true,))
            ->add('dateRembourcement');
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
