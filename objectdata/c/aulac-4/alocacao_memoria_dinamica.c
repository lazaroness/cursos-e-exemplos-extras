#include <stdio.h>
#include <stdlib.h>

int main(){
	int size, index, *vetor, *tmp;
	printf("Digite a quantidade de memoria que deseja alocar\n");
	scanf("%d", &size);
	printf("quantidade memoria %d\n", size);
	vetor = (int *) malloc(size * sizeof(int));
	tmp = vetor;
	for(index = 0; index < size; index++){
		printf("Digite o valor (%d)\n", index + 1);
		scanf("%d", vetor);
		vetor++;
	}
	vetor = tmp;
	for(index = 0; index < size; index++){
		printf("Voce digitou %d\n", *vetor);
		vetor++;
	}
}