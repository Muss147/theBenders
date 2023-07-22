<?php

// src/Service/EmailService.php
namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendConfirmationEmail(array $formData)
    {
        // Envoyer l'email
        $email = (new Email())
            ->from('sender@example.com')
            ->to('recipient@example.com')
            ->subject('Nouveau formulaire soumis')
            ->html($this->renderEmailTemplate($formData));

        $this->mailer->send($email);
    }

    private function renderEmailTemplate(array $data): string
    {
        // Utilisez Twig pour rendre le template d'email
        // Créez un fichier email_template.html.twig dans templates/emails/
        // et utilisez les données fournies pour personnaliser le contenu
        return $this->twig->render('emails/email_template.html.twig', $data);
    }
}
