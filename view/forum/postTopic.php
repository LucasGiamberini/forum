<?php

$messages = $result["data"]['post'];
$topic = $result["data"] ['topic'];   

?>

<h1> Post</h1>

<?php
foreach($messages as $message ){

    ?>
   
   <p> <?=$message->getText() ?></p><br>
   
   
<?php

var_dump($message);
//var_dump(App\Session::getUser()->getId() == $message->getUserId());
if(App\Session::getUser()->getId() == $message->getId()){

?>


<form action="index.php?ctrl=forum&action=editPostMenu&id=<?=$message->getId()?>"method="post" enctype="multipart/form-data">  

    <input action="index.php?action=editPostMenu&id=<?=$message->getId()?>"  class="button" type="submit" id="submit" value="Edit" name="editCategory" >

</form>

<form action="index.php?ctrl=forum&action=deletePost&id=<?=$message->getId()?>"method="post" enctype="multipart/form-data">
    <input action="index.php?action=deletePost&id=<?=$message->getId()?>"  class="button" type="submit" id="submit" value="Delete" name="editCategory" >
</form>
<br>


    
    
    
    <?php

}

}
$topicId=$topic->getId();
$userId=App\Session::getUser()->getId();

if(App\Session::getUser()){


?>




<form action="index.php?ctrl=forum&action=addPost" method="post" enctype="multipart/form-data">  



<label for="texte">add post</label><br>
                <textarea class="inputAdd" type="text" id="" name="postText" rows="5" cols="50" maxlength="255" >
</textarea>
            <input type='hidden' name='topicId' value=<?= $topicId ?> > 
            <input type='hidden' name='userId'  value=<?= $userId ?> >
 
 
    <input action="index.php?action=addTopic"  class="button" type="submit" id="submit" value="Submit" name="add" >

</form>


<?php

}
  
