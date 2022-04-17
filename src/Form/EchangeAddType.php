<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Echange;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EchangeAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idmembre1',TextType::class,
                ['attr'=>['placeholder'=>'faire entrer l id membre1']])
            ->add('idmembre2',TextType::class,
                ['attr'=>['placeholder'=>'faire entrer l id membre2']])
            ->add('idarticle1',TextType::class,
                ['attr'=>['placeholder'=>'faire entrer l id article1']])
            ->add('idarticle2',TextType::class,
                ['attr'=>['placeholder'=>'faire entrer l id article2']])
            ->add('etat',TextType::class,['attr'=>['placeholder'=>'faire entrer l etat']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'dataclass' => Echange::class,
        ]);
    }
}
