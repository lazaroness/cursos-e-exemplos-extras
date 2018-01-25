#include <stdio.h>

int main(){
	int i;
	for(i=0; i < 1000000; i++){
		printf("progressao: %i\r", i);
	}
}