#include <stdio.h>
#include <stdlib.h>

int main(){
	char *frase1 = "o rato";
	char *frase2 = "roeu";
	char *frase3 = malloc(12 * sizeof(char));

	int i;
	for(i=0; i<12; i++){
		if(i == 6){
//			printf("aqui espaco %i\n", i);
			frase3[i] = ' ';
		}else if(i > 6){
//			printf("aqui frase2 %i\n", i);
			frase3[i] = frase2[i-7];
		}else{
			frase3[i] = frase1[i];
		}
	}
//	printf("%s\n", frase1);
//	printf("%s\n", frase2);
	printf("%s\n", frase3);
}