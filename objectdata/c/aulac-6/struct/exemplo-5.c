#include <stdio.h>

int main(){

	printf("Tamanho de double: %i\n", sizeof(double));
	
	struct {
		char a;
		char b;
		char c;
		char d;
		char e;
		char f;
		char g;
		char h;
		char i;
		float k;
		double j;
	} Exemplo;

	printf("Tamanho de Struct: %i\n", sizeof(Exemplo));
}