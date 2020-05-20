<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Empresa;
use App\Entity\Oferta;

class EmpresaController extends AbstractController
{
    /**
     * @Route("/empreses", name="empreses")
     */
    public function index()
    {
        $empreses = $this->getDoctrine()
        ->getRepository(Empresa::class)
        ->findAll();
        return $this->render('empresa/index.html.twig', [
            'empreses' => $empreses,
        ]);
    }

    /**
     * @Route("/empreses/{id}", name="empresa")
     */
    public function detallEmpresa(int $id)
    {
        $empresa = $this->getDoctrine()
        ->getRepository(Empresa::class)
        ->find($id);

        $ofertes_empresa=$this->getDoctrine()
        ->getRepository(Oferta::class)
        ->find($id);

        return $this->render('empresa/detall.html.twig', [
            'empresa' => $empresa,
            'ofertes' => $ofertes_empresa
        ]);
    }
}