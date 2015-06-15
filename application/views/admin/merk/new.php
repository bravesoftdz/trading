<div id="container">
    <div class="row">
        <div class="span10"> 
            <div class="row">
                <div class="span10">               
                    <div class="well blue">
                        <div class="well-header">
                        	<h1><?php echo $judul; ?></h1>
                        		<div id="body">
                            		<?php echo form_open('px/merk/simpan'); ?>
                            			<table width="100%" cellpadding="3" cellspacing="0">
                                            <tr>
                                                <td width="180">Merk ID</td>
                                                <td>:</td>
                                                <td>
                                                    <!--<input type="text" name="nama_kota" value="<?php echo $nama_kota; ?>" class="input-read-only" size="60" readonly="true">-->
                                                    <input type="text" class="input-medium form-control" 
                                                        id="merkid" placeholder="Entry Merk ID" style="float: left; margin: inherit; text-transform: uppercase;" 
                                                            name="merkid">
                                                </td>
                                            </tr>
                            				<tr>
                                                <td width="180">Keterangan</td>
                                                <td>:</td>
                                                <td>
                                                    <!--<input type="text" name="nama_kota" value="<?php echo $nama_kota; ?>" class="input-read-only" size="60" readonly="true">-->
                                                    <input type="text" class="input-xlarge form-control" 
                                                        id="description" placeholder="Entry Nama Merk" style="float: left; text-transform: uppercase; 
                                                            margin: inherit;" name="description">
                                                </td>
                                            </tr>                            				
                            				<tr valign="top">
                                                <td></td>
                                                <td colspan="2">
                                                    <input type="submit" class="btn-kirim-login" value="Simpan Data">
                                                    <input type="submit" class="btn-kirim-login" value="Reset" onclick="<?php echo base_url() ?>px/merk/">                                                                                                        
                                                </td>
                                            </tr>
                            			</table>
                            			<input type="hidden" name="stts" value="<?php echo $stts; ?>">
                            		<?php echo form_close(); ?>
                        		</div>
                            </div>
                    	</div>                         
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    