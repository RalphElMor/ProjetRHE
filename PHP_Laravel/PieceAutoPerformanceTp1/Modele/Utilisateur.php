<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un utilisateur du blog
 *
 * @author Baptiste Pesquet
 */
class Utilisateur extends Modele {

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     * 
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($email, $mdp)
    {
        $sql = "select uid from utilisateurs where email = ? and motdepasse = ?";
        $utilisateur = $this->executerRequete($sql, array($email, $mdp));
        return ($utilisateur->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     * 
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($email, $mdp)
    {
        $sql = "select uid, nom, email, motdepasse 
            from utilisateurs where email = ? and motdepasse = ?";
        $utilisateur = $this->executerRequete($sql, array($email, $mdp));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
            
        else
            throw new Exception("Aucun utilisateur ne correspond aux email fournis");

    }

}

