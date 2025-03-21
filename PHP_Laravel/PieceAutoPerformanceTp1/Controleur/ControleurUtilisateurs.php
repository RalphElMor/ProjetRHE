<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

/**
 * Contrôleur gérant la connexion au site
 *
 * @author Baptiste Pesquet
 */
class ControleurUtilisateurs extends Controleur {

    private $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    public function index() {
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $this->genererVue(['erreur' => $erreur]);
    }

    public function connecter() {
        if ($this->requete->existeParametre("email") && $this->requete->existeParametre("mdp")) {
            $email = $this->requete->getParametre("email");
            $mdp = $this->requete->getParametre("mdp");
            if ($this->utilisateur->connecter($email, $mdp)) {
                $utilisateur = $this->utilisateur->getUtilisateur($email, $mdp);
                $this->requete->getSession()->setAttribut("utilisateur", $utilisateur);
                // Éliminer un code d'erreur éventuel
                if ($this->requete->getSession()->existeAttribut('erreur')) {
                    $this->requete->getsession()->setAttribut('erreur', '');
                }
                $this->rediriger("AdminPieces");
            } else {
                $this->requete->getSession()->setAttribut('erreur', 'mdp');
                $this->rediriger('Utilisateurs');
            }
        } else
            throw new Exception("Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter() {
        $this->requete->getSession()->detruire();
        $this->rediriger("");
    }

}
