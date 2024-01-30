<?php

$messages = $result["data"]['post'];
    
?>

<h1> Post</h1>

<?php
foreach($messages as $message ){

    ?>
   
   <p> <?=$message->getText() ?></p><br>
    
<form action="index.php?ctrl=forum&action=editPostMenu&id=<?=$message->getId()?>"method="post" enctype="multipart/form-data">  

    <input action="index.php?action=editPostMenu&id=<?=$message->getId()?>"  class="button" type="submit" id="submit" value="Edit" name="editCategory" >

</form>

<form action="index.php?ctrl=forum&action=deletePost&id=<?=$message->getId()?>"method="post" enctype="multipart/form-data">
    <input action="index.php?action=deletePost&id=<?=$message->getId()?>"  class="button" type="submit" id="submit" value="Delete" name="editCategory" >
</form>
<br>


    
    
    
    <?php



}
if(App\Session::getUser()){

?>




<form action="index.php?ctrl=forum&action=addPost" method="post" enctype="multipart/form-data">  



<label for="texte">add post</label><br>
                <input  class="inputAdd" type="text" id="" name="topicText" rows="1" cols="50" maxlength="255" >
            
            <input type='hidden' name='topiciD' value="">       

 

    <input action="index.php?action=addTopic"  class="button" type="submit" id="submit" value="Submit" name="add" >

</form>


<?php

}
  
