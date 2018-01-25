#include <iostream>

class MyData {
private:
  int m_codigo;
  double m_total;
public:
  void setCodigo(int codigo){
    m_codigo = codigo;
  }
  void setTotal(double total){
    m_total = total;
  }

  void imprime(){
    std::cout << "codigo: " << m_codigo << "\ntotal: " << m_total << '\n';
  }
};

int main(){
  MyData * data = new MyData;
  data->setCodigo(15);
  data->setTotal(1234.234);

  data->imprime();

  return 0;
}
