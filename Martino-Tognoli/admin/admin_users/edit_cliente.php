<?php 

if(isset($_GET['c_id'])){
    $the_cliente_id = $_GET['c_id'];
}

$query = "SELECT * FROM clienti WHERE cliente_id = $the_cliente_id";

$select_cliente_da_id = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($select_cliente_da_id)){
    $cliente_id = $row['cliente_id'];
    $cliente_sociale = $row['cliente_sociale'];
    $cliente_p_iva = $row['cliente_p_iva'];
    $cliente_cod_fiscale = $row['cliente_cod_fiscale'];
    $cliente_email = $row['cliente_email'];
    $cliente_telefono = $row['cliente_telefono'];
}

    if(isset($_POST['update_clienti'])){
        
    $cliente_sociale = escape($_POST['cliente_sociale']);
    $cliente_p_iva = escape($_POST['cliente_p_iva']);
    $cliente_cod_fiscale = escape($_POST['cliente_cod_fiscale']);
    $cliente_email = escape($_POST['cliente_email']);
    $cliente_telefono = escape($_POST['cliente_telefono']);


    $query = "UPDATE clienti SET ";
    $query .= "cliente_sociale = '{$cliente_sociale}', ";
    $query .= "cliente_p_iva = '{$cliente_p_iva}', ";
    $query .= "cliente_cod_fiscale = '{$cliente_cod_fiscale}', ";
    $query .= "cliente_email = '{$cliente_email}', ";
    $query .= "cliente_telefono = '{$cliente_telefono}' ";
    $query .= "WHERE cliente_id = {$the_cliente_id}";

    $update_clienti = mysqli_query($conn, $query);

    confirmQuery($update_clienti);

        header("Location: clienti.php");
    }

?>

<form action="" method="post">

    <label for="Ragione sociale">ragione sociale</label>
    <input type="text" value="<?php echo $cliente_sociale; ?>" name="cliente_sociale" >
    <br>

    <label for="Ragione sociale">partita iva</label>
    <input type="text" name="cliente_p_iva" value="<?php echo $cliente_p_iva; ?>"  maxlength="11" >
    <br>
    <label for="Ragione sociale">codice fiscale</label>
    <input type="text" name="cliente_cod_fiscale" value="<?php echo $cliente_cod_fiscale; ?>" maxlength="16" minlength="16">
    <br>
    <label for="Ragione sociale">email</label>
    <input type="email" name="cliente_email" value="<?php echo $cliente_email; ?>">
    <br>
    <label for="Ragione sociale">telefono</label>
    <input type="text" name="cliente_telefono" value="<?php echo $cliente_telefono; ?>">
    <br>


    <button type="submit" name="update_clienti" value="Modifica utente">Modifica cliente</button>


</form>