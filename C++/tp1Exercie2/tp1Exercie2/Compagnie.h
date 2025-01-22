#pragma once
#ifndef _classeCompagnie_H
#define _classeCompagnie_H
#include <iostream>
#include <string> 
using namespace std;
#include "Personne.h"
#include "Date.h"
#include "Employe.h"


class Compagnie {
private:
	Employe** tabEmploye;
	int nbEmployeActuel;
	int nbEmployeMax;
	string nom;
public:
	Compagnie(string nom);
	bool lireFichier(string nomFichier);
	friend ostream& operator << (ostream& os, Compagnie& compagnie);
	~Compagnie();
};

#endif