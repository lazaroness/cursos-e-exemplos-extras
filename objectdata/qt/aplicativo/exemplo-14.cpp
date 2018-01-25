#include <iostream>

class MyData {
private:
  int m_codigo;
  double m_total;
public:
  MyData(){
    std::cout << "construtor...\n";
  }

  ~MyData(){
    std::cout << "destrutor...\n";
  }
};

int main(){
  MyData * data = new MyData;
  // chama o destrutor para desaloca a memoria
  delete data;

  return 0;
}
