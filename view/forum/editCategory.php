<?php

$category= $result["data"]['category'];

?>

<h1>edit category : </h1>

<form action="index.php?ctrl=forum&action=updateCategory&id=<?=$category->getId()?>" method="post" enctype="multipart/form-data">  




<label for="texte"> Nouveau nom de la categorie</label><br>
                <input class="inputAdd" type="text" id="" name="updateCategory" value="<?=$category->getCategoryName()?>" />
                

                <input action="index.php?ctrl=forum&action=updateCategory&id=<?=$category->getId()?>"  class="button" type="submit" id="submit" value="Submit" name="update" >
</form>