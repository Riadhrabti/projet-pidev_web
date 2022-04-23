<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Form\ReclamationAddType;
use App\Repository\ReclamationRepository;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class ReclamationController extends AbstractController
{
    /**
     * @Route("/reclamation", name="app_reclamation")
     */
    public function index(): Response
    {
        return $this->render('reclamation/index.html.twig', [
            'controller_name' => 'ReclamationController',
        ]);
    }

    /**
     * @Route("/Reclamations", name="Reclamations")
     */
    public function ListReclamations(ReclamationRepository $repository)
    {
        return $this->render('Reclamation/ListReclamation.html.twig', [
            'Reclamation' => $repository->findAll()
        ]);
    }
    /**
     * @Route("/DeleteReclamation/{id}",name="delete")
     */
    public  function  deleteReclamtion($id){
        $em=$this->getDoctrine()->getManager();
        $Reclamation=$em->getRepository(Reclamation::class)->find($id);
        $em->remove( $Reclamation);
        $em->flush();
        return $this->redirectToRoute('Reclamations');

    }
    /**
     * @param  Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route ("/addReclamation/{id}" , name="addReclamation");
     */
    function addReclamation(Request $request,$id,FlashyNotifier $flashy)
    {

        $Reclamation =new Reclamation();
        $Reclamation->setIdechange($id);

        $form=$this->createForm(ReclamationAddType::class,$Reclamation);
        $form->add('add', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $Reclamation->setEtat(0);
            $em->persist($Reclamation);
            $em->flush();
            $flashy->success('Reclamation envoyée');
            return  $this->redirectToRoute('Reclamations');
        }

        return $this->render('Reclamation/addReclamation.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @param  Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route ("Reclamation/update/{id}",name="update");
     */
    function  updateReclamation(Request $request ,ReclamationRepository $repository ,$id)
    {

        $Reclamation=$repository->find($id);
        $form=$this->createForm(ReclamationAddType::class,$Reclamation);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return  $this->redirectToRoute('Reclamations');
        }

        return $this->render('Reclamation/update.html.twig',[
            'form' => $form->createView()

        ]);

    }
    /**
     * @param  Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route ("Reclamation/accepter/{id}",name="accepter");
     */
    function  accpeterReclamation(Request $request ,ReclamationRepository $repository ,$id,FlashyNotifier $flashy)
    {

        $Reclamation = $repository->find($id);
        $Reclamation->setEtat(1);

        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $flashy->info('Reclamation accepté');
        return $this->redirectToRoute('Reclamations');

    }
    /**
     * @param  Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route ("Reclamation/refuser/{id}",name="refuser");
     */
    function  refuserReclamation(Request $request ,ReclamationRepository $repository ,$id,FlashyNotifier $flashy)
    {

        $Reclamation = $repository->find($id);
        $Reclamation->setEtat(2);

        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $flashy->warning('Reclamation refusé');
        return $this->redirectToRoute('Reclamations');

    }
}
