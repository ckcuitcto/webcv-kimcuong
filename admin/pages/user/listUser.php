<?php

//if(isset($_POST['suauser']))
//{
//
//}


?>

<div class="row">
    <div class="col-md-12">
        <h2>Danh sách người dùng</h2>
        <h5>Danh sách người dùng, xoá, sửa user... </h5>

    </div>
</div>
<!-- /. ROW  -->
<hr/>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách người dùng
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <!-- DO DL vao day  -->
                    <form method="Post" action="">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên</td>
                                <td>Họ</td>
                                <td>Email</td>
                                <td>Ngày sinh</td>
                                <td>Số điện thoại</td>
                                <td>Địa chỉ</td>
                                <td>Giới tính</td>
                                <td>Cấp</td>
                                <td>Ngày tạo</td>
                                <td>Ngày sửa</td>
                                <td>Xóa</td>

                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $users = $trangadmin->danhsachuser();
                            //while($user = mysql_fetch_array($users))
                            foreach ($users as $user) {
                                ob_start();
                                ?>
                                <tr>
                                    <td><?= $user["idUser"] ?></td>
                                    <td><?= $user["ten"] ?></td>
                                    <td><?= $user["ho"] ?></td>
                                    <td><?= $user["email"] ?></td>
                                    <td><?= $user["ngaysinh"] ?></td>
                                    <td><?= $user["sdt"] ?></td>
                                    <td><?= $user["diachi"] ?></td>
                                    <td><?php if ($user["gioitinh"] == 1) echo "Nam"; else echo "Nữ"; ?></td>
                                    <td>
                                        <select class="form-control leveluser" id="capdo" name="capdo"
                                                idUsers="<?= $user['idUser'] ?>">
                                            <option value="1" <?php if ($user['cap'] == 1) echo "selected=''"; ?> >
                                                Admin
                                            </option>
                                            <option value="0" <?php if ($user['cap'] == 0) echo "selected=''"; ?> >
                                                User
                                            </option>
                                        </select>
                                    </td>
                                    <td><?= $user["ngaytao"] ?></td>
                                    <td><?= $user["ngaysua"] ?></td>
                                    <td><a onclick="return confirm('Bạn có chắc muốn xoá không')"
                                           href="pages/user/xoaUser.php?idUser=<?= $user["idUser"] ?>">Xóa</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>

                        </table>
                        <!-- <button type="submit" class="btn btn-success" name="suauser">Sửa User</button> -->
                    </form>
                    <!-- /. het thuc do DL  -->

                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<!-- /. ROW  -->