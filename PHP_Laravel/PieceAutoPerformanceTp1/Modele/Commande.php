<?php require_once 'Framework/Modele.php';

/** 
 * Fournit les services d'accès aux commandes 
 * 
 * @author [Votre Nom] 
 */
class Commande extends Modele {
    // Renvoie toutes les commandes pour une pièce spécifique
    public function getCommande($id) {
      $sql = 'select * from commandes'
      . ' where idPieceCommande = ?';
$commandes = $this->executerRequete($sql, [$id]);
if ($commandes->rowCount() == 1) {
  return $commandes->fetch();  // Accès à la première ligne de résultat
} else {
  throw new Exception("Aucun commandes ne correspond à l'identifiant '$id'");
}
    }

    // Ajoute une nouvelle commande
    public function setCommande($commandes) {

        $sql = 'INSERT INTO commandes (id, idUtilisateurCommande, idPieceCommande) VALUES (?, ?, ?)';
        $result = $this->executerRequete($sql, [
          $commandes['id'], 
          $commandes['idUtilisateurCommande'], 
          $commandes['idPieceCommande']
      ]);     return $result;
    }

    // Optionnel: Supprime une commande par ID
    public function deleteCommande($id) {
      $sql = 'UPDATE commandes'
      . ' SET efface = 1'
      . ' WHERE id = ?';
      $result = $this->executerRequete($sql, [$id]);
      return $result;
    }
    public function getNombreCommande()
    {
      $sql = 'select count(*) as nbCommandes from commandes';
      $resultat = $this->executerRequete($sql);
      $ligne = $resultat->fetch(); // Le résultat comporte toujours 1 ligne
      return $ligne['nbCommandes'];
    }
}
?>
