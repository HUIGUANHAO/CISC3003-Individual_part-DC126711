# CISC3003 Individual work of project -DC126711
Github Repo:<https://github.com/HUIGUANHAO/CISC3003-Individual_part-DC126711>

My personal task is to implement the **profile page** development of our rental website.
  >I will use the following tools and languages to assist in the development:
  >- HTML
  >- CSS
  >- Javascript
  >- jQuery
  >- PHP
  >- MySQL

# Database Deployment
The first step is to start our server, which requires us to install XAMPP or WAMP and MySQL already on our computer.
>1. We start the XAMPP or WAMP server first
>2. Let's open the Admin screen
>3. Select import
>4. we import the rentsys.sql file, which will create the required database and tables:

![alt text](<My screen shots/database_setup.png>)

After that we set the password of the user in conn.php file so that we can complete the connection to the database

```php
<?php
//connect to the database
    $conn = mysqli_connect("localhost", "root", "root", "rentsys");
    if(!$conn){
        die("Failed to connect to the database server");
    }
    //Setting character set
    mysqli_query($conn, "set name utf8");
?>
```

Now we can successfully link to the database!


# Walkthrough
1. First we log in to the landlord/tenant account and then go to the home page.
![alt text](<My screen shots/homepage.png>)

2. Then click on the avatar icon in the top right corner to get to the profile screen. We can see that there are many profile tabs that we can change.
![alt text](<My screen shots/myprofile.png>)

3. Here is the corresponding database view, we can see the user profile data before the change.
![alt text](<My screen shots/databaseview（before）.png>)

4. We modify the user's information.
![alt text](<My screen shots/changeprofile.png>)

5. You will be prompted after a successful submission.
![alt text](<My screen shots/changesuccessfully.png>)

6. You can now see the changes in the database for that user.
![alt text](<My screen shots/databaseview（after）.png>)

7. Back on the profile screen, we can switch accounts and log out by using the hover box on the left of the account.
![alt text](<My screen shots/Logout；switch.png>)

8. After selecting Switch, the screen will be redirected to the login screen.
![alt text](<My screen shots/switchview.png>)

9. After selecting the logout button, the account will automatically log out and return to the home page.
![alt text](<My screen shots/logoutview.png>)

<br><br>
This is the whole process of my individual work of Team08's project, the full project can be viewed in this repo:
<https://github.com/HUIGUANHAO/CISC3003-Team08-FinalProject>