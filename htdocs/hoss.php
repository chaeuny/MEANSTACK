<?php
  include_once "./config.php";
  include "./db/db_con.php";

  $jb_conn = mysqli_connect( 'localhost', 'root', '', 'hsh' );

    $jb_sql = "SELECT * FROM user";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
   // $jb_row = mysqli_fetch_array( $jb_result );
//if(!isset($jb_row['num'])){
    echo '<table border =1><tr>'.
    		'<th>num</th>'.
    		'<th>id</th>'.
    		'<th>name</th>'.
    		'<th>gender</th>'.
    		'<th>phone</th>'.
    		'<th>email</th>'.
    		'<th>role</th>'.'</tr>';
    while($jb_row = mysqli_fetch_array( $jb_result )) {
    	echo '<tr><td>' . $jb_row['num'] . '</td>' .
                    '<td>' . $jb_row['id'] . '</td>' .
                    '<td>' . $jb_row['name'] . '</td>' .
                    '<td>' . $jb_row['gender'] . '</td>' .
                    '<td>' . $jb_row['phone'] . '</td>' .
                    '<td>' . $jb_row['email'] . '</td>' .
                    '<td>' . $jb_row['role'] . '</td></tr>';
            }
  
    
//}
?>