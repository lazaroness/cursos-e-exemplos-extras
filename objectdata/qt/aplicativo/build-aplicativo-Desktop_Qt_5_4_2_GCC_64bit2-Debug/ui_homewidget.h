/********************************************************************************
** Form generated from reading UI file 'homewidget.ui'
**
** Created by: Qt User Interface Compiler version 5.4.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_HOMEWIDGET_H
#define UI_HOMEWIDGET_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QGridLayout>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QVBoxLayout>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_HomeWidget
{
public:
    QVBoxLayout *verticalLayout;
    QWidget *web;
    QWidget *menu;
    QGridLayout *gridLayout;
    QPushButton *pushButton;
    QPushButton *pushButton_3;
    QPushButton *pushButton_4;
    QPushButton *pushButton_2;
    QPushButton *pushButton_5;
    QPushButton *pushButton_6;

    void setupUi(QWidget *HomeWidget)
    {
        if (HomeWidget->objectName().isEmpty())
            HomeWidget->setObjectName(QStringLiteral("HomeWidget"));
        HomeWidget->resize(360, 640);
        verticalLayout = new QVBoxLayout(HomeWidget);
        verticalLayout->setObjectName(QStringLiteral("verticalLayout"));
        web = new QWidget(HomeWidget);
        web->setObjectName(QStringLiteral("web"));
        web->setMinimumSize(QSize(0, 250));
        web->setMaximumSize(QSize(16777215, 250));

        verticalLayout->addWidget(web);

        menu = new QWidget(HomeWidget);
        menu->setObjectName(QStringLiteral("menu"));
        gridLayout = new QGridLayout(menu);
        gridLayout->setObjectName(QStringLiteral("gridLayout"));
        pushButton = new QPushButton(menu);
        pushButton->setObjectName(QStringLiteral("pushButton"));

        gridLayout->addWidget(pushButton, 0, 0, 1, 1);

        pushButton_3 = new QPushButton(menu);
        pushButton_3->setObjectName(QStringLiteral("pushButton_3"));

        gridLayout->addWidget(pushButton_3, 0, 1, 1, 1);

        pushButton_4 = new QPushButton(menu);
        pushButton_4->setObjectName(QStringLiteral("pushButton_4"));

        gridLayout->addWidget(pushButton_4, 1, 0, 1, 1);

        pushButton_2 = new QPushButton(menu);
        pushButton_2->setObjectName(QStringLiteral("pushButton_2"));

        gridLayout->addWidget(pushButton_2, 1, 1, 1, 1);

        pushButton_5 = new QPushButton(menu);
        pushButton_5->setObjectName(QStringLiteral("pushButton_5"));

        gridLayout->addWidget(pushButton_5, 2, 0, 1, 1);

        pushButton_6 = new QPushButton(menu);
        pushButton_6->setObjectName(QStringLiteral("pushButton_6"));

        gridLayout->addWidget(pushButton_6, 2, 1, 1, 1);


        verticalLayout->addWidget(menu);


        retranslateUi(HomeWidget);

        QMetaObject::connectSlotsByName(HomeWidget);
    } // setupUi

    void retranslateUi(QWidget *HomeWidget)
    {
        HomeWidget->setWindowTitle(QApplication::translate("HomeWidget", "Form", 0));
        pushButton->setText(QApplication::translate("HomeWidget", "PushButton", 0));
        pushButton_3->setText(QApplication::translate("HomeWidget", "PushButton", 0));
        pushButton_4->setText(QApplication::translate("HomeWidget", "PushButton", 0));
        pushButton_2->setText(QApplication::translate("HomeWidget", "PushButton", 0));
        pushButton_5->setText(QApplication::translate("HomeWidget", "PushButton", 0));
        pushButton_6->setText(QApplication::translate("HomeWidget", "PushButton", 0));
    } // retranslateUi

};

namespace Ui {
    class HomeWidget: public Ui_HomeWidget {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_HOMEWIDGET_H
