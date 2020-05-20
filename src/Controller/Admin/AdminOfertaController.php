<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Oferta;
use App\Form\OfertaType;

class AdminOfertaController extends AbstractController
{
    /**
     * @Route("/admin/oferta", name="admin_oferta")
     */
    public function index()
    {   
        $ofertes = $this->getDoctrine()
        ->getRepository(Oferta::class)
        ->findAllWithEmpresa();

        return $this->render('admin/admin_oferta/index.html.twig', [
            'ofertes' => $ofertes,
        ]);


    }

    /**
     * @Route("/admin/oferta/{id}", name="admin_oferta_modif" , requirements={"id":"\d+"})
     */
    public function admin_oferta_modif(Oferta $oferta, Request $request){

        $manager = $this->getDoctrine()->getManager();
        $form=$this->createForm(OfertaType::class, $oferta);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($oferta);
            $manager->flush();
            return $this->redirectToRoute("admin_oferta");
        }

        return $this->render('admin/admin_oferta/addOferta.html.twig',
        ["oferta" => $oferta, "form" => $form-> createView()]);

    }
    
    /**
     * @Route("/admin/oferta/elim/{id}", name="admin_oferta_elim")
     */
    public function admin_oferta_elim (Oferta $oferta){

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($oferta);
        $manager->flush();

        return $this->redirectToRoute("admin_oferta");

    }

    /**
     * @Route("/admin/oferta/add", name="newOferta")
     */
    public function newOferta(Request $request){
        $oferta=new Oferta();
        $manager = $this->getDoctrine()->getManager();
        
        $form=$this->createForm(OfertaType::class, $oferta);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($oferta);
            $manager->flush();
            return $this->redirectToRoute("admin_oferta");
        }
        return $this->render('admin/admin_oferta/addOferta.html.twig',
        ["oferta" => $oferta, "form" => $form-> createView()]);
    }

}