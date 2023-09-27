
<?php 

include "./include/admin_header.php";




if(isset($_GET['source'])){
    $source = $_GET['source'];
}else{
    $source='';
}

switch($source){
    case 'edit_cliente': 
        include "admin_users/edit_cliente.php";
        break;

    default: 
        include "admin_users/admin_view_all_clienti.php";
        break;
}



?>