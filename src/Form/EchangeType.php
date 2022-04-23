<?php

namespace App\Form;

use App\Entity\Echange;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EchangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('idmembre1',TextType::class, [
                'attr'=>[
                    'placeholder'=>'faire entrer l id membre1'
                ]
            ])
            ->add('idmembre2',TextType::class, [
                'attr'=>[
                    'placeholder'=>'faire entrer l id membre2'
                ]
            ])
            ->add('idarticle1',TextType::class, [
                'attr'=>[
                    'placeholder'=>'faire entrer l id article 1'
                ]
            ])
            ->add('idarticle2',TextType::class,[
                'attr'=>[
                    'placeholder'=>'faire entrer l id article 2'
                ]
            ])

            ->add("add",SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Echange::class,
        ]);
    }
}
