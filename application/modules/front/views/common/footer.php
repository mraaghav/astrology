<!-- Footer wrapper start-->
<div class="ast_footer_wrapper ast_toppadder70 ast_bottompadder20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
                <div class="ast_footer_info">
                    <img src="<?php echo base_url('asset/front/images/header/logo.png')?>" alt="Logo">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="widget text-widget">
                    <h4 class="widget-title">our newsletter</h4>
                    <div class="ast_newsletter">
                        <p>Making it look like readable English.The point of using Lorem Ipsum is that it has a more-or less normal distribution of letters.</p>
                        <div class="ast_newsletter_box">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="widget text-widget">
                    <h4 class="widget-title">our services</h4>
                    <div class="ast_servicelink">
                        <ul>
                            <li><a href="horoscopes.html">Daily Horoscope</a></li>
                            <li><a href="gemstones.html">gemstones</a></li>
                            <li><a href="numerology.html">numerology</a></li>
                            <li><a href="tarot.html">tarot cards</a></li>
                            <li><a href="journal.html">Match Making</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="widget text-widget">
                    <h4 class="widget-title">quick links</h4>
                    <div class="ast_sociallink">
                        <ul>
                            <li><a href="about.html">about</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="donate.html">Donate</a></li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="widget text-widget">
                    <h4 class="widget-title">get in touch</h4>
                    <div class="ast_gettouch">
                        <ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i>
                                <p>2794, Hayhurst Lane Bloomfield Township, MI 48302</p>
                            </li>
                            <li><i class="fa fa-at" aria-hidden="true"></i> <a href="#">support@website.com</a><a href="#">info@website.com</a></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>
                                <p>+1800 326 3264</p>
                                <p>+1800 326 3234</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ast_copyright_wrapper">
                    <p>&copy; Copyright 2018, All Rights Reserved, <a href="#">astrology</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer wrapper End-->
<!--Main js file Style-->
<script type="text/javascript" src="<?php echo base_url('asset/front/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/jquery.magnific-popup.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/owl.carousel.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/jquery.countTo.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/jquery.appear.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/custom.js')?>"></script>
<!--Main js file End-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
<script>

$(document).ready(function() {
    var date_input = $('input[name="date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
});
$('#register_btn').click(function(e) {
    e.preventDefault();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var gender = $('#gender').val();
    var mobile = $('#mobile').val();
    
    if (isAlphaOrParen(first_name)) {
        return true;
    }else{
        $('#error_first_name').html('first name must be alphabetic');
        return false;
    }
    
    if (isAlphaOrParen(last_name)) {
        return true;
    }else{
         $('#error_last_name').html('last name must be alphabetic');
        return false;
    }

    if (isEmail(email)) {
        return true;
    }else{
         $('#error_email').html('email must be valid format');
        return false;
    }

    if (validatePhone(mobile)) {
        return true;
    }else{
         $('#error_mobile').html('mobile must be numeric and 10 characters');
        return false;
    }


});

function isAlphaOrParen(str) {
    return /^[a-zA-Z()]+$/.test(str);
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /[1-9]{1}[0-9]{9}/;
    if (filter.test(a)) {
        return true;
    } else {
        return false;
    }
}


</script>
</body>

</html>