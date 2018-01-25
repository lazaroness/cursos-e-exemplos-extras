/********************************************************************************
** Form generated from reading UI file 'aplicativowidget.ui'
**
** Created by: Qt User Interface Compiler version 5.4.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_APLICATIVOWIDGET_H
#define UI_APLICATIVOWIDGET_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QHBoxLayout>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QSpacerItem>
#include <QtWidgets/QVBoxLayout>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_AplicativoWidget
{
public:
    QVBoxLayout *verticalLayout;
    QWidget *topo;
    QHBoxLayout *horizontalLayout;
    QSpacerItem *horizontalSpacer;
    QPushButton *pushButton;
    QSpacerItem *horizontalSpacer_2;
    QWidget *corpo;
    QWidget *rodape;

    void setupUi(QWidget *AplicativoWidget)
    {
        if (AplicativoWidget->objectName().isEmpty())
            AplicativoWidget->setObjectName(QStringLiteral("AplicativoWidget"));
        AplicativoWidget->resize(360, 640);
        verticalLayout = new QVBoxLayout(AplicativoWidget);
        verticalLayout->setSpacing(0);
        verticalLayout->setContentsMargins(11, 11, 11, 11);
        verticalLayout->setObjectName(QStringLiteral("verticalLayout"));
        verticalLayout->setContentsMargins(0, 0, 0, 0);
        topo = new QWidget(AplicativoWidget);
        topo->setObjectName(QStringLiteral("topo"));
        topo->setMinimumSize(QSize(0, 60));
        topo->setMaximumSize(QSize(16777215, 60));
        topo->setStyleSheet(QStringLiteral("background-color: rgb(228, 31, 31);"));
        horizontalLayout = new QHBoxLayout(topo);
        horizontalLayout->setSpacing(0);
        horizontalLayout->setContentsMargins(11, 11, 11, 11);
        horizontalLayout->setObjectName(QStringLiteral("horizontalLayout"));
        horizontalLayout->setContentsMargins(0, 0, 0, 0);
        horizontalSpacer = new QSpacerItem(161, 20, QSizePolicy::Expanding, QSizePolicy::Minimum);

        horizontalLayout->addItem(horizontalSpacer);

        pushButton = new QPushButton(topo);
        pushButton->setObjectName(QStringLiteral("pushButton"));
        pushButton->setMinimumSize(QSize(0, 55));
        pushButton->setMaximumSize(QSize(16777215, 55));
        pushButton->setStyleSheet(QLatin1String("image: url(:/imagens/android.jpg);\n"
"border: none;\n"
"outline: none;"));

        horizontalLayout->addWidget(pushButton);

        horizontalSpacer_2 = new QSpacerItem(161, 20, QSizePolicy::Expanding, QSizePolicy::Minimum);

        horizontalLayout->addItem(horizontalSpacer_2);


        verticalLayout->addWidget(topo);

        corpo = new QWidget(AplicativoWidget);
        corpo->setObjectName(QStringLiteral("corpo"));

        verticalLayout->addWidget(corpo);

        rodape = new QWidget(AplicativoWidget);
        rodape->setObjectName(QStringLiteral("rodape"));
        rodape->setMinimumSize(QSize(0, 15));
        rodape->setMaximumSize(QSize(16777215, 15));
        rodape->setStyleSheet(QStringLiteral("background-color: rgb(136, 136, 136);"));

        verticalLayout->addWidget(rodape);


        retranslateUi(AplicativoWidget);

        QMetaObject::connectSlotsByName(AplicativoWidget);
    } // setupUi

    void retranslateUi(QWidget *AplicativoWidget)
    {
        AplicativoWidget->setWindowTitle(QApplication::translate("AplicativoWidget", "AplicativoWidget", 0));
        pushButton->setText(QString());
    } // retranslateUi

};

namespace Ui {
    class AplicativoWidget: public Ui_AplicativoWidget {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_APLICATIVOWIDGET_H
