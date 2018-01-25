#include <iostream>

struct MyData {
  int codigo;
  double total;
};

int main(){
  MyData data;
  data.codigo = 15;
  data.total = 1234.234;

  std::cout << "codigo " << data.codigo << "total " << data.total;
  return 0;
}
