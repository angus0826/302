import sys
from PyQt5.QtWidgets import (QApplication, QWidget, QPushButton, QLabel, QLineEdit, QGridLayout, QMessageBox)
from PyQt5 import QtGui, QtCore, QtWidgets
import numpy as np

class MenuPage(QWidget):
    def __init__(self):
        super().__init__()
        self.setWindowTitle('Menu Page')
        self.resize(400, 500)
        self.layout = QGridLayout()

        x = ['food', 'drink']
        int_food = 2
        for a in range(int_food):
            self.button_cat = QPushButton(x[a])
            self.button_cat.pressed.connect(lambda val = x[a]: self.show_food(val))
            self.layout.addWidget(self.button_cat, 1, a, 20, 1)



        self.setLayout(self.layout)

    def show_food(self, sel):
        print(sel)
        int_res = 3
        if sel == 'food':
            x = ['food_1', 'food_2', 'food_3']
        if sel == 'drink':
            x = ['drink_1', 'drink_2', 'drink_3']
        print(x)

        for a in range(int_res):
            self.button = QPushButton(x[a])
            self.layout.addWidget(self.button)
            self.button.pressed.connect(lambda  val = x[a]: self.print_food(val))

    def print_food(self, name):
        print(name)



if __name__ == '__main__':
    app = QApplication(sys.argv)
    page = MenuPage()
    page.show()

    sys.exit(app.exec())