#include <stdio.h>

int main(){
	int i, resultado;
	i = 3;
	resultado = (i > 2) ? 1 : 0;
	printf("resultado é %i\n", resultado);

	resultado = (i < 2) ? 1 : 0;
	printf("resultado é %i\n", resultado);
}