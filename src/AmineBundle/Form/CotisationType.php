<?php

namespace AmineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class CotisationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idAssureur',null,['disabled'=>true] )
            ->add('idSouscription',null,['disabled'=>true])
            ->add('prixHt',null,['disabled'=>true])
            ->add('prixTtc',null,['disabled'=>true])
            ->add('tva',null,['disabled'=>true])
            ->add('dateDebutCotisation',null,['disabled'=>true])
            ->add('dateFinCotisation',null,['disabled'=>true])
            ->add('paiement', ChoiceType::class, array('label' => 'paiement',
                'choices' => array(

                    ' Non Payer' => 'Non Payer',
                    'Payer' => 'Payer'),
                'required' => true,))
            ->add('idClient',null,['disabled'=>true]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmineBundle\Entity\Cotisation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'aminebundle_cotisation';
    }


}
