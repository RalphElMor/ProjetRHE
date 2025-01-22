<?php

require_once 'Vue/Vue.php';
$pieces = [
    [
        'id' => '991',
        'nom' => 'titre Test 1',
        'fournisseur' => 'sous-titre Test 1',
        'utilisateur_id' => '111',
        'prix' => 20,
        'modeleVoiture' => 'texte Test 1'
        
    ],
    [
        'id' => '2222',
        'nom' => 'titre Test 1',
        'fournisseur' => 'sous-titre Test 1',
        'utilisateur_id' => '111',
        'prix' => 40,
        'modeleVoiture' => 'texte Test 1'
      
    ]
];
$vue = new Vue("Pieces");
$vue->generer(['pieces' => $pieces]);

?>