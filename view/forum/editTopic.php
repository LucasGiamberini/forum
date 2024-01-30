<?php

$topic= $result["data"]['topic'];

?>

<h1>edit topic : </h1>

<form action="index.php?ctrl=forum&action=updateTopic&id=<?=$topic->getId()?>" method="post" enctype="multipart/form-data">  




<label for="texte"> topic new name</label><br>
                <input class="inputAdd" type="text" id="" name="updateTopic" value="<?=$topic->getTitle()?>" />
                

                <input action="index.php?ctrl=forum&action=updateTopic&id=<?=$topic->getId()?>"  class="button" type="submit" id="submit" value="Submit" name="update" >
</form>