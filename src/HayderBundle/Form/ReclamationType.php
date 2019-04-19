<?php

namespace HayderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeReclamation',ChoiceType::class,['choices'=>[
                'Réclamation sur remboursement effectué'=>'Réclamation sur remboursement effectué',
                'Réclamation adhésion'=>'Réclamation adhésion',
                'Réclamation cotisations'=>'Réclamation cotisations',
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
            'data_class' => 'HayderBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hayderbundle_reclamation';
    }


}
