#include "Date.h"
#include "Personne.h"
using namespace std;
Personne::Personne(string nom_, string prenom_, char sexe_) {
	this->nom = nom_;
	this->prenom = prenom_;
	this->sexe = sexe_;
	this->naissance = Date();
	cout << "Constructeur avec Arguement personne" << endl;
}

ostream& operator << (ostream& os, const Personne& personne) {
	os << "Nom : " << personne.nom << " Prenom : " << personne.prenom << " Sexe : " << personne.sexe;
	return os;
}
istream& operator >> (istream& is, Personne& personne) {
	cout << "Entrez votre nom";
	is >> personne.nom;
	cout << "Entrez votre prenom";
	is >> personne.prenom;
	cout << "Entrez votre sexe";
	is >> personne.sexe;
	return is;
}