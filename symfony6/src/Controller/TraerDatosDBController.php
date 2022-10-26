<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Repository\PersonaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/datos/personas", name="datos")
 */
class TraerDatosDBController extends AbstractController
{

    private $entityManager; 
    private $PersonaRepository;

    public function __construct(EntityManagerInterface $entityManager, PersonaRepository $PersonaRepository)
    {
        $this->entityManager = $entityManager;
        $this->PersonaRepository = $PersonaRepository;
    }

    /**
     * @Route("/read", name="index")
     */

    public function index(){

        $todos = $this->PersonaRepository->findAll();

        $array = [];
        foreach ($todos as $todo) {
            $array[] = $todo->toArray();
    }
    return $this->json($array);
    }


    // #[Route('/traer/datos/d/b/{id}', name: 'app_traer_datos_d_b')]
    // public function show(ManagerRegistry $doctrine, int $id): Response
    // {
    //     $personas = $doctrine->getRepository(Persona::class)->find($id);

    //     if (!$personas) {
    //         throw $this->createNotFoundException(
    //             'No se encontro nada, respecto a este id ingresado. '.$id
    //         );
    //     }

    //     return new Response('Recogiendo datos de la DB: '.$personas->getCorreo());
    // }
}