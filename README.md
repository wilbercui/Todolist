# TODO List

## System Summary
This is a group project, creating a website where it will be possible to create our private TODO list and to share it with our friends.

## Function Realization
### Module 1
***Registration, Login, Logout***
In order for the user to be able to create his TODO lists, setting up a system for registering, logging on and logout the user.
To create an account, the user will have to provide a nickname, an email address and a password. The nickname and email address must be unique, so check availability when creating the account.
The application will contain a MySQL database that will store the user's information.
### Module 2
***Home page***
Once the user has logged on to the site, he will arrive on his home page. This will contain the sharing notifications and all the TODO lists of the user and the TODO lists shared with him.
It will be able to do the following actions:
* Accept or deny a request to share TODO list
* Create a new TODO list
* Delete a TODO list
* Click on an existing TODO list to modify it
### Module 3
***TODO List Pages***
The TODO pages are the most important pages of the website. They will allow the management of the TODO lists with these different elements:
* The TODO list will contain two parts: "tasks in progress" and "tasks completed"
* The ability to display all tasks or only current tasks or only completed tasks
* Add/Remove an item to the TODO List without needing to reload the page to see the change
* Switching a task item from current tasks to completed tasks
* A button to check off all the tasks at once
* A button to delete all completed tasks at once
### Module 4
***Friend Management***
* Share a TODO with a person using their nickname or email address
* Send an email to the person, and they will get a notification on their home page
* When we add a friend to the TODO list, we can give them editing rights, or only playback rights.
### Module 5
***Unit tests***

## Technology Selection
***The Exploitation Environment***
Operating system: Windows 10
Programming language: PHP 
Development tools: PHPStorm, Git
Database: MySQL
Code hosting platform: GitHub

## Installation Guide
To save time, the project was developed using an integrated environment. Download the new version of phpstudy
And install it. Remember to choose the storage directory of the PHP program (the folder is www).

## Instructions for use
Put the program in the "www" folder and open PHPStudy. Open the Apache and MySQL software packages on the homepage, select "Create Website" in the website bar, fill in the domain name and port you want to use, and then select the folder of the program in the root directory. PHP version is recommended to use 7.3. By default, the database account and password are both root.
After completing the above operations, enter the domain name you set in the browser to use the program.
