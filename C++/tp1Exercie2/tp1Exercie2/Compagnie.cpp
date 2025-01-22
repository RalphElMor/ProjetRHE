#include "Compagnie.h"
#include "Personne.h"
#include <iostream>
#include <fstream>

Compagnie::Compagnie(string nom) {
	this->nom = nom;
	this->nbEmployeMax = 10;
	this->nbEmployeActuel = 0;
	tabEmploye = new Employe * [nbEmployeMax];
	cout << "Constructeur avec argument compagnie" << endl;
}
Compagnie::~Compagnie() {
	for (int i = 0; i < nbEmployeActuel; i++) {
		delete tabEmploye[i];
	}
	delete[]tabEmploye;
	cout << "Destructeur compagnie" << endl;
}

ostream& operator << (ostream& os, Compagnie& compagnie) {
	os << "nom de la compagnie" << compagnie.nom << "\n";
	os << "nom des employes:\n";
	for (int i = 0; i < compagnie.nbEmployeMax; i++) {
		os << compagnie.tabEmploye[i];
	}
	return os;
}
bool Compagnie::lireFichier(string nomFichier) {

	ifstream fichier("fichiers/" + nomFichier);



	if (!fichier) {
		cout << "Erreur, fichier introuvable!" << endl;
		return false;
	}
	Employe e;
	while (!fichier.eof()) {
		tabEmploye[nbEmployeActuel] = new Employe(e);
		nbEmployeActuel++;
	}

	fichier.close();
	cout << "Lecture fichier compagnie" << endl;
	return true;
}