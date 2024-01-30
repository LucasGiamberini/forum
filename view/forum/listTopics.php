<?php

$topics = $result["data"]['topics'];// donner recuperer depuis la function topicBycategory de Forum controller ligne 156
 $category = $result["data"]['category'];   // donner recuperer depuis la function topicBycategory de Forum controller ligne 157
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){

    ?>
        <a href="index.php?ctrl=forum&action=postTopic&id=<?=$topic->getId()?>" > <?=$topic->getTitle() ?></a><br>
 
<?php

if(App\Session::getUser()){// permet de ne pas afficher les boutons si aucun utilisateur est connecter

?>
<form action="index.php?ctrl=forum&action=editTopicMenu&id=<?=$topic->getId()?>"method="post" enctype="multipart/form-data">  

    <input action="index.php?action=editTopicMenu&id=<?=$topic->getId()?>"  class="button" type="submit" id="submit" value="Edit" name="editCategory" >

</form>

<form action="index.php?ctrl=forum&action=deleteTopic&id=<?=$topic->getId()?>"method="post" enctype="multipart/form-data">
    <input action="index.php?action=deleteTopic&id=<?=$topic->getId()?>"  class="button" type="submit" id="submit" value="Delete" name="editCategory" >
</form>
<br>


    <?php
}
}
$userID=App\Session::getUser()->getID();// pour recuperer l'id de user quand un user est connecter

if(App\Session::getUser()){// permet de ne pas afficher les boutons si aucun utilisateur est connecter
?>





<form action="index.php?ctrl=forum&action=addTopic" method="post" enctype="multipart/form-data">  



<label for="texte">add topic</label><br>
                <input  class="inputAdd" type="text" id="" name="topicTitle" rows="1" cols="50" maxlength="255" >
            
            <input type='hidden' name='categoryiD' value= <?= $category->getId() ?> >      
            <input type='hidden' name='userID' value= <?= $userID ?> >
            

            <textarea  name='message'>
</textarea>
 
    <input action="index.php?action=addTopic"  class="button" type="submit" id="submit" value="Submit" name="add" >

</form>


<?php

}


  
