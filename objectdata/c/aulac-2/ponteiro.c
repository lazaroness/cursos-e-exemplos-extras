#include <stdio.h>
#include <stdlib.h>

int main(){
	int * ponteiro; /* Endereço de memoria */
	int valor = 3;

	/* Atribuindo o endereco da memoria da variavel valor para o ponteiro*/
	ponteiro = &valor;
	char * frase = malloc(10 * sizeof(char));

	/* Exibindo o endereco da memoria*/
	printf("frase %p\n", frase);
	printf("ponteiro %p\n", ponteiro);
	printf("ponteiro %p\n", &valor);

	/* Exibindo o valor
		Para exibir o valor de um ponteiro deve chamar ele com o * na frente
		Exemplo: *ponteiro
	*/
	printf("valor %i\n", valor);
	printf("valor %i\n", *ponteiro);
}