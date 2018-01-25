#-------------------------------------------------
#
# Project created by QtCreator 2016-06-28T17:44:03
#
#-------------------------------------------------

QT       += core gui

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = aplicativo
TEMPLATE = app


SOURCES += main.cpp\
        aplicativowidget.cpp \
    homewidget.cpp

HEADERS  += aplicativowidget.h \
    homewidget.h

FORMS    += aplicativowidget.ui \
    homewidget.ui

RESOURCES += \
    resource.qrc
