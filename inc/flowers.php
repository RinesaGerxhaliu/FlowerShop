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
public function getFlowerById($flowerId)
    {
        $sql = "SELECT * FROM flowers WHERE flower_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $flowerId);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $flower = $result->fetch_assoc();
                return $flower;
            } else {
                return null; 
            }
        } else {
            return null; 
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
    public function addFlower($flowerName, $price, $image, $userId, $category)
    {
        $sql = "INSERT INTO flowers (flower_name, price, image, addedbyuser, category) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sdsis", $flowerName, $price, $image, $userId, $category);

        return $stmt->execute();
    }

    public function updateFlower($flowerId, $flowerName, $price, $image, $category)
    {
        $sql = "UPDATE flowers SET flower_name = ?, price = ?, image = ?, category = ? WHERE flower_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sdsis", $flowerName, $price, $image, $flowerId, $category);

        return $stmt->execute();
    }

    public function deleteFlower($flowerId)
    {
        $sql = "DELETE FROM flowers WHERE flower_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $flowerId);
    
        if ($stmt->execute()) {
            header("Location: dashboard.php");

        } else {
            echo "Error deleting flower: " . $stmt->error;
        }
    }
    public function getFlowersByUserId($userId)
    {
        $sql = "SELECT * FROM flowers WHERE addedbyuser = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }
    public function getFlowersByCategory($category)
    {
        $sql = "SELECT * FROM flowers WHERE category = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }
}

?>