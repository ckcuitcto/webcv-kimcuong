<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active">Quên mật khẩu?</li>
    </ul>
    <h3> QUÊN MẬT KHẨU CỦA BẠN?</h3>
    <hr class="soft"/>

    <div class="row">
        <div class="span9" style="min-height:900px">
            <div class="well">
                <h5>Đặt lại mật khẩu của bạn</h5><br/>
                Vui lòng nhập email của bạn. Mật khẩu mới sẽ được gửi vào email của bạn.<br/><br/><br/>
                <form action="pages/timmatkhau/sendmail.php" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail1">Địa chỉ email</label>
                        <div class="controls">
                            <input class="span3" name="emailquen" type="text" id="inputEmail1" placeholder="Email">
                        </div>
                    </div>
                    <div class="controls">
                        <button type="submit" class="btn block">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>