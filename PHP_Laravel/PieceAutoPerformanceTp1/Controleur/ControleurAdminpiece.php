<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Piece.php';
require_once 'Modele/commande.php';

class ControleurAdminpiece extends ControleurAdmin {
    private $piece;
    private $commande;

    public function __construct(){
        $this->piece = new Piece();
        $this->commande = new Commande();
    }
    public function index() {
        $piece = $this->piece->getPiece();
        $this->genererVue(['piece' => $piece]);
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les commentaires
     // Affiche les détails sur un article
    
     public function piece($idPiece){
        $idPiece = $this->requete->getParametreId("id");
        $piece = $this->piece->getPiece($idPiece);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $commande = $this->commande->getCommande($idPiece);
        $this->genererVue(['piece' => $piece, 'commande' => $commande, 'erreur' => $erreur]);
    }
    public function commandes() {
        $commande = $this->commande->getCommande();
        $this->genererVue(['commande' => $commande]);
    }

    public function nouvelCommande() {
        $this->genererVue();
    }
 
// Enregistre le nouvel article et retourne à la liste des articles
    public function ajouterCommande($commande) {
        $commande['id'] = $this->requete->getParametreId('id');
        $commande['idUtilisateurCommande'] = $this->requete->getParametre('utilisateur_id');
        $commande['idPieceCommande'] = $this->requete->getParametre('sous_titre');
        $this->commande->setCommande($commande);
        $this->executerAction('index');
    }

    // Rétablir un commentaire
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $commentaire = $this->commentaire->getCommentaire($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->commentaire->restoreCommentaire($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Adminpieces', 'lire/' . $commentaire['piece)id']);
    }

}
