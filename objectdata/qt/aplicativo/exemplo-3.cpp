#include <iostream>

int valor(int v){
  std::cout << "v: " << v << '\n';
  v = 5;
}

int main(){
  int var = 4;
  valor(var);
  std::cout << "var: " << var << '\n';
}
