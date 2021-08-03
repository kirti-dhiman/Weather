# Weather Service

Here is a service which will extract the weather of a particular city in celsius. When user inputs the city and the date, weather of that city will be fetched according to the date through OpenWeatherMap API.

## Installation

### Code Installation ###

Make sure a server(wampserver, xampp) is already installed in the system. Place the directory in the "www" folder in case wampserver or in "htdocs" in case xampp.

There are two methods to install code file on the php server

- Via Git ( Version Control System ):

    For Git Installation over different environments please follow instructions here: https://git-scm.com/

    - After successfull Git installation follow thse steps:

    - Open git bash terminal over root directory of your project

    - Run the command: `git clone https://github.com/kirti-dhiman/weather-service.git`

    - Afer successfull completion, run the command: `composer update`

    - Installation is successfull

- By downloading the Code files:

    - Alternately, you may download the zip file of the project from https://github.com/kirti-dhiman/weather-service and extract it over folder `C:\xampp\htdocs\` or `C:\wamp\www\` which will create the project in a folder.

    - Open any Command Prompt terminal

    - Now move into the project directory
    `cd C:/xampp/htdocs/`

    - Update composer
    `composer update`

### Database Configuration ###

- Use these names for your reference:
    - <SERVER_ROOT>: The directory where your server is installed
    - <SERVER_HOST>: The host address, e.g., in xampp it would be `localhost`
    - <PROJECT_DIR>: The project directory addres where project is installed

- Import `weather.sql` file within your database, present at the root directory of project.

- After successfull import, `weather` table would be created in the database

    It has following fields:

    - `id (int)` - Primary key for storing all the data
    - `city (varchar)` - User input through API
    - `date (date)` - User input through API
    - `temp (decimal)` - Fetched from openweathermapAPI
    - `created_at (datetime)` - Current date and time

- To configure the DB credentials:
    - Open <PROJECT_DIR>/core/config.php
    - Change the following params as per you requirements:
    ```php
        define('DB_HOST', 'localhost'); // Hostname
        define('DB_USER', 'root'); // Username
        define('DB_PASS', ''); // Database Password
        define('DB_NAME', 'weather_data');// Database Name
    ```

## Usage Instructions ##

- Navigate to url http://<SERVER_HOST>/api/weather/WeatherForecast.php?date=<DATE>&city=<CITY>

    - At the place of <DATE>, use any date in format: 12-03-2021 (d-m-Y format).
    - At the place of <CITY>, use any city name you needed like: Amsterdem
    - When you hit the url city and temperature got added in the database.
    - There are validations added as well
    - If date is not added then an error message shows up
    - If date format is not valid then an error message shows up
    - If city is not added then an error message shows up
    - We have to add proper city name and date format, then only the data is stored in the database

- Or, you may hit the endpoint from any API tools: http://<SERVER_HOST>/api/weather/WeatherForecast.php with follow requet bodies:
    - Use `GET` request as request method
    - Use `date` and `city` request parameters with required values

## Folder Structure ##

- app: all db repositories and interfaces resides here.
    - database - database connection file is stored here.
    - exceptions - Custom exception classes are added here.
    - repositories - all repositories and interfaces are stored here.

- core: core folder contains 
    - bootstrap.php - which will initiate the process
    - config.php - it contains the db info, weather api keys and url and app url
    - messages.php - it contains all the default messages used in the application

- src: weather Api, classes and objects are created in this folder. This folder includes validator and formatter also for validating the result

- tests: - test classes for testing the data

- api: entry point of the application 