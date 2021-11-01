import sys
##import  StaffDB
from PyQt5.QtWidgets import (QApplication, QWidget, QPushButton, QLabel, QLineEdit, QGridLayout, QMessageBox)
from PyQt5 import QtGui, QtCore, QtWidgets
from app.order import TablePage

'''import cx_Oracle
try :
 cx_Oracle.init_oracle_client(lib_dir=r"C:\Oracle\instantclient_19_8")
except Exception as err:
    print(err);
#conn = cx_Oracle.connect('std037/hahaha123@144.214.177.102/xe')
#LoginPage.LoginPage()
class connectDB:
	conn = cx_Oracle.connect('std037/hahaha123@144.214.177.102/xe')
	cur = conn.cursor()'''

class LoginPage(QWidget):
	def __init__(self):
		super().__init__()
		self.setWindowTitle('Login Page')
		self.resize(1200,600)
		layout = QGridLayout()

		label_name = QLabel('<font size="8"> UserID: </font>')
		self.lineEdit_username = QLineEdit()
		self.lineEdit_username.setPlaceholderText('Please enter User ID')
		self.lineEdit_username.setFont (QtGui.QFont('Sanserif', 16))
		layout.addWidget(label_name, 0, 0)
		layout.addWidget(self.lineEdit_username, 0, 1)

		label_password = QLabel('<font size="8"> Password: </font>')
		self.lineEdit_password = QLineEdit()
		self.lineEdit_password.setPlaceholderText('Please enter password')
		self.lineEdit_password.setFont(QtGui.QFont('Sanserif', 16))
		layout.addWidget(label_password, 1, 0)
		layout.addWidget(self.lineEdit_password, 1, 1)

		self.lineEdit_password.setEchoMode(QLineEdit.Password)

		button_login = QPushButton('Login')
		button_login.clicked.connect(self.check_password)
		layout.addWidget(button_login, 2, 0, 1, 1)
		layout.setRowMinimumHeight(2, 75)

		self.setLayout(layout)

	def check_password(self):
		msg = QMessageBox()
		#checkAC = StaffDB.StaffDB.check_pw(connectDB.cur,self.lineEdit_username.text(),self.lineEdit_password.text())
		checkAC = ["123","LI NGAN WA"]
		if checkAC != None:

			window = TablePage(checkAC[0],checkAC[1])
			window.show()
			page.close()
			 # checkAC[0]staff id
			 # checkAC[1]stadd Name

		else:
			msg.setText('Incorrect UserID or Password')
			msg.exec_()

if __name__ == '__main__':
	app = QApplication(sys.argv)

	page = LoginPage()
	page.show()


	sys.exit(app.exec_())