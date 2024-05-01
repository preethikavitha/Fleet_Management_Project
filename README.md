# Fleet_Management_Project
1.user profile problem in address
2.


admin:
1.car.php
 -->when click suspend button it show the full view of vehi->>assurance or confirm 
--> advance amount and charges-->include
2.edit.php
-->edit page problem
3.editfuel.php
  default date problem
4.fueldet.php,insurdet.php,servicedet.php
 -->last entered fuel detail will show but in get link it show the number plate of clicked vehicle
-->in all heading show  service history.
1.insurdet.php

Fatal error: Uncaught mysqli_sql_exception: Unknown column 'claim' in 'field list' in 
C:\xa\htdocs\User\Fleet Management project\admin\loginsuccess\pages\insurdet.php:168 
Stack trace: #0 C:\xa\htdocs\User\Fleet Management project\admin\loginsuccess\pages\insurdet.php(168):
 mysqli->query('SELECT claim FR...') #1 {main} thrown in C:\xa\htdocs\User\Fleet Management project\admin\loginsuccess\pages\insurdet.php on line 168

2


3.
4.
5.


ALTER TABLE booking ADD FOREIGN KEY (emailid) REFERENCES userdetail(emailId);

autoincrement 
