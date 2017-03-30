#include <iostream>
#include <cmath>
using namespace std;

int main(){

int edad = 22;
int sexo = 1;
int rem_men = 150000;
unsigned int saldo_disp = 200000;
unsigned int interes = 1;
unsigned int pension_esp = 0;
unsigned int monto_acum = 0;
double ahorro_men = 0;
unsigned int trabajo;

if(sexo == 0){
	trabajo = (65 - edad)*12;
}else{
	trabajo = (60 - edad)*12;
}

for(int i = 0; i < trabajo; i++){
	monto_acum = monto_acum + ((rem_men + saldo_disp) * (pow(1 + interes, trabajo - i)));
}


unsigned int part1 = (((1 + interes) / 1200)) * (trabajo*12);
unsigned int part2 = interes / 1200;

double multiplication = saldo_disp * part1 * part2;

ahorro_men = (pension_esp - multiplication) / part1;

std::cout << "Ahorro Mensual: " << ahorro_men << '\n';
std::cout << "Ahorro Mensual: " << monto_acum/trabajo << '\n';
}