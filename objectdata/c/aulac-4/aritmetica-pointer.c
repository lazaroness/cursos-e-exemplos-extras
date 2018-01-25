#include <stdio.h>
#include <stdlib.h>

int main(){
	int size = 5;
	int i;
	char tmp;
	int *ptr;

	tmp = malloc(size * sizeof(char));
	ptr = malloc(size * sizeof(int));

	printf("tamanho de chat é 1, exemplo %lu\n", sizeof(tmp));
	printf("os enderecos de memoria pulando de 1 em 1");

	for(i = 0; i < size; i++){
		printf("%i) ptr: %p\n", i, tmp);
		tmp++;
	}

	printf("tamanho de int é 4, exemplo %lu\n", sizeof(ptr));
	printf("os enderecos de memoria pulando de 4 em 4");

	for(i = 0; i < size; i++){
		printf("%i) ptr: %p\n", i, ptr);
		ptr++;
	}
}