#include <stdio.h>
#include <string.h>

int main(){
	char frase1[] = "o rato roeu";
	int size;

	/*
		strlen(string);
		Retorna a quantidade de caracteres que a string possui
		A quantidade já vem sem '\0'
	*/
	size = strlen(frase1);
	printf("Tamanho da String: %i\n", size);
}