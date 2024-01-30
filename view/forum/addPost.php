<?php 

$infos= $result["data"]['topic']

?>



<form action="index.php?ctrl=forum&action=addPost" method="post" enctype="multipart/form-data">  



<label for="texte">add topic</label><br>
                <input  class="inputAdd" type="text" id="" name="postText" rows="5" cols="50" >





        <label for="choix">Select Category :</label>
                         <select id="choice" name="topicChoice">
                               
                                <?php
                                        foreach($infos as $info){ ?>       
                                        <option  value="<?=$info->getId()?> "><?=$info->getTitle()?></option>
                                        
                                <?php 
                                }
                                ?>
        

    </select><br>

    <input action="index.php?action=addPost"  class="button" type="submit" id="submit" value="Submit" name="add" >

</form>
