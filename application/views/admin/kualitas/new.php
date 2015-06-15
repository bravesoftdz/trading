<div id="container">
    <div class="row">
        <div class="span10"> 
            <div class="row">
                <div class="span10">               
                    <div class="well blue">
                        <div class="well-header">
                        	<h1><?php echo $judul; ?></h1>
                        		<div id="body">
                            		<?php echo form_open('px/kualitas/simpan'); ?>
                            			<table width="100%" cellpadding="3" cellspacing="0">
                                            <tr>
                                                <td width="180">Kualitas ID</td>
                                                <td>:</td>
                                                <td>
                                                    <!--<input type="text" name="nama_kota" value="<?php echo $nama_kota; ?>" class="input-read-only" size="60" readonly="true">-->
                                                    <input type="text" class="input-medium form-control" 
                                                        id="Kualitasid" placeholder="Entry Kualitas ID" style="float: left; margin: inherit; text-transform: uppercase;" 
                                                            name="kualitasid">
                                                </td>
                                            </tr>
                            				<tr>
                                                <td width="180">Keterangan</td>
                                                <td>:</td>
                                                <td>
                                                    <!--<input type="text" name="nama_kota" value="<?php echo $nama_kota; ?>" class="input-read-only" size="60" readonly="true">-->
                                                    <input type="text" class="input-xlarge form-control" 
                                                        id="description" placeholder="Entry Nama Kualitas" style="float: left; text-transform: uppercase; 
                                                            margin: inherit;" name="description">
                                                </td>
                                            </tr>                            				
                            				<tr valign="top">
                                                <td></td>
                                                <td colspan="2">
                                                    <input type="submit" class="btn-kirim-login" value="Simpan Data">
                                                    <input type="submit" class="btn-kirim-login" value="Reset" onclick="<?php echo base_url() ?>px/kualitas/">                                                                                                        
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
    