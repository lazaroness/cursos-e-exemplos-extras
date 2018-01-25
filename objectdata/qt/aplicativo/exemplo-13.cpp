#include <iostream>
#include <stdlib.h>

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
  // nao chama o destrutor só desaloca a memoria
  free(data);

  return 0;
}
