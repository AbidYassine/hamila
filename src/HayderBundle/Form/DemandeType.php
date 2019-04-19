<?php

namespace HayderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeDemande',ChoiceType::class,['choices'=>[
                'Demande d informations sur les procédures'=>'Demande d informations sur les procédures',
                'Demande d informations sur les garanties'=>'Demande d informations sur les garanties',
                'Demande d informations sur adhésion'=>'Demande d informations sur adhésion',
            ]])
            ->add('motif',ChoiceType::class,['choices'=>[
                'Demande urgente'=>'Demande urgente',
                'Demande interne'=>'Demande interne',
                'Demande externe'=>'Demande externe',
            ]])
            ->add('typeSoin',ChoiceType::class,['choices'=>[
                'Optique'=>'Optique',
                'Dentaire'=>'Dentaire',
                'Hospitalisation'=>'Hospitalisation',
                'Consultation'=>'Consultation',
                'Maternité'=>'Maternité',
                'Autre'=>'Autre',
            ]])
            ->add('texteLibre',TextareaType::class)
            ->add('file',FileType::class)
//            ->add('reponse')
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HayderBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hayderbundle_demande';
    }


}
