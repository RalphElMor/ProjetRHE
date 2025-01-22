#include <expected>
#include <iostream>

using namespace std;
expected<int, string> division(int numerateur, int denominateur) {
    if (denominateur == 0) {
        return unexpected("Erreur : Division par zero");
    }
    return numerateur / denominateur;
}
int main()
{
    auto resultat = division(10, 2); 

    if (resultat.has_value()) {
        cout << "Resultat : " << *resultat << endl;
    }
    else {
        cout << "Erreur : " << resultat.error() << endl;
    }

    resultat = division(10, 0);
    if (resultat.has_value()) {
        cout << "Resultat : " << *resultat << endl;
    }
    else {
        cout << "Erreur : " << resultat.error() << endl;
    }

    return 0;
}
