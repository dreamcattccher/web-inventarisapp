<?php 
$this->load->view("components/head");
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="<?= $action ?>" method="GET">
				<div class="panel panel-info" style="margin:10px">
					<div class="panel-heading">Dialog Kelas</div>
					<div class="panel-body">
                        <div class="form-group">
                            <label for="noruang">No Ruang</label>
                            <select name="noruang" id="noruang" class="form-control">
                                <option value="201">201</option>
                                <option value="205">205</option>
                                <option value="206">206</option>
                                <option value="207">207</option>
                                <option value="208">208</option>
                                <option value="209">209</option>
                                <option value="Lab213">Lab213</option>
                                <option value="Lab308">Lab308</option>
                                <option value="Lab313">Lab313</option>
                            </select>
                        </div>
					</div>
					<div class="panel-footer">
                        <input type="submit" value="Submit" class="btn btn-success">
                    </div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
$this->load->view("components/foot"); 
?>
