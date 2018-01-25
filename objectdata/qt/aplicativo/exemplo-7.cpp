#include <iostream>

struct MyData {
  int codigo;
  double total;
};

int main(){
  MyData * data = new MyData;
  data->codigo = 15;
  (*data).total = 1234.234;

  std::cout << "codigo: " << data->codigo << "\ntotal: " << data->total << '\n';
  return 0;
}
