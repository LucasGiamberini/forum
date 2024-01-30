

<form action ="../../index.php?ctrl=security&action=register" method='POST'>

    <h1> Inscription</h1>

    <label>Pseudo</label>
    <input type="text" name="pseudoRegister" required ><!--  voir Security controler      !-->

    <label>Mot de passe</label>
    <input type="password" name="passwordRegister" required >

    <label> confirmer mot de passe </label>
    <input type="password" name="passwordConfirm"  required>


    <input type="submit" Value="Register">

</form>