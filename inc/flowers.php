<?php
class Flower
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getAllFlowers()
    {
        $sql = "SELECT * FROM flowers";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    public function getFirstFourFlowers()
    {
        $sql = "SELECT * FROM flowers LIMIT 4";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }
}

?>