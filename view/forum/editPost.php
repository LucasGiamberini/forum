<?php

$post= $result["data"]['post'];

?>

<h1>edit post : </h1>

<form action="index.php?ctrl=forum&action=updatePost&id=<?=$post->getId()?>" method="post" enctype="multipart/form-data">  




<label for="texte"> modify post</label><br>
                <input class="inputAdd" type="text" id="" name="updatePost" value="<?=$post->getText()?>" />
                

                <input action="index.php?ctrl=forum&action=updatePost&id=<?=$post->getId()?>"  class="button" type="submit" id="submit" value="Submit" name="update" >
</form>