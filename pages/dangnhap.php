<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">Đăng nhập</li>
    </ul>
    <h3> Đăng nhập</h3>
    <hr class="soft"/>

    <div class="row">
        <div class="span4">
            <div class="well">
                <h5>Tạo tài khoản</h5><br/>
                Nhập địa chỉ email của bạn để tạo tài khoản<br/><br/><br/>
                <form action="">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail0">Địa chỉ email</label>
                        <div class="controls">
                            <input class="span3" name="emailtao" type="text" id="emailtao" placeholder="Email">
                        </div>
                        <div id="loiemail"></div>
                    </div>
                    <div class="controls">
                        <button type="submit" class="btn block">Tạo tài khoản</button>
                        <input type="hidden" name="p" value="dangki">
                    </div>
                </form>
            </div>
        </div>
        <div class="span1"> &nbsp;</div>
        <div class="span4">
            <div class="well">
                <h5>Đã đăng kí?</h5>
                <form method="post" action="#">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail1">Email</label>
                        <div class="controls">
                            <input class="span3" name="emaildn" type="text" id="inputEmail1" placeholder="Email">
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword1">Mật khẩu</label>
                        <div class="controls">
                            <input type="password" name="matkhaudn" class="span3" id="inputPassword1"
                                   placeholder="Password">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="dangnhap" class="btn">Đăng nhập</button>
                            <a href="index.php?p=quenmatkhau">Quên mật khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
