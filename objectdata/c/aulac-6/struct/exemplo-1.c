#include <stdio.h>

int main(){

	printf("Tamanho de char: %i\n", sizeof(char));
	
	struct {
		char a;
		char b;
		char c;
	} Exemplo;

	printf("Tamanho de Struct: %i\n", sizeof(Exemplo));
}