<?php

namespace App\Controller;

use App\Entity\Echange;
use App\Form\EchangeAddType;
use App\Repository\EchangeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class EchangeController extends AbstractController
{

    /**
     * @Route("/Echanges", name="Echanges")
     */
    public function ListEchanges(EchangeRepository $repository)
    {
        return $this->render('Echange/ListEchange.html.twig', [
            'Echange' => $repository->findAll()
        ]);
    }
    /**
     * @Route("/frontC", name="frontC")
     */
    public function Client(EchangeRepository $repository)
    {
        return $this->render('echange/frontC.html.twig');
    }
    /**
     * @param  Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route ("/add" , name="add");
     */
    function add(Request $request)
    {
        $Echange =new Echange();
        $form=$this->createForm(EchangeAddType::class, $Echange);
        $form->add('add', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($Echange);
            $em->flush();
            return  $this->redirectToRoute('Echanges');
        }

        return $this->render('echange/addEchange.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/DeleteEchange/{idechange}",name="delete")
     */
    public  function  deleteEchange($idechange){
        $em=$this->getDoctrine()->getManager();
        $Echange=$em->getRepository(Echange::class)->find($idechange);
        $em->remove( $Echange);
        $em->flush();
        return $this->redirectToRoute('Echanges');

    }
    /**
     * @param  Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route ("Echange/update/{idechange}",name="update");
     */
    function  update(Request $request ,EchangeRepository  $repository ,$idechange)
    {

        $Echange=$repository->find($idechange);
        $form=$this->createForm(EchangeAddType::class,$Echange);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return  $this->redirectToRoute('Echanges');
        }

        return $this->render('echange/update.html.twig',[
            'form' => $form->createView()

        ]);

    }
}
