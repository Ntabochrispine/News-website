<?php

// Database class to handle connection, read and write operations

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "news_website";

    // Handles database connection
    private function connect()
    {
        $connection = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->db
        );

        // Check if connection failed
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        return $connection;
    }

    // Handles read operations
    public function read($query)
    {
        $conn = $this->connect();

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        mysqli_close($conn);

        return $data;
    }

    // Handles write operations
    public function save($query)
    {
        $conn = $this->connect();

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        mysqli_close($conn);

        return true;
    }
}