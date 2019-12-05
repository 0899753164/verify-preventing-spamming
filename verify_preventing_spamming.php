<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$rand1 = rand(0, 99);
	$rand2 = rand(0, 99);
	$sum = $rand1 + $rand2;

?>

<div class="container">	
	<div class="box box-primary mt-5 pb-5" style="border: 1px solid; border-radius: 10px;">		
		<!-- form start -->
		<?php echo form_open_multipart('project/verify/', array('id' => 'myform')) ?>

				<!-- Verify spam -->
				<div class="row input-row-group">
					<div class="col-md-6 col-lg-12">
						<input type="hidden" name="actualSum" class="form-control" value="<?php echo $sum; ?>"/>

						<div class="col-md-6 col-lg-5">
							<div class="form-group">
							<label class="text-dark"><?php echo $rand1 ."+". $rand2. "&nbsp;=" ?></label>
							</div>
						</div>
						<div class="input-group col-lg-5">				
							<div class="input-group-prepend">
								<span class="input-group-text text-dark">ยืนยันตัวตน</span>
							</div>
							<input type="text" name="answer" id="answer" class="form-control col-lg-3" autocomplete="off" required>
							
							<div class="input-group-append">
								<button class="btn btn-light rounded-right" type="button" title="รีเฟรช" onClick="document.location.reload(true)">
									<i class="fas fa-sync rounded text-dark"></i>
								</button>
							</div>
							<span class="valid_verify" style="color: #BA202E;"><?php echo form_error('answer'); ?>
								<!-- <i class="fa fa-check" class="form-control" aria-hidden="true"></i> -->
							</span>
						</div>
						<small id="emailHelp" class="form-text text-muted" style="display: inline-block;padding: 5px;">กรุณากรอกตัวเลขผลลัพธ์จากด้านบน</small>
					</div>
				</div>

				<div class="row input-row-group">
					<div class="col-md-6 col-lg-5">
						<div class="form-group">
						<span class="invalid_verify" style="color: #BA202E;"><?php echo form_error('answer'); ?></span>
						</div>
					</div>
				</div>
			</div>
		  <!-- /.box-body -->
		  <div class="box-footer">
			<button type="submit" class="btn btn-primary col-md-3 col-lg-2 col-xl-2 save" id="btn_submit" disabled="true">ยืนยัน</button>
			<button type="reset" class="btn btn-outline-secondary col-md-3 col-lg-2 col-xl-2" style="color: #000000;">ยกเลิก</button>
		  </div>
		</form>
	</div>
</div>
<hr style="color: #BEBEBE" class="mt-5">
<script>

$(document).ready(function()
{
	// verify Calculate two random numbers for preventing spamming
	$("#answer").keyup(function(){  
	   
		var sum = '<?php echo $sum; ?>';
		var answer = $('#answer').val();
			console.log('sum is'+ sum);
			console.log(answer);
		if(answer !== sum){
			$('#btn_submit').prop('disabled', true);
			$('.invalid_verify').html('ยืนยันตัวตนไม่ถูกต้อง').addClass("fr");
			$('.valid_verify').html('')
		}
		else
		{
			$('.valid_verify').html('<i class="fa fa-check text-success pt-3" aria-hidden="true"></i>').remove("fr");
			$('#btn_submit').prop('disabled', false);
			$('.invalid_verify').html('').remove("fr");
		}
	});

});
</script>
