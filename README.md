# SDEV328Final
Rice Rice Baby, rice selling webpage

## Authors
- **Charlie Tang - Co-Founder/Developer
- **Mark Pesqueira - Co-Founder/Developer

## Project Requirements

:heavy_check_mark: 1.Separates all database/business logic using the MVC pattern.
* Business logic and database under model folder
* All HTML files under views folder
* Routes to all the html files under the index.php
* index.php calls function in Controller to get data from model and return views.
* Classes under classes folder

:heavy_check_mark: 2.Routes all URLs and leverages a templating language using Fat-Free framework
* All routes are in the index.php and leverages a templating language using Fat-Free Framework

:heavy_check_mark: 3.Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.
* All database layer is under model in data-layer.php. The order table is used to get the user_id of the user table for each user's order.

:heavy_check_mark: 4.Data can be viewed and added.
* Database layer uses PDO to view the database on the admin page

:heavy_check_mark: 5.Has a history of commits from both team members to a Git repository. Commits are clearly commented.
* True


:heavy_check_mark: 6.Uses OOP, and defines multiple classes, including at least one inheritance relationship.
* Uses OOP, and has classes for user and order. No use of inheritance

:heavy_check_mark: 7.Contains full Docblocks for all PHP files and follows PEAR standards.
* All PHP files contains DocBlock and Follows Pear Standards.

 
:heavy_check_mark: 8.Has full validation on the client side through JavaScript and server side through PHP.
* User sign up and log in has validation on client side.

:heavy_check_mark: 9.All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.
* All functions and files are commented. 

:heavy_check_mark: 10.Your submission shows adequate effort for a final project in a full-stack web development course.
* Working site with clear thought into each page and style.