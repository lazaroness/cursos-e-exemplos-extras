#include <stdio.h>
#include <string.h>

int main(){
	char frase1[] = "o rato";
	char frase2[] = "roeu";

	if(strcmp(frase1, "o rato") == 0){
		printf("esse if não imprime\n");
	} else {
		printf("else imprime nesse caso ...");
	}

	if(0){
		printf("zero nao aciona o if\n");
	} else if(0) {
		printf("1 aciona o if ou o else if\n");
	} else {
		printf("o if e o else devem ser o para cair aqui\n");
	}
}