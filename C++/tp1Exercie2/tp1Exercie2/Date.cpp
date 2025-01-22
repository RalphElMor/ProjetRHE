#include <iostream>
#include "Date.h"

using namespace std;


int Date::valide(int j, int m, int a) {
	if (m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12)
	{
		if (j > 0 && j < 31)
		{
			return true;
		}
		else {
			return false;
		}
	}
	else if (m == 4 || m == 6 || m == 9 || m == 11)
	{
		if (j > 0 && j < 30)
		{
			return true;
		}
		else {
			return false;
		}
	}
	else if (m == 2) {
		if (a % 4)
		{
			if (j > 0 && j < 29)
			{
				return true;
			}
			else {
				return false;
			}
		}
		else {
			if (j > 0 && j < 28)
			{
				return true;
			}
			else {
				return false;
			}
		}
	}
	else {
		return false;
	}
	cout << "Validation Date" << endl;
}
Date::Date() {
	jour = 11;
	mois = 10;
	annee = 2024;
	cout << "Constructeur sans argument de Date" << endl;
}

int Date::modifier(int j, int m, int a) {
	if (valide(j, m, a))
	{
		int jN, mN, aN;
		cout << "Entrez le jour" << endl;
		cin >> jN;
		cout << "Entrez le mois" << endl;
		cin >> mN;
		cout << "Entrez l'annee" << endl;
		cin >> aN;

		if (valide(jN, mN, aN)) {
			j = jN;
			m = mN;
			a = aN;
			cout << "la date à été changer " << endl;
			return true;
		}
		else {
			cout << "la date rentrer n'Est pas valide " << endl;
			return false;
		}
	}
	else {

		cout << "la date rentrer n'Est pas valide " << endl;
		return false;
	}

}
void Date::afficher() {
	cout << jour << "/" << mois << "/" << annee << endl;

}
