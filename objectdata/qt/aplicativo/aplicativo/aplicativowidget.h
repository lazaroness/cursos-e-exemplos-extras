#ifndef APLICATIVOWIDGET_H
#define APLICATIVOWIDGET_H

#include <QWidget>

namespace Ui {
class AplicativoWidget;
}

class AplicativoWidget : public QWidget
{
    Q_OBJECT

public:
    explicit AplicativoWidget(QWidget *parent = 0);
    ~AplicativoWidget();

private:
    Ui::AplicativoWidget *ui;
};

#endif // APLICATIVOWIDGET_H
