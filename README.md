## Project Description
A student and faculty can borrow
books/media/devices/etc. Different limits for number of items that a student
and faculty can borrow. Also, the number of days will be different in case of
students and teachers. Each item will have an ID. Consider the library may
have multiple copies of the same item. Details of fines due when item are not
returned on time should also be considered. Need the capability to put
request/hold items.

## File Description
For this project, our team used MYSQL for the database build, PHP for both server side scripting and front end design, AWS to host our website as well as XAMPP for the sql dump hosting.

## Site Link
http://18.207.206.17/library

## Roles

## Triggers

## Reports


## Project Tree Structure
```
library
├─ .htaccess
├─ about.php
├─ admin
│  ├─ adminpanel.php
│  ├─ astyle.css
│  ├─ book
│  │  ├─ add.php
│  │  ├─ delete.php
│  │  ├─ restore.php
│  │  └─ update.php
│  ├─ books.php
│  ├─ dashboard.php
│  ├─ disk
│  │  ├─ add.php
│  │  ├─ delete.php
│  │  ├─ restore.php
│  │  └─ update.php
│  ├─ disks.php
│  ├─ electronic
│  │  ├─ add.php
│  │  ├─ delete.php
│  │  ├─ restore.php
│  │  └─ update.php
│  ├─ electronics.php
│  ├─ journal
│  │  ├─ add.php
│  │  ├─ delete.php
│  │  ├─ restore.php
│  │  └─ update.php
│  ├─ journals.php
│  ├─ key
│  │  ├─ author.php
│  │  ├─ brand.php
│  │  ├─ genre.php
│  │  ├─ publisher.php
│  │  └─ type.php
│  ├─ loans.php
│  ├─ reports.php
│  ├─ request.php
│  ├─ requests
│  │  └─ requestchange.php
│  ├─ restore.php
│  ├─ user
│  │  ├─ add.php
│  │  ├─ delete.php
│  │  ├─ restore.php
│  │  └─ update.php
│  └─ users.php
├─ catalog.php
├─ connect.php
├─ find.php
├─ footer.php
├─ header.php
├─ homepage.php
├─ img
│  ├─ image.jpg
├─ index.php
├─ login.php
├─ logout.php
├─ modal.js
├─ README.md
├─ reserve.php
├─ signup.php
├─ sql
│  └─ library.sql
├─ style.css
├─ user
│  └─ userdashboard.php
└─ validate_signup.php
```

## Installation Instructions for Windows localhost
- Download & Install [XAMPP](https://www.apachefriends.org/download.html)
- git clone project inside htdocs directory of XAMPP file location 
- Run XAMPP and click Start on Apache & MySQL
- Go to  http://127.0.0.1/phpmyadmin and create new database named library
- Import the sql dump file that's inside sql folder into the newly created database
- Open connect.php file and edit file line 3 as `$con=new mysqli('localhost', 'root', '', 'library');` and save.
- Open browser and enter directory: http://127.0.0.1:8080/
- Project should now run on local server

## Application Usage

## Team Members
- Hunter Jerry McPherson: [Hunter6058](https://github.com/Hunter6058)
- Rodolfo Jose Chavez: [RodolfoChavez22](https://github.com/RodolfoChavez22)
- Elinnoel S Nunez: [elinnunez](https://github.com/elinnunez)
- Justin Isaac Jose: [jjugsting](https://github.com/jjugstin)
- Frank N Bui: [franknhat](https://github.com/franknhat)
