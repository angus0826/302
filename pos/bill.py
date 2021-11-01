import sys
from PyQt5.QtWidgets import (QApplication, QWidget, QPushButton, QLabel, QLineEdit, QGridLayout, QMessageBox)
from PyQt5 import QtGui, QtCore, QtWidgets
import numpy as np
from app.menu import MenuPage

class BillPage(QWidget):
    def __init__(self, table_id, staff_id):
        super().__init__()
        self.setWindowTitle('Bill Page')
        self.resize(1000, 600)
        self.layout = QGridLayout()
        self.layout_2 = QGridLayout()
        self.layout_3 = QGridLayout()
        self.layout.addLayout(self.layout_2, 1, 0)
        self.layout.addLayout(self.layout_3, 3, 0)
        self.food_count = 0

        self.table_id = table_id
        self.staff_id = staff_id

        #Title
        self.label_name = QLabel('<font size="8"> Order Item: </font>')
        self.layout.addWidget(self.label_name, 0, 0,0,0)

        # button food and drink
        x = ['food', 'drink']
        int_food = 2
        for a in range(int_food):
            count = a + 1
            self.button_cat = QPushButton(x[a])
            self.button_cat.pressed.connect(lambda val=x[a]: self.show_food(val))
            self.layout.addWidget(self.button_cat, 1, count)


        self.button_order = QPushButton('Order')
        self.button_order.pressed.connect(self.order_food)
        self.layout.addWidget(self.button_order,3,0)

        self.button_pay = QPushButton('Pay Bill')
        self.button_pay.pressed.connect(self.pay_bill)
        self.layout.addWidget(self.button_pay, 3, 1)

        self.setLayout(self.layout)

    def order_food(self):
        store_id = '1'
        staff_id = self.staff_id
        table_id = self.table_id
        price = self.price[1:]
        food_id = self.food_id
        takeaway = 'N'
        quabtity = '1'
        discount = '1'
        member_id = ''
        bill_status = 'N'



        '''cur store_id table_no staff_id takeaway item_id quabtity price discount member_id
                     bill_status'''

    def pay_bill(self):
        print('Pay The fucking bill!')

    def show_food(self, sel):
        print(sel)
        int_res = 3
        if sel == 'food':
            x =[('1','food_1','food','rubish food','12'),('2','food_2','food','rubish food2','13'),('3','food_3','food','rubish food3','14')]
        if sel == 'drink':
            x = ['drink_1', 'drink_2', 'drink_3']
        print(x)

        for a in range(int_res):
            nameAndPrice = ''
            for b in range(5):
                if b != 2 and b != 3:
                    nameAndPrice = nameAndPrice + x[a][b] + ' '
                if b == 3:
                    nameAndPrice = nameAndPrice + '$'
            self.button = QPushButton(nameAndPrice)
            self.button.pressed.connect(lambda val=nameAndPrice: self.print_food(val))
            self.layout.addWidget(self.button)

    def print_food(self, name):
        print(name)
        ary = name.split(' ')

        print(ary)
        self.food_id = ary[0]
        food = ary[1]
        self.price = ary[2]

        self.food_count = self.food_count + 1
        self.sel_label_food = QLabel(self.food_id + ' ' + food + ' ' + self.price)
        self.layout_2.addWidget(self.sel_label_food, self.food_count, 0)



if __name__ == '__main__':
    app = QApplication(sys.argv)
    page = BillPage()
    page.show()

    sys.exit(app.exec())