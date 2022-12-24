<?php

namespace App\Controller;

use App\Entity\Users;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends AbstractController
{
    public function index($name): Response{
        return $this -> render('index.html.twig', [
            'name' => $name
        ]);
    }

    // //function to add user to database
    public function signUp(ManagerRegistry $doctrine): JsonResponse{
        $entityManager = $doctrine->getManager();
        $user = new Users();
        $password = "123";

        try{
            $user->setName("Abubakari Bilal");
            $user->setEmail("abubakaribilal99@gmail.com");
            $user->setPassword("123");
            $user->setRole("Super Admin");
            $entityManager->persist($user);

            $entityManager->flush();
        }
        catch(\Exception $error){
            return $this->json([
                'message' => "User already exists"
            ]);
        }

        return $this->json([
            'message' => "New user added successfully"
        ]);
    }

    public function login(): JsonResponse{

        return $this->json([
            "message" => "Login successful",
            "user" => [
                "name" => "Abubakari",
                "email" => "abu@kad.com",
                "role" => "Super Admin" 
            ]
        ]);
    }
}
