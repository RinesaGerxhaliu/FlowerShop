<?php
session_start(); 
include("header.php"); 
      include("inc/contact_form.php");
      $contacts = new ContactForm();
      $contact_entries = $contacts->getAllContacts();
?>
   
   <h1 class="titulli">dashboard</h1>
<?php 
    foreach ($contact_entries as $contacts):
?>

    
    <div class="permbjtja-dashboard">
        <h1 class="emri"><?= $contacts["name"]?></h1>
        <p class="permbajtja"><?= $contacts["email"]?></p>
        <p class="permbajtja"><?= $contacts["message"]?></p>
        <p class="permbajtja"><?= $contacts["submission_date"]?></p>
    </div>
        
<hr class="hr"/>
<?php 
    endforeach;
?>
<?php include("footer.php") ?>
