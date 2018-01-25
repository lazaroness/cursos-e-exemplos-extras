#include <stdio.h>

int somar(int a, int b);
//int somar(int a, int b){
//  return a + b;
//}

int main(){
  int a = 1;
  int b = 2;
  int total = somar(1, 2);
  printf("a soma de %i e %i é: %i \n", a, b, total);
}

int somar(int a, int b){
  return a + b;
}
