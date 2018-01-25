#include <stdio.h>

int main(){
	int var = 4;
	int *ptr = &var;

	printf("ponteiro %p\n", ptr);
	printf("ponteiro %p\n", &var); // &var : retorna o endereco de memoria da variavel var
}