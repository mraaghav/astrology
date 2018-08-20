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
<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/jquery.magnific-popup.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/owl.carousel.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/jquery.countTo.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/jquery.appear.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/price_range_script.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/slick/jquery-migrate-1.2.1.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/slick/slick.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/front/js/custom.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/js/timepicker.js')?>"></script>

<script type="text/javascript" src="<?php echo base_url('asset/front/js/custom.js')?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js">
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#female_birth_time').timepicker({
        timeFormat: 'h:mm:ss p',
        interval: 1,
        scrollbar: true
    });
    $('#male_birth_time').timepicker({
        timeFormat: 'h:mm:ss p',
        interval: 1,
        scrollbar: true
    });
    var date_input = $('input[name="date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
    
    $('.add_cart').click(function() {            
        var product_id    = $(this).data("productid");
            var product_name  = $(this).data("productname");
            var product_price = $(this).data("productprice");
            var quantity      = $('#' + product_id).val();       
        $.ajax({                
            url: "<?php echo site_url('front/add_to_cart');?>",
            method: "POST",
            data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity},
            success: function(data) {                    
                $('.ast_cart_box').html(data);                
            }            
        });        
    });                  
    
    $('.ast_cart_box').load("<?php echo site_url('front/load_cart');?>");                  
    
    $(document).on('click', '.romove_cart', function() {            
        var row_id = $(this).attr("id");            
        $.ajax({                
            url: "<?php echo site_url('front/delete_cart');?>",
            method: "POST",
            data: { row_id: row_id },
            success: function(data) {                    
                $('.ast_cart_box').html(data);                
            }            
        });        
    });
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
// <<<<<<< HEAD
// $(".date").datepicker({
//     format: 'yyyy-mm-dd',
//     startDate: '+0d',
//     autoclose: true
// });
// =======
// $('#register_btn').click(function() {

 
$(".ast_add_cart").click(function(){

     var product_id = $(this).data("id");
     var product_price = $(this).data("price");
     var product_name = $(this).data("name");
     var product_image=  $(this).data("image");
     var quantity = 1;//$('#' + product_id).val();  
 
     if(quantity != '' && quantity > 0)
      {

       $.ajax({
        url:"<?php echo base_url(); ?>front/add",
        method:"POST",
        data:{product_id:product_id, product_name:product_name, product_price:product_price, product_image:product_image, quantity:quantity},
        success:function(data)
        {

          alert("Product Added into Cart");
         // $('#cart_details').html(data);
          $('#' + product_id).val('');
        }
       });
      }
      else
      {
         alert("Please Enter quantity");
      }

});
/* 
**  Function For Load into Cart after add into cart 
*/
$(".carticon").click(function(){
 
   
    $.ajax({
        url:"<?php echo base_url(); ?>front/viewcart",
        method:"GET",
        success:function(data)
        {
          alert(data);
          $('#customcart').html(data);
        }
       });
 
});



$(document).on('click', '.ast_remove_item', function(){
   
   var row_id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
    {
       $.ajax
       ({
          url:"<?php echo base_url(); ?>front/remove",
          method:"POST",
          data:{row_id:row_id},
          success:function(data)
          {
            //alert("Product removed from Cart");
            window.location.reload();
          }
       }); 
    }
    else
    {
       return false;
    }
}); 
 
function loadintocart()
{

      $.ajax({
        url:"<?php echo base_url(); ?>front/add",
        method:"POST",
        data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
        success:function(data)
        {
         alert("Product Added into Cart");
         $('#cart_details').html(data);
         $('#' + product_id).val('');

        }
       });
 
};

function removeitem($id)
{
  var row_id = $id;//$(this).attr("id");
   alert(row_id);
    if(confirm("Are you sure you want to remove this?"))
    {
       $.ajax
       ({
          url:"<?php echo base_url(); ?>front/remove",
          method:"POST",
          data:{row_id:row_id},
          success:function(data)
          {
            //alert(data);
            alert("Product removed from Cart");

            $('#cart_details').html(data);
          }
       }); 
    }
    else
    {
       return false;
    }
}

 

</script>

</body>

</html>