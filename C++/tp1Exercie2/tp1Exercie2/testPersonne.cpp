#include <iostream>
#include "Personne.h"

using namespace std;
void testPersonne()
{
	Personne* personne = new Personne("", "", 'E');
	cin >> *personne;

	cout << *personne;

	delete personne;
}
/*
int main()
{
	testPersonne();
	return 0;
}
*/
