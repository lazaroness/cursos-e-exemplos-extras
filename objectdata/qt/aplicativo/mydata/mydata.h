class MyData {

  private:
    int m_codigo;
    double m_total;
  public:
    MyData();

    MyData(int codigo, double total);

    void setCodigo(int codigo);

    void setTotal(double total);

    void imprime();
};
