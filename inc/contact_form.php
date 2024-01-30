<?php
include("db_connection.php");

class ContactForm
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function handleFormSubmission()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            $this->insertIntoDatabase($name, $email, $message);
        }
    }

    private function insertIntoDatabase($name, $email, $message)
    {
        $sql = "INSERT INTO contact_form_entries (name, email, message) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo 'Form submitted successfully!';
        } else {
            echo "Error submitting form. Please try again later.";
        }

        $stmt->close();
    }

    public function getAllContacts()
    {
        $sql = "SELECT * FROM contact_form_entries";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }
    public function deleteContact($contactId)
    {
        $sql = "DELETE FROM contact_form_entries WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $contactId);

        if ($stmt->execute()) {
            header("Location: dashboard.php");

        } else {
            echo "Error deleting contact. Please try again later.";
        }

        $stmt->close();
    }

}
?>