<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Piece.php';
require_once 'Modele/Commande.php';

class ControleurAdminpieces extends ControleurAdmin {

    private $pieces;
    private $commande;
    public function __construct() {
        $this->piece = new Piece();
        $this->commande = new Commande(); // Initialize the commande property
    }

    public function index() {
        $pieces = $this->piece->getPieces();
        $this->genererVue(['pieces' => $pieces]);
    }

    // Affiche les détails sur un article
    public function piece() {
        $idPiece = $this->requete->getParametreId("id");
        $piece = $this->piece->getPiece($idPiece);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getSession()->getAttribut("erreur") : '';
        $commande = $this->commande->getCommande($idPiece); // No longer null
        $this->genererVue(['piece' => $piece, 'commande' => $commande, 'erreur' => $erreur]);
        $this->executerAction('index');
    }

    public function nouvelPiece() {
        $this->genererVue();
    }

    // Enregistre le nouvel article et retourne à la liste des articles
    public function ajouter() {
        $piece['id'] = $this->requete->getParametreId('id');
        $piece['nomPiece'] = $this->requete->getParametre('nomPiece');
        $piece['fournisseur'] = $this->requete->getParametre('fournisseur');
        $piece['prix'] = $this->requete->getParametre('prix');
        $piece['modeleVoiture'] = $this->requete->getParametre('modeleVoiture');
        $this->piece->setPiece($piece);
        $this->executerAction('index');
    }

    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire à l'aide du modèle
        $piece = $this->piece->getPiece($id);
        $this->genererVue(['piece' => $piece]);
    }

    // Supprimer un commentaire
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $piece = $this->piece->getPiece($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->piece->deletePiece($id);
        // Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Pieces', 'lire/' . $piece['id']); // Corrected to use piece id
    }
// Modifier un article existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $piece = $this->piece->getPiece($id);
        $this->genererVue(['piece' => $piece]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJour() {
        $piece['id'] = $this->requete->getParametreId('id');
        $piece['nomPiece'] = $this->requete->getParametre('nomPiece');
        $piece['fournisseur'] = $this->requete->getParametre('fournisseur');
        $piece['prix'] = $this->requete->getParametre('prix');
        $piece['modeleVoiture'] = $this->requete->getParametre('modeleVoiture');
        $this->article->updatePieces($piece);
        $this->executerAction('index');
    }    
    public function lire() {
        $idPiece = $this->requete->getParametreId("id");
        $piece = $this->piece->getPiece($idPiece);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $commande = $this->commande->getCommande($idPiece);
        $this->genererVue(['piece' => $piece, 'commande' => $commande, 'erreur' => $erreur]);
    }


}
