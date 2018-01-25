#include <stdio.h>

int main(){
	char c;
	unsigned char uc;
	int i;
	unsigned int ui;
	float f;
	double d;
	long l;
	long double ld;
	printf("char %lu\n", sizeof(c));
	printf("unsigned char %lu\n", sizeof(uc));
	printf("int %lu\n", sizeof(i));
	printf("unsigned int %lu\n", sizeof(ui));
	printf("float %lu\n", sizeof(f));
	printf("double %lu\n", sizeof(d));
	printf("long int %lu\n", sizeof(l));
	printf("long double %lu\n", sizeof(ld));
}