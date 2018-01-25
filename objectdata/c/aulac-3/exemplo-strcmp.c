#include <stdio.h>
#include <string.h>

int main(){
	char frase[] = "o rato";
	int i;

	/*
		strcmp(string1, string2);
		Comparar as duas strings
		Se forem igual retornar 0
	*/
	i = strcmp(frase, "o gato");
	printf("Primeiro teste %i\n", i);

	i = strcmp(frase, "o rato");
	printf("Segundo teste %i\n", i);

	i = strcmp(frase, "o tato");
	printf("Terceiro teste %i\n", i);

	i = strcmp(frase, "o gatu");
	printf("Quarto teste %i\n", i);
}