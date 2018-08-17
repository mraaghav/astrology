<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if ($info_message = $this->session->flashdata('success_msg')): ?>
            <div id="form-messages" class="alert alert-success" role="alert">
                <?php echo $info_message; ?>
            </div>
            <?php endif ?>
            <?php if ($error_message = $this->session->flashdata('error')): ?>
            <div id="form-messages" class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
            <?php endif ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                    <?php 
                        if(!empty($products[0])){
                            $url = base_url('admin/products/'.$products[0]->id);
                        }else{
                            $url = base_url('admin/products/');
                        }
                    ?>

                        <div class="col-lg-12 col-md-12">
                            <form role="form" method="post" action="<?php echo $url; ?>" class="registration_form1" enctype="multipart/form-data">
                                <div class="form-group"> <label class="col-md-2">Product Name *</label>
                                    <div class="col-lg-6"> <input class="form-control" type="text" placeholder="Product name" name="product_name" autocomplete="off" id="product_name" required="required" value="<?php if(!empty($products[0]->name)){ echo $products[0]->name;}else{ echo set_value('product_name');} ?>"> <span class="red" id="old">
                                            <?php echo form_error('product_name'); ?></span> </div>
                                </div>
                                <div class="form-group"> <label class="col-md-2">Price * </label>
                                    <div class="col-lg-6"> <input class="form-control" type="text" name="price" id="price" placeholder="Price" autocomplete="off" required="required" value="<?php if(!empty($products[0]->price)){ echo $products[0]->price;}else{ echo set_value('price');} ?>"> <span class="red">
                                            <?php echo form_error('price'); ?></span> </div>
                                </div>
                                <div class="form-group"> <label class="col-md-2">Description </label>
                                    <div class="col-lg-6"> <textarea name="description" id="description" class="form-control" placeholder="Product Description"><?php if(!empty($products[0]->description)){ echo $products[0]->description;}else{ echo set_value('description');} ?></textarea><span class="red" id="new">
                                            <?php echo form_error('description'); ?></span> </div>
                                </div>
                                <div class="form-group"> <label class="col-md-2">Images </label>
                                    <div class="col-lg-6"> <input name="images[]" class="form-control" type="file" multiple="multiple">
                                        <?php   
                                        if(!empty($products[0]->images)){
                                            $images = explode(',',$products[0]->images); 
                                            for($i=0;$i<count($images);$i++){?>
                                        <img src="<?php echo base_url('asset/uploads/'.trim($images[$i]));?>" width="100px" height="100px">
                                        <?php }}?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12" align="center">
                                    <input type="submit" id="submit" name="submit" class="btn btn-success" value="Save">&nbsp; <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
</div>
</div>