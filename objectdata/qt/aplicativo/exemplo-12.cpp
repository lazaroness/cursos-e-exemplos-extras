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
  MyData data;

  return 0;
}
