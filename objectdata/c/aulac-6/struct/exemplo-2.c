#include <stdio.h>

int main(){

	printf("Tamanho de double: %i\n", sizeof(double));
	
	struct {
		char a;
		char b;
		char c;
		double d;
	} Exemplo;

	printf("Tamanho de Struct: %i\n", sizeof(Exemplo));
}