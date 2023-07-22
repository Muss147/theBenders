<?php

namespace App\Controller;

use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class FrontController extends AbstractController
{
    public function header(): Response
    {
        return $this->render('front/_header.html.twig');
    }

    #[Route('/', name: 'app_front')]
    public function front(Request $request, EmailService $emailService): Response
    {
        if ($request->isMethod('POST')) {
            // Récupérer les données du formulaire
            $nom = $request->get('nom');
            $prenom = $request->get('prenom');
            $tel = $request->get('tel');
            $email = $request->get('email');
            $personnes = $request->get('personnes');
            $transport = $request->get('transport');
            $participations = $request->get('participation');
            $datesSejour = $request->get('dates_sejour');

            // Envoyer l'email de confirmation
            $emailService->sendConfirmationEmail($formData);
        }

        return $this->render('front/index.html.twig');
    }

    public function footer(): Response
    {
        return $this->render('front/_footer.html.twig');
    }
}
