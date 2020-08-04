<?php global $product;
$product_name = $product->name;
$attachment_ids = $product->get_gallery_attachment_ids();
$count = 0; 
if(!empty($attachment_ids)) { ?>
<div id="ca-container" class="ca-container">
	<div class="ca-wrapper">
<?php
foreach( $attachment_ids as $attachment_id ) { 
$full_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
$count++; ?>
		<div class="ca-item ca-item-<?php echo $count; ?>">
			<div class="ca-item-main img_wrapper">
            <img class="translated" alt="<?php echo $product_name; ?>" src="<?php echo $full_url; ?>"  /> 
				<?php echo wp_get_attachment_image($attachment_id, 'full'); ?>	
			</div>
		</div>
<?php } ?>
	</div><!-- ca-wrapper -->
</div><!-- ca-container -->	
<?php } ?>