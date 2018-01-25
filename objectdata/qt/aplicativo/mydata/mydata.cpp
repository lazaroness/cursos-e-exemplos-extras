#include <iostream>
#include "mydata.h"

MyData::MyData(){
  std::cout << "construtor...\n";
}

MyData::MyData(int codigo, double total){
  m_codigo = codigo;
  m_total  = total;
  std::cout << "construtor 2 ...";
}

void MyData::setCodigo(int codigo){
  m_codigo = codigo;
}

void MyData::setTotal(double total){
  m_total = total;
}

void MyData::imprime(){
  std::cout << "codigo: " << m_codigo << "\ntotal: " << m_total << '\n';
}

