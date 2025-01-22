<template>
  <div class="container">
    <div class="row">
      <h2>A propos</h2>
      <h2>Ralph-Habib El-Mor</h2>
      <h3>420-5H6 MO Applications Web transactionnelles.</h3><br>
      <h3>Automne 2024, Collège Montmorency.</h3>
      
      <h3>Étapes</h3>
      <h4>1. Connecté ou non : vous pouvez ajouter et supprimer une commande pour la pièce en cliquant sur "en savoir plus"</h4>
      <h4>2. Non connecté : vous pouvez créer un compte et vous connecter en cliquant sur le bouton inscription ou connexion</h4>
      <h4>3. Connecté ou non : vous pouvez rechercher des pièces grâce à l'autocomplétion</h4>
      <h4>4. Connecté ou non : vous pouvez accéder à la page À propos et changer de langue</h4>
      <h4>5. Connecté en tant qu'Admin : vous pouvez ajouter, supprimer et modifier une pièce en cliquant sur "ajouter une pièce"</h4>
      
      <h3>Résultats</h3>
      <h4>1. Affichage de la pièce et des commandes avec l'option d'en ajouter une autre</h4>
      <h4>2. Affiche la page de connexion ou d'inscription ; une fois connecté, votre nom s'affiche en haut à droite</h4>
      <h4>3. Dans la barre de recherche à gauche, vous pouvez rechercher une pièce</h4>
      <h4>4. Dans le menu déroulant des langues, vous pouvez choisir entre l'anglais, le français et l'espagnol</h4>
      <h4>5. En tant qu'admin, vous pouvez ajouter des pièces en cliquant sur "ajouter une pièce". Vous pouvez modifier ou supprimer une pièce en cliquant sur "en savoir plus" puis sur le bouton modifier ou supprimer</h4>
      <h3>Table Choisi</h3>
      <h4>J'ai choisi la table piece pour ce tp et rien n'a été modifier</h4>
      <h3>Utilisateur connecter</h3>
      <h4>peu créer un compte et ce connecter, peut naviguer les pieces et les rechercher et verifier la section about</h4>
      <h3>Utilisateur déconnecter</h3>
      <h4>peut ajouter,supprimer et modifier les pieces,peut naviguer les pieces et les rechercher</h4>
      <img :src="imagePath" alt="Database Diagram" width="50px" height="600px">
    </div>
  </div>
</template>

<script>
export default {
  name: 'AboutPage',
  data() {
    return {
      imagePath: require('../../../public/images/databaseLaravelle.png'), 
    };
  },
};
</script>


