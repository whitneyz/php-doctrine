<?php

namespace App\Controller;

use App\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher", name="teacher")
     */
    public function teacher(): Response
    {
        //return new json_encode("", JSON_PRETTY_PRINT);

       // return new JsonResponse("this data");

        return new JsonResponse();

    }
    /**
     * @Route("/createteacher", name="create_teacher")
     */
    public function createTeacher(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        $entityManager = $this->getDoctrine()->getManager();

        $teacher = new Teacher();
        $teacher->setName('Diana ". " Janssen');
        $teacher->setEmail('diana@becode.org');
        $teacher->setAddress('Hortensiastraat, 200');

        // tell Doctrine you want to (eventually) save the createTeacher (no queries yet)
        $entityManager->persist($teacher);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return new JsonResponse('Created new teacher'.$teacher->getEmail());

    }
}
