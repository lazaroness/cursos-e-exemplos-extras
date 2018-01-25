#include <iostream>

int valor(int * v){
  std::cout << "v (ponteiro): " << v << '\n';
  std::cout << "v (valor): " << *v << '\n';
  *v = 5;
}

int main(){
  int var = 4;
  valor(&var);
  std::cout << "var: " << var << '\n';
}
