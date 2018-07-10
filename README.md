# General Information
This is the job tracker project for cps276.  The purpose of this project is to give students an experience with working on a larger application so they can really see how all the pieces fit together, using an MVC type architecture.  Most of the application is already written and all the students are responsible for is to write the code for two back-end controller files ()

# Installation Instructions
1. ssh into your server

2. Go to where the php files are used (for digital ocean it should be /var/www/html) 

3. Go to the github location where the job_tracker_student_version_php files are located https://github.com/sshaper/job_tracker_student_version_php

4. Click clone or download and then click the copy icon.

5. Go to your terminal window and enter "git clone" then paste what you had copied.

6. A folder named job_tracker_student_version_php will be created, containing all the supporting files.  Go into the sql directory

7. Log into mysql (mysql -u root -p) and create the job_tracker database (CREATE DATABASE job_tracker). When done exit MySQL shell

8. Import the tables from the sql file (mysql -u root -p job_tracker < job_tracker.sql).  Make sure you are in the sql directory or job_tracker_student_version_php.

9. YOU MUST CHANGE THE CODE IN THE FOLLOWING FILES FOR THE APPLICATION TO WORK

..9a line 83 of controller/login.php change the url to yours.

..9b line 49 of public/js/login.js change the url to yours.

..9c line 3 of views/partials/navigation.php change the url to yours.

..9d go into the public directory and give full permissions to the account_folders directory (chmod 777 account_folders).

..9e lines 20 and 28 of the invoice.php page change the url to yours.

10. Go to application login page and login.

11. Click Accounts and then add account.

12. Add an account by clicking add account.

13. Click update account, select the account you just created, and change something the update account.

14. Check to make sure the update took by selecting update account again.

15. Click add account asset, enter an name and select a file to upload (I have included a folder named "testdocuments" you can get a file from there).

16. Click view account assets, select your account, click on the file name, you should have your pdf file open in a new window.

17. Delete the file you just created.

18. If all the above worked then the application is working as expected. 