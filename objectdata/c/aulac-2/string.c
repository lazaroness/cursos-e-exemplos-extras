#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(){
	char nome[7] = "o rato";
	printf("frase %s\n", nome);

	char *frase = "roeu";
	printf("frase %s\n", frase);

	char nova[] = {'d', 'o', ' ', 'r', 'e', 'i', '\0'};
	printf("frase %s\n", nova);

	char *outro = malloc(7 * sizeof(char));
	/*
		Copiando manualmente uma string para a 
		alocação de memoria
		int i;
		for(i=0; i<7; i++){
			outro[i] = nome[i];
		}
	*/	
	strcpy(outro, nome);
	printf("frase copiada %s\n", outro);

	char character = 'z';
	printf("character %c\n", character);
}