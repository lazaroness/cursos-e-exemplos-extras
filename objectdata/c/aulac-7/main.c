#include <stdio.h>

//extern int totalChamadas;
//int somar(int, int);
int outro(int, int);
int obterTotalChamadas();

int main(){
	int total = outro(2, 3);
	printf("Somar: %i\n", total);
	total = outro(9, 9);
	printf("Somar: %i\n", total);
	printf("Total chamadas: %i\n", obterTotalChamadas());
}