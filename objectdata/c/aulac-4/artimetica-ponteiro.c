#include <stdio.h>
#include <stdlib.h>

int main(){
	char *tmp;
	char *ptr = malloc(30*sizeof(char));
	int i;
	for(i=0; i < 30; i++){
//		*(ptr+i) = 'a';
		(*ptr++) = 'b';



/*
		*ptr++ = 'b';
		(*ptr)++;
		*ptr = 'b';

		++*(ptr);
		*ptr = 'b';
		(*ptr) = 'b';
*/
	}
	*(ptr-30);
	printf("frase %s\n", ptr);
}