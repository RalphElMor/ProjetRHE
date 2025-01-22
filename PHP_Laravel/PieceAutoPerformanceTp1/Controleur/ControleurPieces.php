<?php


require_once 'Framework/Controleur.php';
require_once 'Modele/Piece.php';
require_once 'Modele/Commande.php'; // Ensure you include the Commande model

class ControleurPieces extends Controleur {
    private $piece;
    private $commande; // Declare the commande property

    public function __construct() {
        $this->piece = new Piece();
        $this->commande = new Commande(); // Initialize the commande property
    }

    public function index() {
        $pieces = $this->piece->getPieces();
        $this->genererVue(['pieces' => $pieces]);
    }

    // Affiche les détails sur un article
    public function lire() {
        $idPiece = $this->requete->getParametreId("id");
        $piece = $this->piece->getPiece($idPiece);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getSession()->getAttribut("erreur") : '';
        $commande = $this->commande->getCommande($idPiece); // No longer null
        $this->genererVue(['piece' => $piece, 'commande' => $commande, 'erreur' => $erreur]);
    }

}

?>