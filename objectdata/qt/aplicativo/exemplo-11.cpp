#include <iostream>

class MyData {
private:
  int m_codigo;
  double m_total;
public:
  MyData(){
    std::cout << "construtor...\n";
  }

  MyData(int codigo, double total){
    m_codigo = codigo;
    m_total  = total;
    std::cout << "construtor 2 ...";
  }

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
  MyData * data = new MyData(15, 1234.234);

  MyData * data2 = new MyData;
  data2->setCodigo(15);
  data2->setTotal(1234.234);
  data2->imprime();

  data->imprime();

  return 0;
}
