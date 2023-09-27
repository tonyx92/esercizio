<?php

if(isset($_POST["create_cliente"])){
// Recupera i dati dalla form


//primo gruppo
$cliente_sociale = $_POST['cliente_sociale'];
$cliente_p_iva = $_POST['cliente_p_iva'];
 $cliente_cod_fiscale = $_POST['cliente_cod_fiscale'];
$cliente_email = $_POST['cliente_email'];
$cliente_telefono = $_POST['cliente_telefono'];

// Inserisci i dati del cliente nel database
$sql_cliente = "INSERT INTO clienti (cliente_sociale, cliente_p_iva, cliente_cod_fiscale, cliente_email, cliente_telefono)
                VALUES ('$cliente_sociale', '$cliente_p_iva', '$cliente_cod_fiscale', '$cliente_email', '$cliente_telefono')";


//aggiungo sucessivamente id cliente per le prossime form
if ($conn->query($sql_cliente) === TRUE) {
    $cliente_id = $conn->insert_id;

}



//secondo gruppo
   // Recupera i dati dell'indirizzo di fatturazione dalla form
    $fattura_recapito = $_POST['fattura_recapito'];
    $fattura_nazione = $_POST['fattura_nazione'];
    $fattura_citta = $_POST['fattura_citta'];
    $fattura_provincia = $_POST['fattura_provincia'];
    $fattura_cap = $_POST['fattura_cap'];
    

    // Inserisci l'indirizzo di fatturazione nel database
    $sql_fattura = "INSERT INTO fattura (fattura_cliente_id, fattura_recapito, fattura_nazione, fattura_citta, fattura_provincia, fattura_cap)
                        VALUES ('$cliente_id', '$fattura_recapito', '$fattura_nazione', '$fattura_citta', '$fattura_provincia', '$fattura_cap')";


        //aggiungo sucessivamente id fattura per le prossime form
        if ($conn->query($sql_fattura) === TRUE) {
                $fattura_id = $conn->insert_id;
        }



//terzo gruppo
    // Recupera i dati degli indirizzi dalla form
    //$indirizzo_counter = $_POST['indirizzo_counter'];
    $indirizzo_nome = $_POST['indirizzo_nome'];
    $indirizzo_nazione = $_POST['indirizzo_nazione'];
    $indirizzo_citta = $_POST['indirizzo_citta'];
    $indirizzo_provincia = $_POST['indirizzo_provincia'];
    $indirizzo_cap = $_POST['indirizzo_cap'];
    

    // Inserisci gli indirizzi nel database
//     if (!empty($indirizzo_nome)) {
//         foreach ($indirizzo_nome as $key => $nome) {
//             $nazione = $indirizzo_nazione[$key];
//             $citta = $indirizzo_citta[$key];
//             $provincia = $indirizzo_provincia[$key];
//             $cap = $indirizzo_cap[$key];

//             $sql_indirizzo = "INSERT INTO indirizzi (indirizzo_cliente_id, indirizzo_nome, indirizzo_nazione, indirizzo_citta, indirizzo_provincia, indirizzo_cap)
//                             VALUES ('$cliente_id', '$nome', '$nazione', '$citta', '$provincia', '$cap')";

             //aggiungo sucessivamente id indirizzo per le prossime form
    //  if ($conn->query($sql_indirizzo) === TRUE) {
    //      $indirizzo_id = $conn->insert_id;
    //      }
    //      // Aggiungo la foreign keys cliente_fattura_id 
    //      $sql_cliente = "UPDATE clienti SET cliente_fattura_id = '$fattura_id' WHERE cliente_id = '$cliente_id'";
        
    //      if ($conn->query($sql_cliente) !== TRUE) {
    //              echo "Errore nell'inserimento degli indirizzi: " . $conn->error;
    //          }

    //     $sql_fattura = "UPDATE fattura SET fattura_indirizzo_id = '$indirizzo_id' WHERE fattura_id = '$fattura_id'";

    //     if ($conn->query($sql_fattura) !== TRUE) {
    //             echo "Errore nell'inserimento degli indirizzi: " . $conn->error;
    //         }
//     }

    

//     echo "Dati inseriti con successo nel database.";
// } else {
//     echo "Errore nell'inserimento dei dati del cliente: " . $conn->error;
// }
    for ($i = 0; $i < count($indirizzo_nome); $i++) {
        $nome = $indirizzo_nome[$i];
        $nazione = $indirizzo_nazione[$i];
        $citta = $indirizzo_citta[$i];
        $provincia = $indirizzo_provincia[$i];
        $cap = $indirizzo_cap[$i];

    $sql_indirizzo = "INSERT INTO indirizzi (indirizzo_cliente_id, indirizzo_nome, indirizzo_nazione, indirizzo_citta, indirizzo_provincia, indirizzo_cap)
                    VALUES ('$cliente_id', '$nome', '$nazione', '$citta', '$provincia', '$cap')";

     //aggiungo sucessivamente id indirizzo per le prossime form
     if ($conn->query($sql_indirizzo) === TRUE) {
        $indirizzo_id = $conn->insert_id;
        }
        // Aggiungo la foreign keys cliente_fattura_id 
        $sql_cliente = "UPDATE clienti SET cliente_fattura_id = '$fattura_id' WHERE cliente_id = '$cliente_id'";
       
        if ($conn->query($sql_cliente) !== TRUE) {
                echo "Errore nell'inserimento degli indirizzi: " . $conn->error;
            }

       $sql_fattura = "UPDATE fattura SET fattura_indirizzo_id = '$indirizzo_id' WHERE fattura_id = '$fattura_id'";

       if ($conn->query($sql_fattura) !== TRUE) {
               echo "Errore nell'inserimento degli indirizzi: " . $conn->error;
           }
}


}



?>



<h1>Registrazione Cliente</h1>
<form action="" method="post">
    <!-- Campi per i dati del cliente -->
    <label for="cliente_sociale">Ragione Sociale:</label><br>
    <input type="text" id="cliente_sociale" name="cliente_sociale" required><br>

    <label for="cliente_p_iva">Partita IVA (11 caratteri):</label><br>
    <input type="text" id="cliente_p_iva" name="cliente_p_iva"  maxlength="11" minlength="11" required><br>

    <label for="cliente_cod_fiscale">Codice Fiscale (16 caratteri):</label><br>
    <input type="text" id="cliente_cod_fiscale" name="cliente_cod_fiscale"  maxlength="16" minlength="16" required><br>

    <label for="cliente_email">Email:</label><br>
    <input type="email" id="cliente_email" name="cliente_email" required><br>

    <label for="cliente_telefono">Telefono:</label><br>
    <input type="text" id="cliente_telefono" name="cliente_telefono" required><br>

    <!-- Indirizzo di Fatturazione -->
    <h2>Indirizzo di Fatturazione</h2>
    <label for="fattura_cliente">Indirizzo:</label><br>
    <input type="text" id="fattura_recapito" name="fattura_recapito" required><br>

    <label for="fattura_indirizzo">Nazione:</label><br>
    <input type="text" id="fattura_nazione" name="fattura_nazione" required><br>

    <label for="fattura_citta">Città:</label><br>
    <input type="text" id="fattura_citta" name="fattura_citta" required><br>

    <label for="fattura_provincia">Provincia:</label><br>
    <input type="text" id="fattura_provincia" name="fattura_provincia" required><br>

    <label for="fattura_cap">CAP:</label><br>
    <input type="text" id="fattura_cap" name="fattura_cap" required><br>

    <!-- Indirizzi di Spedizione -->
    <h2>Indirizzi di Spedizione</h2>
    <div id="indirizzi_spedizione">
        <div class="indirizzo_spedizione">
        
        
            <label for="indirizzo_nome[]">Via:</label><br>
            <input type="text" id="indirizzo_nome[]" name="indirizzo_nome[]" required><br>

            <label for="indirizzo_nazione[]">Nazione:</label><br>
            <input type="text" id="indirizzo_nazione[]" name="indirizzo_nazione[]"  required><br>

            <label for="indirizzo_citta[]">Città:</label><br>
            <input type="text" id="indirizzo_citta[]" name="indirizzo_citta[]"  required><br>

            <label for="indirizzo_provincia[]">Provincia:</label><br>
            <input type="text" id="indirizzo_provincia[]" name="indirizzo_provincia[]"  required><br>

            <label for="indirizzo_cap[]">CAP:</label><br>
            <input type="text" id="indirizzo_cap[]" name="indirizzo_cap[]"  required><br>
        </div>
    </div>

    <button type="button" onclick="aggiungiIndirizzo()">Aggiungi Indirizzo di Spedizione</button><br>

    <input type="submit" value="Registrati" name="create_cliente">
</form>

<script>

    
        function aggiungiIndirizzo() {
    var container = document.getElementById('indirizzi_spedizione');
    var nuovoIndirizzo = document.createElement('div');
    nuovoIndirizzo.classList.add('indirizzo_spedizione');

    nuovoIndirizzo.innerHTML = `
        <label for="indirizzo_nome[]">Via:</label>
        <input type="text" name="indirizzo_nome[]" required><br>

        <label for="indirizzo_nazione[]">Nazione:</label>
        <input type="text" name="indirizzo_nazione[] " required><br>

        <label for="indirizzo_citta[]">Città:</label>
        <input type="text" name="indirizzo_citta[] " required><br>

        <label for="indirizzo_provincia[]">Provincia:</label>
        <input type="text" name="indirizzo_provincia[] " required><br>

        <label for="indirizzo_cap[]">CAP:</label>
        <input type="text" name="indirizzo_cap[] " required><br>
    `;

    container.appendChild(nuovoIndirizzo);
    
}

</script>



<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1, h2 {
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px;
    background-color: #008CBA;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #005F6B;
}

.indirizzo_spedizione {
    border: 1px solid #ccc;
    padding: 10px;
    margin-top: 10px;
}
</style>












<!-- <?php


// Assumiamo che $conn sia la tua connessione al database

// if(isset($_POST["create_cliente"])){
//     // Dati del cliente
//     $cliente_sociale = escape($_POST['cliente_sociale']);
//     $cliente_p_iva = escape($_POST['cliente_p_iva']);
//     $cliente_cod_fiscale = escape($_POST['cliente_cod_fiscale']);
//     $cliente_email = escape($_POST['cliente_email']);
//     $cliente_telefono = escape($_POST['cliente_telefono']);
//     $fattura_contenuto = escape($_POST['fattura_contenuto']);

//     // Inserimento del cliente
//     $query_cliente = "INSERT INTO clienti (cliente_fattura_id, cliente_fattura, cliente_sociale, cliente_p_iva, cliente_cod_fiscale, cliente_email, cliente_telefono)
//                       VALUES (0, '$fattura_contenuto', '$cliente_sociale', '$cliente_p_iva', '$cliente_cod_fiscale', '$cliente_email', '$cliente_telefono')";

//     if(mysqli_query($conn, $query_cliente)){
//         // Recupera l'ID del cliente appena inserito
//         $cliente_id = mysqli_insert_id($conn);

//         // Inserimento dell'indirizzo di fatturazione
//         $query_fattura = "INSERT INTO fattura (fattura_cliente_id, fattura_cliente, fattura_contenuto)
//                           VALUES ('$cliente_id', '$cliente_sociale', '$fattura_contenuto')";

//         if(mysqli_query($conn, $query_fattura)){
//             // Inserimento degli indirizzi di spedizione
//             $indirizzoCounter = 1;

//             while (isset($_POST["indirizzo_nome_$indirizzoCounter"])) {
//                 $indirizzo_nome = escape($_POST["indirizzo_nome_$indirizzoCounter"]);
//                 $indirizzo_nazione = escape($_POST["indirizzo_nazione_$indirizzoCounter"]);
//                 $indirizzo_citta = escape($_POST["indirizzo_citta_$indirizzoCounter"]);
//                 $indirizzo_provincia = escape($_POST["indirizzo_provincia_$indirizzoCounter"]);
//                 $indirizzo_cap = escape($_POST["indirizzo_cap_$indirizzoCounter"]);

//                 $query_indirizzo = "INSERT INTO indirizzi (indirizzo_cliente_id, indirizzo_cliente, indirizzo_nome, indirizzo_nazione, indirizzo_citta, indirizzo_provincia, indirizzo_cap)
//                                     VALUES ('$cliente_id', '$cliente_sociale', '$indirizzo_nome', '$indirizzo_nazione', '$indirizzo_citta', '$indirizzo_provincia', '$indirizzo_cap')";

//                 if(!mysqli_query($conn, $query_indirizzo)){
//                     echo "Errore durante l'inserimento dell'indirizzo di spedizione: " . mysqli_error($conn);
//                 }

//                 $indirizzoCounter++;
//             }

//             echo "Cliente e indirizzi creati!";
//         }
//         else{
//             echo "Errore durante l'inserimento dell'indirizzo di fatturazione: " . mysqli_error($conn);
//         }
//     }
//     else{
//         echo "Errore durante l'inserimento del cliente: " . mysqli_error($conn);
//     }
// }
?>





<div class="container">
        <h1 class="text-center mt-5">Registrazione cliente</h1>

<br>
<br>





<form action="" method="post">


<div class="mb-3">
        <label for="Ragione sociale" class="form-label">ragione sociale</label><br>
        <input type="text" name="cliente_sociale"><br>
        <br>
</div>
<div class="mb-3">
        <label for="Ragione sociale">partita iva</label><br>
        <input type="text" name="cliente_p_iva" maxlength="11" ><br>
        <br>
</div>
<div class="mb-3">
        <label for="Ragione sociale">codice fiscale</label><br>
        <input type="text" name="cliente_cod_fiscale" maxlength="16" ><br>
        <br>
</div>
<div class="mb-3">
        <label for="Ragione sociale">email</label><br>
        <input type="email" name="cliente_email"><br>
        <br>
</div>
<div class="mb-3">
        <label for="Ragione sociale">telefono</label><br>
        <input type="text" name="cliente_telefono"><br>
        <br>
</div>
<div class="mb-3">
        <label for="fattura_contenuto">Indirizzo di Fatturazione</label><br>
        <input type="text" name="fattura_contenuto" required><br>
        <br>
    </div>
</div>
<div class="mb-3">
    <<div class="form-group">
                <div id="indirizzi">
                     Qui vengono inseriti dinamicamente gli indirizzi di spedizione -->
                <!-- </div>
            </div>

            <button type="button" class="btn btn-primary mb-3" onclick="addIndirizzo()">Aggiungi indirizzo di spedizione</button>

            <button type="submit" class="btn btn-primary" name="create_cliente" value="Aggiungi utente">Aggiungi cliente</button>
        </form>
    </div>

    <script>
        // let indirizzoCounter = 1;

        // function addIndirizzo() {
        //     const indirizziDiv = document.getElementById('indirizzi');

        //     const indirizzoFields = `

        //     <div class="container">
        //         <h3>Indirizzo di Spedizione ${indirizzoCounter}</h3><br><br>
        //         <label for="indirizzo_nome_${indirizzoCounter}">Nome Indirizzo</label><br>
        //         <input type="text" name="indirizzo_nome_${indirizzoCounter}" required><br>
        //         <br>

        //         <label for="indirizzo_nazione_${indirizzoCounter}">Nazione</label><br>
        //         <input type="text" name="indirizzo_nazione_${indirizzoCounter}" required><br>
        //         <br>

        //         <label for="indirizzo_citta_${indirizzoCounter}">Città</label><br>
        //         <input type="text" name="indirizzo_citta_${indirizzoCounter}" required>
        //         <br>

        //         <label for="indirizzo_provincia_${indirizzoCounter}">Provincia</label><br>
        //         <input type="text" name="indirizzo_provincia_${indirizzoCounter}" required><br>
        //         <br>

        //         <label for="indirizzo_cap_${indirizzoCounter}">CAP</label><br>
        //         <input type="text" name="indirizzo_cap_${indirizzoCounter}" required><br>
        //         <br><br>
        //         </container>
        //     `;

        //     indirizziDiv.insertAdjacentHTML('beforeend', indirizzoFields);
        //     indirizzoCounter++;
        // } 
    </script> --->


