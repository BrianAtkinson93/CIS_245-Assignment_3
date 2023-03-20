# Assignment_3

---

[![GitHub Badge](https://img.shields.io/badge/GitHub-BrianAtkinson93-darkred?logo=github)](https://github.com/BrianAtkinson93)
![PHP v8.2](https://img.shields.io/badge/PHP-v8.2-blue)
![MySQL v8.0.23](https://img.shields.io/badge/MySQL-v8.0.23-green)
![HTML5 badge](https://img.shields.io/badge/HTML-5-orange)
![CSS3 badge](https://img.shields.io/badge/CSS-3-blue)


Brian Atkinson <br>
300088157<br>
March 20, 2023<br>
CIS 245 Winter 2023<br>
Ismail Al Sayad<br>

---

## Part 1
- Create index.php Page

## Part 2

- Create main.php
- The main.php page: In this page, the user gets a greeting 
“Welcome, student name” and 2 images(  and ), each of them is a 
link to view.php and register.php respectively. Both images, 
view.png and register.png are in the same folder with all the other 
php files.  The page main.php looks like this, assuming that Sara 
logged in correctly:  Write the code of this page.<br>(Note that Sara Issa here is an example. Any user who logs in, should get his/her name instead)

## Part 3
#### The registration pages register.php   <br>
3.1) This page contains 3 parts: <br>
A. A link “home” that takes the user back to main.php <br>
B. A list of all courses available in the table courses (only course code and section are shown, separated by a dash(-)). The courses are ordered alphabetically. <br>
C. A form containing 2 text fields and a submit button that sends the form to a script called registercourse.php <br>
<br>
Code for part A of Register.php  The home link and the code necessary to make sure the session is established or not. If not, navigate the user back to index.php<br>
Code for part B:Show the registered courses<br>
Code for part C: The Form<br>

## Part 4
#### The View.php page<br>
This page shows a table containing only the registered courses for the student who is logged in. An example is shown here with all 4 parts explained.
## Part 5
#### Delete.php <br>
This page deletes the course, which the logged student pressed on the X icon in its row, from the registered table. When the course is deleted, the user is navigated back automatically to the view.php page
## Part 6

#### The page changeSection.php. view.php <br>
This page is executed whenever the student chooses any <option> from the <select> list of a row in the table in page and clicks on “change”. When done, the user is navigated back to view.php

