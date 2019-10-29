<?php
include_once('config.php');
if(isset($_GET['page_layout'])){
	switch($_GET['page_layout']){
		case 'addsach': include_once('addsach.php');break;
		case 'editsach': include_once('editsach.php');break;
        case 'deletesach': include_once('deletesach.php');break;
	}
}
?>

<div class="form-group">
<button type="submit" name="smb"><a href="index.php?page_layout=addsach">Thêm sách</a></button>
<button type="submit" name="search"><a href="timkiem.php">Tìm kiếm</a></button>
    <table>
        <tr>
            <th>Tên sách</th>
            <th>Thể loại</th>
            <th>Năm xuất bản</th>
        </tr>
        <?php
        $sql = "SELECT * FROM sach
		    INNER JOIN loaisach ON loaisach.matheloai = sach.matheloai
            ORDER BY masach DESC";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $row['tensach']; ?></td>
                <td><?php echo $row['tentheloai']; ?></td>
                <td ><?php echo $row['namxb']; ?></td>
                <td><a href="index.php?page_layout=editsach&masach=<?php echo $row['masach'];?>">Sửa</a></td>
                <td><a href="index.php?page_layout=deletesach&masach=<?php echo $row['masach'];?>" onclick="return confirm('Are you sure you want to Remove?');">Xóa</a></td>
            </tr>
        <?php } ?>
    </table>
</div>