#include <stdio.h>
typedef char * string;
void imprimeTexto(string texto);

int main(){
	string frase = "o rato roeu a roupa";
	printf("Frase: %s\n", frase);
	imprimeTexto(frase);
}

void imprimeTexto(char * texto){
	printf("Texto: %s\n", texto);
}