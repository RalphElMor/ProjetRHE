#include <iostream>
#include "Employe.h"

using namespace std;

void testEmploye()
{
	Employe employe1;
	Employe* employe2 = new Employe("test", "test", 'M', "Stagiaire", 200.0, Date());
	cin >> employe1;
	cout << employe1;
	cout << employe2;

}

int main()
{
	testEmploye();
	return 0;
}

