#pragma once
#ifndef _classeDate_H
#define _classeDate_H
#include <iostream>
#include <string> 
using namespace std;

class Date {
private:
    int valide(int, int, int);
protected:
    int jour, mois, annee;
public:
    Date();
    int modifier(int jour, int mois, int annee);
    void afficher();


};
#endif
