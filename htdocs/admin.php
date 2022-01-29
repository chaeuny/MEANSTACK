<?php
  include_once "./config.php";
  include "./db/db_con.php";
  error_reporting(0);
  ?>


<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <?php include_once "./fragments/head.php";?>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
      table {
        width: 100%;
      }
      th, td {
        padding: 10px;
        border-bottom: 1px solid #dadada;
        text-align: center;
      }
      a { 
        color: black;
      }
      a:hover{
        background-color: powderblue;
    transition: background-color .5s;
      }
    </style>
  </head>
  <body> 
    <!-- 표준 네비게이션 바 (화면 상단에 위치, 화면에 의존하여 확대 및 축소) -->
    <nav class="navbar navbar-default">
      <?php include_once "./fragments/header.php";?>
    </nav>
    <br>
    <h1 align="center"> 사용자 관리 _ Admin <br><br></h1> <hr>
    <table>
      <thead>
        <tr>
          <th>User_no</th>
          <th>ID</th>
          <th>name</th>
          <th>gender</th>
          <th>phone</th>
          <th>Email</th>
          <th>role</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
              </thead>
         <tbody>
        <?php
     $jb_conn = mysqli_connect( 'localhost', 'root', '', 'hsh' );
  
      $delete_emp_no = $_POST[ 'delete_emp_no' ];
          if ( isset( $delete_emp_no ) ) {
            $jb_sql_delete = "DELETE FROM user WHERE num = '$delete_emp_no';";
            mysqli_query( $jb_conn, $jb_sql_delete );
            echo '<p style="color: red;">User_no ' . $delete_emp_no . ' is deleted.</p>';
          }
          $jb_sql = "SELECT * FROM user;";
          $jb_result = mysqli_query( $jb_conn, $jb_sql );

?><?php
        while($jb_row = mysqli_fetch_array( $jb_result )) {

   $jb_edit = '
              <form action="admin_edit.php" method="POST">
                <input type="hidden" name="edit_emp_no" value="' . $jb_row[ 'num' ] . '">
                <input type="submit" value="Edit">
              </form>
            ';


         $jb_delete = '
              <form action="admin.php" method="POST">
                <input type="hidden" name="delete_emp_no" value="' . $jb_row[ 'num' ] . '">
                <input type="submit" value="Delete">
              </form>
            '
            ;    


         echo '<tr><td>' . $jb_row['num'] . '</td>' .
                    '<td>' . $jb_row['id'] . '</td>' .
                    '<td>' . $jb_row['name'] . '</td>' .
                    '<td>' . $jb_row['gender'] . '</td>' .
                    '<td>' . $jb_row['phone'] . '</td>' .
                    '<td>' . $jb_row['email'] . '</td>' .
                    '<td>' . $jb_row['role'] . '</td>'.
                    '<td>' . $jb_edit . '</td>'.
                    '<td>' . $jb_delete  . '</td></tr>';

          }
          
            ?>
      </tbody>
    </table>
  </body>
</html>