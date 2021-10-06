<?php

namespace App\Controllers;

use App\Validation\Validator;

class ContactController extends Controller
{
    public function contactForm()
    {
        return $this->view('contact.contact');
    }

    public function postContactForm()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'firstname' => ['required'],
            'email' => ['required', 'validEmail'],
            'message' => ['required', 'min:3']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /contact');
        }

        //echo "<p>L'utilisateur ayant pour prénom : " . $_POST['firstname'] . " et pour nom " . $_POST['name'] . "<br> -Comme ". $_POST['username'] ."<br> -Comme Email : " . $_POST['email'] . "<br> -Son Message est : " . $_POST['message'] . "</p>" ; die();
        //@ permet de masquer le message d'erreur
        if (@mail("gnut@gnut.eu", 'Demande de contact sur le blog de Gnut', "<p>- L'utilisateur ayant pour prénom : " . $_POST['firstname'] . " et pour nom : " . $_POST['name'] . "<br> - Comme nom d'utilisateur : " . $_POST['username'] . "<br> - Comme Email : " . $_POST['email'] . "<br> - Son Message est : " . $_POST['message'] . "</p>", 'Content-Type: text/html; charset="utf-8"')) {
            $_SESSION['errors'][] = ['message' => ['Votre message a bien été envoyé']];
            header('Location: /contact');
        } else {
            //$this->addFlash('danger', "Il y a eu un probléme lors de l'envoie du mail à l'administrateur");
            $_SESSION['errors'][] = ['message' => ['Il y a eu un probléme lors de l\'envoie du mail à l\'administrateur']];
            header('Location: /contact');
        }
    }
}
