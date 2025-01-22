<?php

require_once 'Vue/Vue.php';

$piece = [
    
        'id' => '991',
        'nom' => 'titre Test 1',
        'fournisseur' => 'sous-titre Test 1',
        'utilisateur_id' => '111',
        'prix' => 20,
        'modeleVoiture' => 'texte Test 1'
        
    
];
$commande = [
        'id' => '999',
        'idUtilisateurCommande' => '1',
        'idPieceCommande' => '991',
    
    ];
    $vue = new Vue("Piece");
    $vue->generer(array('piece' => $piece, 'commande' => $commande));
    $vue = new Vue("Commandes");
    $vue->generer(['commandes' => $commandes]);
?>
