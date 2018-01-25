#include <iostream>

class MyData {
private:
  int codigo;
  double total;
public:
  void setCodigo(int codigo){
    this->codigo = codigo;
  }
  void setTotal(double total){
    this->total = total;
  }

  void imprime(){
    std::cout << "codigo: " << this->codigo << "\ntotal: " << this->total << '\n';
  }
};

int main(){
  MyData * data = new MyData;
  data->setCodigo(15);
  data->setTotal(1234.234);

  data->imprime();

  return 0;
}
