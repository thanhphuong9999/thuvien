<?php
include_once('config.php');
if (isset($_POST['smb'])) {
    $tensach = $_POST['tensach'];
    $namxb = $_POST['namxb'];
    $matheloai = $_POST['matheloai'];
    $sql = "INSERT INTO sach(matheloai,tensach,namxb)
            VALUES('$matheloai','$tensach','$namxb')";
    $query = mysqli_query($conn, $sql);
   
    header('location:index.php');
}
?>
<form method="post">
    <div class="form-group">
        <label>Tên sách</label>
        <input name="tensach" required placeholder="">
        <label>Năm xuất bản</label>
        <input name="namxb" required placeholder="">
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
    <button type="submit" name="smb">Thêm mới</button>
    </div>
</form>
<hr>