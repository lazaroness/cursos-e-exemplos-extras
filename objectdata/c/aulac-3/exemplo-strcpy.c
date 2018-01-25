#include <stdio.h>
#include <string.h>

int main(){
	char frase1[] = "o rato roeu";
	char frase2[100];
	char frase3[6];

	/*
		strcpy(variavel_destino, variavel_conteudo)
		Para copiar o conteudo de uma variavel para outra
	*/
	strcpy(frase2, frase1);
	printf("frase2: %s\n", frase2);

	strcpy(frase3, frase1);
	printf("frase3: %s\n", frase3);

    int i, size;
	size = strlen(frase1);
    printf("tamnaho frase3 %i\n", strlen(frase3));
    printf("tamnaho primeira string %i\n", size);
    for(i=0; i < size; i++){
    	frase3[i] = frase1[i];
    }
    frase3[i] = '\0';
    printf("tamanho frase3 %i\n", strlen(frase3));
    printf("frase3 (copia manual): %s\n", frase3);

}