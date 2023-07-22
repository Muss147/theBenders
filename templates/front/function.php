<?php
session_start();

// Vérifier si la requête est POST et si le jeton CSRF est valide
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["csrf_token"]) && $_POST["csrf_token"] === $_SESSION["csrf_token"]) {
    // Nettoyer et valider les données du formulaire
    $nom = clean_input($_POST["nom"]);
    $prenom = clean_input($_POST["prenom"]);
    $tel = clean_input($_POST["tel"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $personnes = clean_input($_POST["personnes"]);
    $transport = clean_input($_POST["transport"]);
    $participation = isset($_POST["participation"]) ? implode(", ", $_POST["participation"]) : '';
    $dates_sejour = clean_input($_POST["date-range"]);

    // Vérifier que l'adresse email est valide
    if (!$email) {
        echo "Veuillez saisir une adresse email valide.";
        exit;
    }

    // Adresse email de destination
    $to = "thebendeys@gmail.com";

    // Sujet de l'email
    $subject = "Nouvelle soumission de formulaire";

    // Corps du message
    $message = "Nouvelle soumission de formulaire :\n\n";
    $message .= "Nom : $nom\n";
    $message .= "Prénom : $prenom\n";
    $message .= "Téléphone : $tel\n";
    $message .= "Email : $email\n";
    $message .= "Nombre de personnes : $personnes\n";
    $message .= "Transport : $transport\n";
    $message .= "Participation : $participation\n";
    $message .= "Dates du séjour : $dates_sejour\n";

    // En-têtes de l'email
    $headers = "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Envoyer l'email
    if (mail($to, $subject, $message, $headers)) {
        // Rediriger l'utilisateur vers la page précédente
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    } else {
        echo "Une erreur s'est produite lors de l'envoi du formulaire. Veuillez réessayer.";
    }
} else {
    // Requête non valide ou jeton CSRF invalide, afficher un message d'erreur ou effectuer une autre action appropriée.
    echo "Requête non valide. Veuillez remplir le formulaire correctement.";
}

// Fonction pour nettoyer les données saisies dans le formulaire
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
