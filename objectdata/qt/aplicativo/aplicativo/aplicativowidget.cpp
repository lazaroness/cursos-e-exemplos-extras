#include "aplicativowidget.h"
#include "ui_aplicativowidget.h"
#include "homewidget.h"
#include <QHBoxLayout>

AplicativoWidget::AplicativoWidget(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::AplicativoWidget)
{
    ui->setupUi(this);
    ui->corpo->setLayout(new QHBoxLayout);
    HomeWidget * home = new HomeWidget;
    ui->corpo->layout()->addWidget(home);
}

AplicativoWidget::~AplicativoWidget()
{
    delete ui;
}
