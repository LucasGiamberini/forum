<?php

$categorys= $result["data"]['category'];

?>

<h1>list category </h1>
<?php
foreach($categorys as $category){

?>

<a href="index.php?ctrl=forum&action=topicByCategory&id=<?=$category->getId()?>" > <?=$category->getCategoryName() ?></a>
<form action="index.php?ctrl=forum&action=editCategoryMenu&id=<?=$category->getId()?>"method="post" enctype="multipart/form-data">  

<?php
if(App\Session::getUser()){
?>
<input action="index.php?action=editCategoryMenu&id=<?=$category->getId()?>"  class="button" type="submit" id="submit" value="Edit" name="editCategory" >

</form>
<form action="index.php?ctrl=forum&action=deleteCategory&id=<?=$category->getId()?>"method="post" enctype="multipart/form-data">
<input action="index.php?action=deleteCategory&id=<?=$category->getId()?>"  class="button" type="submit" id="submit" value="Delete" name="editCategory" >
</form>
<br>


    <?php
}
}


?>



