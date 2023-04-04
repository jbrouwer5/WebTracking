# WebTracking
An html/javascript/php/mysql stack that works by scraping a visitors data and storing it in the database for tracking purposes.


The html page scrapes 8 different values: The page being visited, cookie, public ip, window width, window height, user agent string, cookies_enabled, and javascript_enabled.

The html then sends a post request to the php file which is able to add the values to the database using sql queries. 

You can then run cluster.php in order to access the database and analyze the data to determine visitor traffic patterns. 



The data looks like this 

<img width="1510" alt="Screen Shot 2023-03-07 at 3 46 46 PM" src="https://user-images.githubusercontent.com/63489213/229796234-01a0c84b-cc87-4fda-848e-2bd95b1dbe85.png">

