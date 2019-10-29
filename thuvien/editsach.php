<?php
include_once('config.php');

$masach = $_GET['masach'];
$sql = "SELECT * FROM sach
		WHERE masach = $masach";
$query_sach = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query_sach);
if (isset($_POST['smb'])) {
    $tensach = $_POST['tensach'];
    $namxb = $_POST['namxb'];
    $matheloai = $_POST['matheloai'];
    $sql = "UPDATE sach
			SET tensach = '$tensach' , namxb = '$namxb',matheloai='$matheloai'
			WHERE masach = $masach";
    $query = mysqli_query($conn, $sql);
    header('location:index.php');
}
?>
<form method="post">
    <div class="form-group">
        <label>Tên sách</label>
        <input name="tensach" required placeholder="" value="<?php echo $row['tensach'];?>">
        <label>Năm xuất bản</label>
        <input name="namxb" required placeholder="" value="<?php echo $row['namxb'];?>">
        <label>Thể loại</label>
        <select name="matheloai">
            <?php 
             $sql_theloai = "SELECT * FROM loaisach";
             $query_theloai = mysqli_query($conn, $sql_theloai);
            while ($row = mysqli_fetch_array($query_theloai)) { ?>
            <option value="<?php echo $row['matheloai']; ?>"><?php echo $row['tentheloai']; ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" name="smb" onclick="return confirm('Bạn có muốn thay đổi?');">Sửa sách này</button>
    </div>
</form><hr>