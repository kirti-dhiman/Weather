<?php namespace App\Repositories;

use App\Repositories\WeatherInterface;
use System\Database\DBConnection;
use App\Exceptions\DataNotFoundException ;
use App\Exceptions\DataNotAddedException;

class WeatherRepository implements WeatherInterface
{
    protected $connection;
    protected $table = 'weather';
    public function __construct()
    {
        $this->connection = new DBConnection();
        $this->notFoundexception = new DataNotFoundException();
        $this->notAddedException = new DataNotAddedException();		
    }

    /**
     *
     * To add weather data from openWeatheMap API
     *
     * @param  array $data
     * @return void
     *
     */
    public function addWeatherRecord($data): void
    {
        try {
            $stmt = $this->connection->getConnection()->prepare("INSERT INTO $this->table (city, date, temp, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$data->name, date("Y-m-d"), $data->main->temp, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            $stmt = null;
        } catch(DataNotAddedException $e) {
            echo $e->errorMessage(); 
        }
    }

    /**
     *
     * To check whether the data is already present or not in DB
     *
     * @param  string  $city
     * @param  string  $date
     * @return array
     *
    */
    public function fetchCachedRecords($city, $date) 
    {
       try {
            $stmt = $this->connection->getConnection()->prepare("SELECT * FROM $this->table WHERE city = ? && date = ? Order By id DESC");
            $stmt->execute([$city, $date]);
            $arr = $stmt->fetch();
            return $arr;
        } catch(DataNotFoundException $e) {
            echo $e->errorMessage();   
        }
    }
}
