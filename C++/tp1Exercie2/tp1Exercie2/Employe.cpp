#include "Employe.h"


Employe::Employe()
    : Personne("Inconnu", "Inconnu", 'M'),
    poste("Inconnu"), salaire(0.0), dateEmbauche(Date()) {
}
Employe::Employe(string nom_, string prenom_, char sexe_, string poste_, double salaire_, Date dateEmbauche_)
    : Personne(nom_, prenom_, sexe_), poste(poste_), salaire(salaire_), dateEmbauche(dateEmbauche_) {}

istream& operator>>(istream& is, Employe& employe) {
 
    is >> static_cast<Personne&>(employe); 
    cout << "Entrez votre poste";
    is >> employe.poste;
    cout << "Entrez votre salaire";
    is >> employe.salaire;

    return is;
}

ostream& operator<<(ostream& os, const Employe& employe) {
    os << static_cast<const Personne&>(employe); 
    os << " votre poste " << employe.poste << " votre salaire" << employe.salaire;
  
    return os;
}