#include <iostream>
#include "Date.h"

using namespace std;
void testDate()
{
	Date date;
	date.afficher();

	if (!date.modifier(31,6,2024)) {
		date.afficher();
		cout << "test Reussi" << endl;
	}
	else {
		cout << "test non Reussi" << endl;
	}
	if (date.modifier(30,6,2024)) {
		date.afficher();
		cout << "test Reussi" << endl;
	}
	else {
		cout << "test non Reussi" << endl;
	}


}
/*int main()
{
	testDate();
	return 0;
}*/



