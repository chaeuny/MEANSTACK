<?php
    $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());

    $number = $_GET['number'];
    $title = $_GET['title'];
    $content = $_GET['content'];

    $date = date('Y-m-d H:i:s');

    $query = "update board set title='$title', content='$content', date='$date' where number=$number";

    //$result = $connect->query($query);
    $result = mysqli_query($connect, $query);

    
    if($result) {
?>
        <script>
            alert("수정되었습니다.");
           location.replace("./view.php?number=<?=$number?>");
        </script>
<?php    }

    else {
        ?>
        <script>
        alert("수정 실패");
        location.replace("./view.php?number=<?=$number?>");
        </script>
        <?php
    }
?>