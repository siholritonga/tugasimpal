<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    require 'ssp.class.php';

    // nama table
    $table = 'tbapotek';

    // Table's primary key
    $primaryKey = 'id';

    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes

    $columns = array(
        array('db' => 'id', 'dt' => 'id'),
        array('db' => 'nama', 'dt' => 'nama'),
        array('db' => 'kategori', 'dt' => 'kategori'),
        array('db' => 'umur', 'dt' => 'umur'),
        array('db' => 'jenis', 'dt' => 'jenis'),
        array('db' => 'alamat', 'dt' => 'alamat'),
        array('db' => 'nohp', 'dt' => 'nohp'),
        array('db' => 'id', 'dt' => 'rekam', 'formatter' => function( $d ) {
              $enc = base64_encode($d);
              return '<span class="badge"><a style="text-decoration:none; color:white" href="rekam.php?id='.$enc.'"><span class="glyphicon glyphicon-list-alt"></span></a></span>
              &nbsp;&nbsp;&nbsp; <span class="badge"><a style="text-decoration:none; color:white" href="edit.php?id='.$enc.'"><span class="glyphicon glyphicon-edit"></span></a></span>
              &nbsp;&nbsp;&nbsp; <span class="badge"><a id="alert" style="text-decoration:none; color:white" href="del.php?id='.$enc.'"><span class="glyphicon glyphicon-trash"></span></a></span>';
            }
        )
    );

    // SQL server connection information
    $sql_details = array(
        'user' => 'root',
        'pass' => '',
        'db' => 'apotek',
        'host' => 'localhost'
    );


    echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    );
} else {
    echo '<script>window.location="404.html"</script>';
}
?>
