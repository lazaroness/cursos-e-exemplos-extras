#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(){
	char frase1[] = "o rato roeu";
	char frase2[] = "a roupa do rei de roma";

	/* obter o tamnho das duas strings +1 */
	int size = (strlen(frase1) + strlen(frase2) + 1);
	printf("%i\n", size);

	//  criar uma string com o tamanho por array ou alocação
//	char frase3[size];
	char * frase3 = malloc(size * sizeof(char));

	// concatenar a frase1, o espaço e por ultimo a frase2
//	frase3 = strcat(frase1, " ");
//	frase3 = strcat(frase3, frase2);
	strcpy(frase3, frase1);
	strcat(frase3, " ");
	strcat(frase3, frase2);

	// imprimir no console
	printf("Frase final: %s\n", frase3);
}