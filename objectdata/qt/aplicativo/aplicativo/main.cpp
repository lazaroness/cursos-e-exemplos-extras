#include "aplicativowidget.h"
#include <QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    AplicativoWidget w;
    w.show();

    return a.exec();
}
