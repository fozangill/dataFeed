# dataFeed

Goal 
We would like to see a command-line program that should process a local XML file (feed.xml) and push the data of that XML file to a DB of your choice (e.g., SQLite) 
You are free to use any library or framework you need or feel comfortable with. You have a free choice of tools. Please use PHP!
Specifications 
1.	The program should be easily extendable, e.g., we could use different data storage to read data from or to push data to. This should be configurable. 
2.	Errors should be written to a logfile
3.	The application should be tested.

All the three points are covered like the code is extensible. If you want to introduce new data storage options, you can create new classes implementing the DataStorageInterface or DBHandlerInterface interfaces, and the main program (cli.php) remains unchanged.

The code is written in Core PHP without using any library or framework.

Following are the details to run the code:
1. Clone the repo
2. execute the cli.php file with command line arguments e.g. php cli.php feed.xml localhost root root catalog.
3. In the second point cli.php is the name of the file, feed.xml is the name of xml file and you have to give path if directory is diffrerent, localhost is the host, root is username, root is password too and catalog is the database.
4. You can setup any of these things according to you like database, username, psasword according to your own requirements.
5. If there is some issue it shows errors in error log file.
6. Test is also written and run test, you might need to install phpunit which can be done running "composer require --dev phpunit/phpunit" in the terminal.
7. Test can be run using the command in terminal  "./vendor/bin/phpunit XMLToDBProcessorTest.php"


