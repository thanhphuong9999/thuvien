<?php
include("config.php");
?>

<form action="" method="get">
    Search: <input type="text" name="search" />
<button type="submit" name="submit">Search</button>
</form>
<button type="submit" name="smb"><a href="index.php">Back</a></button>
<table>
    <tr>
        <th>Tên sách</th>
        <th>Năm XB</th>
        <th>Mã thể loại</th>
    </tr>
</table>
<?php
    if (isset( $_GET['submit']) && $_GET["search"] != '') {
        $search = $_GET['search'];
        $query = "SELECT * FROM sach WHERE (tensach like '%$search%') OR (namxb like '%$search%') OR (matheloai like '%$search%')";
     
        $sql = mysqli_query($conn, $query);
        $num = mysqli_num_rows($sql);
        if ($num > 0) {
             //echo $num." ket qua tra ve voi tu khoa <b>".$search."</b>";
            echo '<table border="1" cellspacing="0" cellpadding="10">';
            foreach( $sql as $row ) {
                echo '<tr>';
                    echo "<td>{$row['tensach']}</td>";
                    echo "<td>{$row['namxb']}</td>";
                    echo "<td>{$row['matheloai']}</td>";
                echo '</tr>';
            }
                echo '</table>';
        } 
        else {
                echo "Khong tim thay ket qua!";
        }
    }
?>
