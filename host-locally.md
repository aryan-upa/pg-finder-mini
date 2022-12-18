# Host Locally

For all dev geeks out there, wondering how to host this app locally? **_We're here to cover you._**

## Step 1: Install **XAMPP Server**
_To install XAMPP on your PC, follow these steps:_
- Download XAMPP from the official website [here](https://www.apachefriends.org/download.html).
- Follow the prompts to select the components you want to install and the installation location. _It is recommended to leave the default settings as they are._
- Click "Next" to continue with the installation process and finally "Install" to begin installing.
- Click "Finish" to exit the setup wizard.
- To launch XAMPP, open the XAMPP Control Panel and click the "Start" button next to the Apache and MySQL modules.
- To test if XAMPP is working correctly, open a web browser and enter the following URL: http://localhost/
- If you see the XAMPP welcome page, it means that XAMPP has been installed successfully on your computer.

## Step 2: Setup Files
- Click on the [link](https://github.com/aryan-upa/pg-finder-mini/archive/main.zip) to download Project Files.
- Go to C:\xampp\htdocs
- Create a folder by 'folder1 (your choice)' name and inside it unzip the file.

## Step 3: Start Server
- Open XAMPP.
- Start MySQL and Apache Server.

## Step 4: To fill the database.
- Goto [phpMyAdmin Panel](http://localhost/phpmyadmin/).
- Create new Database by the name `pg-finder`.
- Goto Import Panel and Upload pg-finder.sql file (can find this in Project Files in Database folder).
- Perform import.

## Done! 🎉
Your _Locally Hosted_ PG Finder is ready. Go to http://localhost/folder1/pg-finder-mini to see the working Project. 


## Stop
To end the live server just stop the Apache and MySQL Server.
