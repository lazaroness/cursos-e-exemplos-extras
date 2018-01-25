#include <stdio.h>

int main(){
	char *frase = "o rato roeu";
	const char *constfrase = frase;
	frase[2] = 'g';
	printf("frase %s\n", constfrase);

	/*
		Se o ponteiro é const eu não consigo alterar para onde ele está apontando,
		porem consigo alterar o conteudo daquele espaço de memoria.
	*/
}