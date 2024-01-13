<?php
session_start(); 
include("header.php"); 
      include("inc/contact_form.php");
      $contacts = new ContactForm();
      $contact_entries = $contacts->getAllContacts();
?>
<h1>dashboard</h1>
<?php 
    foreach ($contact_entries as $contacts):
?>
<h1><?= $contacts["name"]?></h1>
<p><?= $contacts["email"]?></p>
<p><?= $contacts["message"]?></p>
<p><?= $contacts["submission_date"]?></p>
<hr/>
<?php 
    endforeach;
?>
<?php include("footer.php") ?>
