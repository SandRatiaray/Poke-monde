<?php

namespace App\Controller;

use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

class AuthenticateController
{
    /**
     * Page de connexion
     * @param Request $request
     * @param $template
     */
    public function signIn (Request $request, $template) {
        // Si le formulaire est soumis
        if ($request->isMethod('POST')) {
            // Supprimer la variable inscription de la session
            if(isset($_SESSION['inscription'])){
                unset($_SESSION['inscription']);
            }
            // Supprimer la variable none_user de la session
            if(isset($_SESSION['none_user'])){
                unset($_SESSION['none_user']);
            }
            // Récupérer l'utilisateur s'il existe en base de données
            $user = new User();
            $manager = new UserManager();
            $datas = $request->request->all();
            $user->setEmail($datas['email']);
            $user->setPassword($datas['password']);
            $checkUser = $manager->findOne($user);
            if($checkUser) {
                // Création de la variable user dans la session
                $_SESSION['user'] = [
                    'id' => $checkUser->id,
                    'lastname' => $checkUser->last_name,
                    'firstname' => $checkUser->first_name,
                    'email' => $checkUser->email,
                    'password' => $checkUser->password,
                    'tel' => $checkUser->tel,
                    'address' => $checkUser->address,
                    'zipcode' => $checkUser->zip_code,
                    'roles' => $checkUser->roles
                ];
            } else{
                $_SESSION['none_user'] = "Les identifiants sont incorrects.";
            }

            // Redirection vers la page de profil
            header("Location:/profil");
        }

        echo $template->render('authenticate/sign_in.html.twig', []);
    }

    /**
     * Page d'inscription
     * @param Request $request
     * @param $template
     */
    public function signUp (Request $request, $template) {
        // Si le formulaire est soumis
        if ($request->isMethod('POST')) {
            $user = new User();
            $manager = new UserManager();
            $user->hydrate($request->request->all());
            $manager->add($user);

            // Message de création
            $_SESSION['inscription'] = "Votre compte à été créé avec succès !";

            // Redirection vers la page de connexion
            header("Location:/connexion");
        }

        // Rendu de la page d'inscription
        echo $template->render('authenticate/sign_up.html.twig', [
        ]);
    }

    /**
     * Se déconnecter
     *
     * @param Request $request
     * @param $template
     */
    public function signOut(Request $request, $template) {
        // Supprimer la variable user dans la session
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        // Redirection vers la page de connexion
        header("Location:/connexion");
    }
}