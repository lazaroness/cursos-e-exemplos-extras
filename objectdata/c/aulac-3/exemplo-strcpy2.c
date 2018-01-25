#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(){
	char frase[] = "o rato roeu a roupa";

	/* char o tamanho da string */
	char size = strlen(frase);

	/* criar a variavel por array ou alocacao dinamica com o tamnho encontrado */
//	char frase2[size];
	char * frase2 = malloc(size * sizeof(char));

	/* efetuar copia */
	strcpy(frase2, frase);

	/* imprimir no console atraves da copia */
	printf("frase2: %s\n", frase2);

}