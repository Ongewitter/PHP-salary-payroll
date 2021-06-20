# PHP-salary-payroll

## Assignment
You are required to create a utility in PHP to help us determine the dates we need to pay salaries to the sales department. 
We handle our sales payroll as follows:
- Sales staff get a regular monthly fixed base salary. The salary for a month is paid on the last day of the month, unless that day is a weekend day (Saturday, Sunday). In that case, the  salary is paid on the Friday before said weekend. 
- Sales staff get a monthly bonus. On the 15th of every month the bonus is paid for the previous month, unless that day is a weekend day (Saturday, Sunday). In that case, the bonus is paid on the first Wednesday after the 15th. 
- The application needs to be (at the least) able to output the results in a CSV file. The file should contain the results for the whole year. The file should contain 3 columns: month, the  salary payment date for that month and the bonus payment date for the bonus of that month.
- The user needs to be able to input the year they want to receive the dates for.

## Running the file

1. Make sure you have [PHP installed](https://www.php.net/manual/en/install.php)
2. `git clone` this repo
3. `cd` to the repo
4. run `php -S localhost:9000`
5. open a browser and go to [http://localhost:9000/calculatePayDates.php](http://localhost:9000/calculatePayDates.php)
6. Fill in the input field with a number
7. Press `Submit`
8. ???
9. $$$ Profit $$$