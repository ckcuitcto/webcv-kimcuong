<?php
$row = 0;
if (isset($_POST['guilienhe'])) {
    $ten = $_POST['name'];
    $email = $_POST['email'];
    $chude = $_POST['chude'];
    $noidung = $_POST['message'];
    $sdt = $_POST['sodienthoai'];
    $row = $trangchu->guilienhe($ten, $sdt, $email, $chude, $noidung);

}

?>


<div id="mainBody">
    <div class="container">
        <hr class="soften">
        <h1>Liên hệ</h1>
        <hr class="soften"/>
        <div class="row">
            <div class="span4">
                <h4>Chi tiết liên hệ</h4>
                <p> 180 Cao Lỗ,Phường 4, Quận 8
                    <br/><br/>
                    thducit@gmail.com<br/>
                    ﻿Tel 0978533952<br/>
                    web:vangbacthaiduc.tk
                </p>
            </div>

            <div class="span4">
                <h4>Giờ mờ cửa</h4>
                <h5> Thứ 2 - Thứ 6</h5>
                <p>09:00am - 09:00pm<br/><br/></p>
                <h5>Thứ 7</h5>
                <p>09:00am - 07:00pm<br/><br/></p>
                <h5>Chủ nhật</h5>
                <p>12:30pm - 06:00pm<br/><br/></p>
            </div>
            <div class="span4">
                <h4>Email cho chúng tôi</h4>
                <form class="form-horizontal" method="POST" action="">
                    <fieldset>
                        <div class="control-group">
                            <input type="text" placeholder="Tên" name="name" class="input-xlarge"/>
                        </div>
                        <div class="control-group">
                            <input type="text" placeholder="email" name="email" class="input-xlarge"/>
                        </div>
                        <div class="control-group">
                            <input type="text" placeholder="số điện thoại" name="sodienthoai" class="input-xlarge"/>
                        </div>
                        <div class="control-group">
                            <input type="text" placeholder="Chủ đề" name="chude" class="input-xlarge"/>
                        </div>
                        <div class="control-group">
                            <textarea rows="3" id="textarea" name="message" class="input-xlarge"></textarea>
                        </div>
                        <button class="btn btn-large" name="guilienhe" type="submit">Gửi</button>

                    </fieldset>
                </form>
                <?php
                if (isset($_POST['guilienhe'])) {
                    if ($row != 0) { ?>
                        <div class="alert alert-success">
                            Gửi email thành công, chúng tôi sẽ liên hệ với bạn sớm!
                        </div> <?php
                    } else { ?>
                        <div class="alert alert-error">
                            Gửi email thất bại (>-<)
                        </div> <?php
                    }
                }
                ?>

            </div>
        </div>


        <div class="row">
            <div class="span12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.942023312993!2d106.67614631463677!3d10.738951885628282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad03bf2257%3A0xafb1cc30716fdfab!2zMTgwIENhbyBMw7TMgw!5e0!3m2!1svi!2s!4v1498894561347"
                        width="1200" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                <!-- <small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small> -->
            </div>
        </div>
    </div>
</div>