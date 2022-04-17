<?php

namespace App\Controller;


use App\Entity\Echange;
use App\Form\EchangeType;
use App\Repository\EchangeRepository;
use App\Repository\ReclamationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;




class EchangeController extends AbstractController
{

    /**
     * @Route("/Echanges", name="Echanges")
     */
    public function ListEchanges(EchangeRepository  $echangeRepository)
    {
        return $this->render('Echange/ListEchange.html.twig', [
            'Echange' => $echangeRepository->findAll()
        ]);
    }
    /**
     * @Route("/frontC", name="frontC")
     */
    public function Client()
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
        $echange = new Echange();
        $form = $this->createForm(EchangeType::class, $echange);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($echange);
            $em->flush();
            return  $this->redirectToRoute('Echanges');
        }

        return $this->render('echange/addEchange.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/DeleteEchange/{id}",name="deleteEchange")
     */
    public  function  deleteEchange($id){
        $em=$this->getDoctrine()->getManager();
        $Echange=$em->getRepository(Echange::class)->find($id);

        $em->remove($Echange);
        $em->flush();
        return $this->redirectToRoute('Echanges');

    }
    /**
     * @param  Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route ("Echange/update/{id}",name="updateEchange");
     */
    function  update(Request $request,EchangeRepository $repository ,$id)
    {

        $Echange=$repository->find($id);
        $form=$this->createForm(EchangeType::class,$Echange);
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
