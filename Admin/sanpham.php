<?php
include_once('../db/connect.php');
if (isset($_POST['themsanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $hinhanh  = $_FILES['hinhanh']['name'];
    $hinhanh_tmp  = $_FILES['hinhanh']['tmp_name'];
    $soluong  = $_POST['soluong'];
    $gia = $_POST['gia'];
    $giakhuyenmai  = $_POST['giakhuyenmai'];
    $danhmuc  = $_POST['danhmuc'];
    $chitiet  = $_POST['chitiet'];
    $mota  = $_POST['mota'];
    $path = '../uploads/';

    $sql_insert_product = mysqli_query($mysqli, "INSERT INTO `tbl_sanpham`( `category_id`,`sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`,  `sanpham_soluong`, `sanpham_image`) 
                        VALUES ('$danhmuc','$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh')");
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
} elseif (isset($_POST['capnhatsanpham'])) {
    $id_update = $_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh  = $_FILES['hinhanh']['name'];
    $hinhanh_tmp  = $_FILES['hinhanh']['tmp_name'];
    $soluong  = $_POST['soluong'];
    $gia = $_POST['gia'];
    $giakhuyenmai  = $_POST['giakhuyenmai'];
    $danhmuc  = $_POST['danhmuc'];
    $chitiet  = $_POST['chitiet'];
    $mota  = $_POST['mota'];
    $path = '../uploads/';

    if ($hinhanh =='') {
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $update_no_image = "UPDATE `tbl_sanpham` SET `category_id`='$danhmuc',`sanpham_name`='$tensanpham',`sanpham_chitiet`='$chitiet',
        `sanpham_mota`='$mota',`sanpham_gia`='$gia',`sanpham_giakhuyenmai`='$giakhuyenmai',`sanpham_soluong`='$soluong' WHERE sanpham_id = '$id_update'";
    } else {
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $update_no_image = "UPDATE `tbl_sanpham` SET `category_id`='$danhmuc',`sanpham_name`='$tensanpham',`sanpham_chitiet`='$chitiet',
        `sanpham_mota`='$mota',`sanpham_gia`='$gia',`sanpham_giakhuyenmai`='$giakhuyenmai',`sanpham_soluong`='$soluong',`sanpham_image`='$hinhanh' WHERE sanpham_id = '$id_update'";
    }
    mysqli_query($mysqli, $update_no_image);
}

?>

<?php
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($mysqli, "DELETE FROM `tbl_sanpham` WHERE sanpham_id = '$id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S???N PH???M</title>
    <link rel="stylesheet" href="../css/bootstrap.css">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="xulydonhang.php">????n h??ng <span
                        class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="xulydanhmuc.php">Danh m???c</a>
                <a class="nav-item nav-link active" href="sanpham.php">S???n Ph???m</a>
                <a class="nav-item nav-link disabled active" href="xulykhachhang.php">Kh??ch h??ng</a>
            </div>
        </div>
    </nav>

    <br>

    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['quanly']) == 'capnhat') {
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id_capnhat'");
                $row_catnhat = mysqli_fetch_array($sql_capnhat);
                $id_category = $row_catnhat['category_id'];

            ?>
            <div class="col-md-4">
                <h4>C???p nh???t S???n Ph???m</h4>

                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">T??n S???n Ph???m </label>
                    <input type="text" name="tensanpham" class="form-control" placeholder="T??n S???n Ph???m" required=""
                        value="<?php echo $row_catnhat['sanpham_name'] ?>">
                    <input type="hidden" name="id_update" class="form-control"
                        value="<?php echo $row_catnhat['sanpham_id'] ?>">
                    <label for="">H??nh ???nh </label>
                    <input type="file" name="hinhanh" class="form-control">
                    <img src="../uploads/<?php echo $row_catnhat['sanpham_image'] ?>" height="70px" width="50px" alt="">
                    <br />
                    <label for="">G??a</label>
                    <input type="number" name="gia" class="form-control" placeholder="G??a"
                        value="<?php echo $row_catnhat['sanpham_gia'] ?>">
                    <label for="">G??a Khuy???n m??i</label>
                    <input type="number" name="giakhuyenmai" class="form-control" placeholder="G??a khuy???n m??i"
                        value="<?php echo $row_catnhat['sanpham_giakhuyenmai'] ?>">
                    <label for="">S??? L?????ng</label>
                    <input type="text" name="soluong" class="form-control" placeholder="S??? L?????ng"
                        value="<?php echo $row_catnhat['sanpham_soluong'] ?>">
                    <label for="">M?? t???</label>
                    <textarea type="text" rows="10" name="mota"
                        class="form-control"> <?php echo $row_catnhat['sanpham_mota'] ?> </textarea> <br>
                    <label for="">Chi Ti???t</label>
                    <textarea type="text" rows="10" name="chitiet"
                        class="form-control"> <?php echo $row_catnhat['sanpham_chitiet'] ?></textarea> <br>
                    <?php
                        $sql_select_danhmuc = mysqli_query($mysqli, "SELECT * FROM tbl_category ORDER BY category_id DESC");
                        ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">---ch??? ch???n danh m???c-----</option>
                        <?php while ($row_danhmuc = mysqli_fetch_array($sql_select_danhmuc)) {
                                if ($id_category == $row_danhmuc['category_id']) {


                            ?>
                        <option selected value="<?php echo $row_danhmuc['category_id'] ?>">
                            <?php echo $row_danhmuc['category_name'] ?></option>
                        <?php
                                } else {

                                ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>">
                            <?php echo $row_danhmuc['category_name'] ?></option>
                        <?php


                                }
                            }
                            ?>
                    </select>


                    <input type="submit" name="capnhatsanpham" class="btn btn-success " style="margin-top: 20px;"
                        value="C???p nh???p s???n ph???m">

                </form>
            </div>

            <?php
            } else {
            ?>
            <div class="col-md-4">
                <h4>Th??m S???n Ph???m</h4>

                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">T??n S???n Ph???m </label>
                    <input type="text" name="tensanpham" class="form-control" placeholder="T??n S???n Ph???m">
                    <label for="">H??nh ???nh </label>
                    <input type="file" name="hinhanh" class="form-control">
                    <label for="">G??a</label>
                    <input type="number" name="gia" class="form-control" placeholder="G??a">
                    <label for="">G??a Khuy???n m??i</label>
                    <input type="number" name="giakhuyenmai" class="form-control" placeholder="G??a khuy???n m??i">
                    <label for="">S??? L?????ng</label>
                    <input type="number" name="soluong" class="form-control" placeholder="S??? L?????ng">
                    <label for="">M?? t???</label>
                    <textarea type="text" name="mota" class="form-control"> </textarea> <br>
                    <label for="">Chi Ti???t</label>
                    <textarea type="text" name="chitiet" class="form-control"> </textarea> <br>
                    <?php $sql_select_danhmuc = mysqli_query($mysqli, "SELECT * FROM tbl_category ORDER BY category_id DESC");   ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">---ch??? ch???n danh m???c-----</option>
                        <?php while ($row_danhmuc = mysqli_fetch_array($sql_select_danhmuc)) {
                            ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>">
                            <?php echo $row_danhmuc['category_name'] ?></option>
                        <?php } ?>
                    </select>

                    <input type="submit" name="themsanpham" class="btn btn-success " style="margin-top: 20px;"
                        value="Th??m S???n Ph???m">

                </form>
            </div>
            <?php     } ?>

            <div class="col-md-8">
                <h4> Li???t k?? S???n Ph???m</h4>
                <?php $sql_select_sp = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham,tbl_category
                         WHERE tbl_sanpham.category_id = tbl_category.category_id   ORDER BY tbl_sanpham.sanpham_id DESC") ?>

                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>S??? Th??? T???</th>
                        <th>T??n S???n Ph???m</th>
                        <th>H??nh ???nh</th>
                        <th>S??? L?????ng </th>
                        <th>Danh m???c</th>
                        <th>G??a s???n ph???m</th>
                        <th>gi?? khuy???n m??i</th>
                        <th>Qu???n L??</th>
                    </tr>
                    <?php
                    $i = 0;
                    while ($row_category = mysqli_fetch_array($sql_select_sp)) {
                        $i++;


                    ?>
                    <tr>
                        <td>
                            <?php echo $i ?>
                        </td>
                        <td><?php echo $row_category['sanpham_name'] ?> </td>
                        <td><img src="../uploads/<?php echo $row_category['sanpham_image'] ?>" alt="" height="80px"
                                width="60px"></td>
                        <td><?php echo $row_category['sanpham_soluong'] ?> </td>
                        <td><?php echo $row_category['category_name'] ?></td>
                        </td>
                        <td><?php echo  number_format($row_category['sanpham_gia'])  ?> </td>
                        <td><?php echo number_format($row_category['sanpham_giakhuyenmai'])  ?> </td>


                        <td> <a href="?xoa=<?php echo $row_category['sanpham_id'] ?>"><button
                                    style="width:122px;background-color:#33CC00;color:#FFFFFF">X??a</button></a><a
                                href="?quanly=capnhat&capnhat_id=<?php echo $row_category['sanpham_id'] ?>"><button
                                    style="width:122px; background-color:#33CC00;color:#FFFFFF">C???p
                                    nh???p</button></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>