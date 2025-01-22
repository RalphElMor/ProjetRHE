<?php 
require_once 'Framework/Controleur.php';
require_once 'Modele/Piece.php';
require_once 'Modele/Commande.php';



class ControleurPiece  extends Controleur{
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

}

?>