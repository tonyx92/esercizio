
<?php 

$document_root = $_SERVER["DOCUMENT_ROOT"];


// Se è stato fatto clic su "Logout", distruggi la sessione e reindirizza all'index
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: /Martino-Tognoli/index.php");
    exit();
}

// Il contenuto della pagina per gli amministratori va qui
echo "Benvenuto, admin! Questo è il pannello degli amministratori.";

?>

<form action="" method="post">
    <button type="submit" name="logout">Logout</button>
</form>

<h1 align="center">Tabella clienti</h1>
<table>
    <thead>
        <tr>
          <th>ID</th>
          <th>cliente_sociale</th>
          <th>cliente_p_iva</th>
          <th>cliente_cod_fiscale</th>
          <th>cliente_email</th>
          <th>cliente_telefono</th>  
          <th>Modifica</th>
          <th>Elimina</th>
        </tr>
    </thead>

    <tbody>

<?php 



$query = "SELECT * FROM clienti";

$select_clienti = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($select_clienti)){
    $cliente_id = $row["cliente_id"];
    $cliente_sociale = $row["cliente_sociale"];
    $cliente_p_iva = $row["cliente_p_iva"];
    $cliente_cod_fiscale = $row["cliente_cod_fiscale"];
    $cliente_email = $row["cliente_email"];
    $cliente_telefono = $row["cliente_telefono"];

    echo "<tr>";

        echo "<td>{$cliente_id}</td>";

        echo "<td>{$cliente_sociale}</td>";

        echo "<td>{$cliente_p_iva}</td>";

        echo "<td>{$cliente_cod_fiscale}</td>";

        echo "<td>{$cliente_email}</td>";

        echo "<td>{$cliente_telefono}</td>";

        echo "<td><a href='clienti.php?source=edit_cliente&c_id={$cliente_id}'>Modifica</a></td>";

        echo "<td><a href='clienti.php?delete={$cliente_id}' style='color: red;'>Elimina</a></td>";

        

    echo "</tr>";
}

?>

    </tbody>
</table>



<?php 


if(isset($_GET['delete'])){
   $the_cliente_id = $_GET['delete'];
   $query = "DELETE FROM clienti WHERE cliente_id = ?";
   $stmt = mysqli_prepare($conn, $query);
   mysqli_stmt_bind_param($stmt, "i", $the_cliente_id);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   
   header("Location: clienti.php");
}

?>