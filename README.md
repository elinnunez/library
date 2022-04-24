# COSC 3380 Library Database

### Team 1 Members
- Hunter Jerry McPherson: [Hunter6058](https://github.com/Hunter6058)
- Rodolfo Jose Chavez: [RodolfoChavez22](https://github.com/RodolfoChavez22)
- Elinnoel S Nunez: [elinnunez](https://github.com/elinnunez)
- Justin Isaac Jose: [jjugsting](https://github.com/jjugstin)
- Frank N Bui: [franknhat](https://github.com/franknhat)

## Project Description
The goal in building this project was to create an online library database management system with different functionalities. There are 3 types of accounts, (users, staff, admin). The accounts have different levels of accessibility. All users may request/hold items from the catalog database and there is also different maximum requests/orders and loan periods allowed for different types of users. Users are allowed maximum of 3 orders with 1 week loan periods and staff/admins are allowed 5 maximum orders with 2 week loan periods.

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
- Open browser and enter directory: http://localhost/library/homepage.php
- Project should now run on local server

## Application Usage
