#include <stdio.h>
#include <stdlib.h>

int main(){
	char *ptr;
	int i, size;

	size = 30;
	ptr = malloc(size * sizeof(char));
	for(i = 0; i < size; i++){
		*ptr = 'a';
		ptr ++;
	}
	*ptr = '\0';

	(ptr -= size);
	*(ptr+4) = 'b';

	printf("frase %s\n", ptr);

	/*
		O * no começo é colocado quando vai declarar o ponteiro e
		quando você quer colocar algo no valor do endereco de memoria
		do ponteiro, sem o * ele vai para o endereco de memoria e nao
		para o valor dquele endereco de memoria
	*/
}