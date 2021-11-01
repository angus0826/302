import sys
from PyQt5.QtWidgets import (QApplication, QWidget, QPushButton, QLabel, QLineEdit, QGridLayout, QMessageBox)
from PyQt5 import QtGui, QtCore, QtWidgets
from app.bill import BillPage
class TablePage(QWidget):
    def __init__(self, id, ac):
        super().__init__()
        self.setWindowTitle('Order Page')
        self.resize(1200,600)
        layout = QGridLayout()
        staff_name = ac
        label_name = QLabel('<font size="4"> User ID: </font>' + staff_name)
        layout.addWidget(label_name,0,0)

        self.staff_id = id

        staff_title = 'Manager'
        label_title = QLabel('<font size="4"> User Title: </font>' + staff_title)
        layout.addWidget(label_title,0,1)

        self.button_table_1 = QPushButton('Table 1')
        self.button_table_2 = QPushButton('Table 2')
        self.button_table_3 = QPushButton('Table 3')
        self.button_table_4 = QPushButton('Table 4')
        self.button_table_5 = QPushButton('Table 5')
        self.button_table_6 = QPushButton('Table 6')
        self.button_table_7 = QPushButton('Table 7')
        self.button_table_8 = QPushButton('Table 8')
        self.button_table_9 = QPushButton('Table 9')
        self.button_table_1.pressed.connect(lambda val=1: self.check_table(val))
        self.button_table_2.pressed.connect(lambda val=2: self.check_table(val))
        self.button_table_3.pressed.connect(lambda val=3: self.check_table(val))
        self.button_table_4.pressed.connect(lambda val=4: self.check_table(val))
        self.button_table_5.pressed.connect(lambda val=5: self.check_table(val))
        self.button_table_6.pressed.connect(lambda val=6: self.check_table(val))
        self.button_table_7.pressed.connect(lambda val=7: self.check_table(val))
        self.button_table_8.pressed.connect(lambda val=8: self.check_table(val))
        self.button_table_9.pressed.connect(lambda val=9: self.check_table(val))
        layout.addWidget(self.button_table_1,1,0,30,1)
        layout.addWidget(self.button_table_2,1,1,30,1)
        layout.addWidget(self.button_table_3,1,2,30,1)
        layout.addWidget(self.button_table_4,2,0,40,1)
        layout.addWidget(self.button_table_5,2,1,40,1)
        layout.addWidget(self.button_table_6,2,2,40,1)
        layout.addWidget(self.button_table_7,3,0,50,1)
        layout.addWidget(self.button_table_8,3,1,50,1)
        layout.addWidget(self.button_table_9,3,2,50,1)

        button_revenue = QPushButton('REVENUE')
        button_revenue.pressed.connect(self.check_revenue)
        layout.addWidget(button_revenue, 20,0,40,1)
        self.setLayout(layout)

    def check_table(self, table_id):

        self.window = BillPage(table_id, '1')
        self.window.show()
        if table_id == 1:
            self.button_table_1.setStyleSheet('background-color: red')
        if table_id == 2:
            self.button_table_2.setStyleSheet('background-color: red')
        if table_id == 3:
            self.button_table_3.setStyleSheet('background-color: red')
        if table_id == 4:
            self.button_table_4.setStyleSheet('background-color: red')
        if table_id == 5:
            self.button_table_5.setStyleSheet('background-color: red')
        if table_id == 6:
            self.button_table_6.setStyleSheet('background-color: red')
        if table_id == 7:
            self.button_table_7.setStyleSheet('background-color: red')
        if table_id == 8:
            self.button_table_8.setStyleSheet('background-color: red')
        if table_id == 9:
            self.button_table_9.setStyleSheet('background-color: red')


    def check_revenue(self):
        print('This is revenue')

if __name__ == '__main__':
    app = QApplication(sys.argv)
    page = TablePage()
    page.show()

    sys.exit(app.exec())