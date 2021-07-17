<?php

/**
 * Class Database
 */
Class Database
{
    /**
     * @var PDO
     */
    public static $con;

    public function __construct()
    {
        try {
            $db_data = DB_DATA['type'] . ':host=' . DB_DATA['host'] . ';dbname=' . DB_DATA['database'];
            self::$con = new PDO($db_data, DB_DATA['user'], DB_DATA['password']);
            return self::$con;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @return Database|PDO
     */
    public static function getInstance()
    {
        if (self::$con)
        {
            return self::$con;
        }

        return new self();
    }

    /**
     * @param $query
     * @param array $data
     * @return array|false
     * read from database
     */
    public function read($query, $data = array())
    {
        $stm = self::$con->prepare($query);
        $result = $stm->execute($data);

        if ($result)
        {
            $data = $stm->fetchAll(PDO::FETCH_OBJ);

            if (is_array($data) && count($data) > 0)
            {
                return $data;
            }
        }

        return false;
    }

    /**
     * @param $query
     * @param array $data
     * @return bool
     * write to database
     */
    public function write($query, $data = array()) : bool
    {
        $stm = self::$con->prepare($query);
        $result = $stm->execute($data);

        if ($result) return true;

        return false;
    }

}