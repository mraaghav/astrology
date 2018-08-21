<!--Breadcrumb start-->
<div class="ast_pagetitle">
    <div class="ast_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>Success</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">home</a></li>
                    <li>//</li>
                    <li><a href="">Success</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb end-->
<div class="ast_cart_wrapper ast_toppadder70 ast_bottompadder70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="success_page_msg">
                    <h2 style="font-size:18px; color:#313131; padding-bottom:8px;">Dear Member</h2>
                    <span style="color: #646464; font-size:18px;">Your payment was successful, thank you!</span><br />
                    <?php if(!empty($item)){
					for($i=1;$i<=count($item);$i++){?>
                    <span style="color: #646464;">Item Number : <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">
                            <?php echo $item[$i]['name']; ?></strong>
                    </span><br />
                    <span style="color: #646464;">Item quantity : <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">
                            <?php if(!empty($item[$i]['quantity'])) { echo $item[$i]['quantity'];} ?></strong>
                    </span><br />
                    <span style="color: #646464;">Total : <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">
                            <?php if(!empty($item[$i]['mc_gross'])){ echo $item[$i]['mc_gross'];} ?></strong>
                    </span><br />
                    <?php }}?>
                    <span style="color: #646464;">TXN ID : <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">
                            <?php if(!empty($txn_id)){ echo $txn_id; }?></strong>
                    </span><br />
                    <span style="color: #646464;">Amount Paid : <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">$
                            <?php echo $payment_amt.' '.$currency_code; ?></strong>
                    </span><br />
                    <span style="color: #646464;">Payment Status : <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">
                            <?php if(!empty($status)){ echo $status; }?></strong>
                    </span><br />
                    <a href="<?php echo base_url('front/shop/'); ?>" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>Download our <span>Mobile App</span></h1>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
				<div class="ast_download_box">
					<ul>
						<li><a href="#"><img src="images/content/download1.png" alt="Download" title="Download"></a></li>
						<li><a href="#"><img src="images/content/download2.png" alt="Download" title="Download"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Download wrapper End-->