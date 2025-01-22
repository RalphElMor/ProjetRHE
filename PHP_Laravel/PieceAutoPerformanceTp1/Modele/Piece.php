<?php require_once 'Framework/Modele.php';

/** 
 * Fournit les services d'accès aux pièces 
 * 
 * @author [Votre Nom] 
 */
class Piece extends Modele {
    // Renvoie la liste de toutes les pièces, triées par identifiant décroissant
    public function getPieces() {
        $sql = 'SELECT id AS id, nomPiece AS nom, fournisseur AS fournisseur, prix AS prix, modeleVoiture AS modeleVoiture FROM piecesauto ORDER BY id DESC';
        $pieces = $this->executerRequete($sql);
        return $pieces;
    }
    
    // Renvoie les informations sur une pièce
    public function getPiece($idPiece) {
        $sql = 'SELECT * FROM piecesauto WHERE ID = ?';
        $piece = $this->executerRequete($sql, [$idPiece]);
        
        if ($piece->rowCount() === 1) {
            return $piece->fetch(); // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune pièce ne correspond à l'identifiant '$idPiece'");
        }
    }

    // Ajoute une nouvelle pièce
    public function setPiece($piece) {
        $sql = 'INSERT INTO piecesauto (id, nomPiece, fournisseur, prix, modeleVoiture) VALUES (?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$piece['id'], $piece['nomPiece'], $piece['fournisseur'], $piece['prix'], $piece['modeleVoiture']]);
        return $result; // Renvoie le résultat de l'insertion
    }

    // Supprime une pièce
    public function deletePiece($id) {
        $sql = 'DELETE FROM piecesauto WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result; // Renvoie le résultat de la suppression
    }
    public function getNombrePieces() {
        $sql = 'select count(*) as nbPieces from piecesauto';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch(); // Le résultat comporte toujours 1 ligne
        return $ligne['nbPieces'];
        }
        public function updatePiece($piece) {
            $sql = 'UPDATE piecesauto'
                    . ' SET nomPiece = ?, fournisseur = ?, prix = ?, modeleVoiture = ?'
                    . ' WHERE id = ?';
            $result = $this->executerRequete($sql, [$piece['nomPiece'], 
            $piece['fournisseur'], $piece['prix'], $piece['modeleVoiture'] , $piece['id']]);
            return $result;
        }
}
?>
