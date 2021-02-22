# invoice-exam
## _An invoicing exam for ANDY MAI LTD_



## Features

- Login/Logout for 2 employees account
- Dashboard Analytics for sales
- Create invoice for customer


## V-HOST Setup

Location: C:\xampp\apache\conf\extra\httpd-vhost.conf

```
<VirtualHost *:80>
    DocumentRoot C:/xampp/htdocs/invoicing
    ServerName wwww.invoicing.localhost
    ServerAlias invoicing.localhost
</VirtualHost>
```

Location: C:\Windows\System32\drivers\etc\hosts
```
127.0.0.1		invoicing.localhost
```

## Database Setup
Import invocing.sql inside of the directory folder. After that you can setup the database config in `application/config/database.php`


## Employee Accounts
```
Username: christine.d@gmail.com
Password: password123

Username: raymond.r@gmail.com
Password: password123
```
