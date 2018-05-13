<?php

class DatabaseConnection {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'slimapp';
    private $connection;
    
    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbName};charset=utf8", $this->username, $this->password,
                                        [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            echo '{
                "error": {"text": ' . $e->getMessage() . '}
                }';
        }
    }

    public function getAllUsers()
    {
        $query = $this->connection->query('SELECT * FROM customers');
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUser(int $id)
    {
        $query = $this->connection->prepare('SELECT * FROM customers WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addUser(Customer $customer)
    {
        $query = $this->connection->prepare('INSERT INTO customers VALUES(NULL, :first_name,
                                            :last_name, :phone_number, :email, :address, :city, 
                                            :voivodeship)');
        $query->bindParam(':first_name',   $customer->first_name);
        $query->bindParam(':last_name',    $customer->last_name);
        $query->bindParam(':phone_number', $customer->phone_number);
        $query->bindParam(':email',        $customer->email);
        $query->bindParam(':address',      $customer->address);
        $query->bindParam(':city',         $customer->city);
        $query->bindParam(':voivodeship',  $customer->voivodeship);

        echo $customer->phone_number;

        $query->execute();
    }
}

?>