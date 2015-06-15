<div id="container">
    <div class="row">
        <div class="span10"> 
            <div class="row">
                <div class="span10">               
                    <div class="well blue">
                        <div class="well-header">
                        	<h1><?php echo $judul; ?></h1>
                        		<div id="body">
                            		<?php echo form_open('px/golongan/simpan'); ?>
                            			<table width="100%" cellpadding="3" cellspacing="0">
                                            <tr>
                                                <td width="180">Golongan ID</td>
                                                <td>:</td>
                                                <td>                                                    
                                                    <input type="text" class="input-medium form-control" id="description" placeholder="Entry golongan ID" style="float: left; margin: inherit; 
                                                        text-transform: uppercase;" name="golonganid" value="<?php echo $change_golongan->golonganid; ?>" readonly="true">                                                    
								                    <span class="help-inline"><?php echo form_error('golonganid'); ?></span> 
                                                </td>
                                            </tr>     
                            				<tr>
                                                <td width="180">Nama golongan</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="description" placeholder="Entry Nama golongan" 
                                                        style="float: left; margin: inherit; text-transform: uppercase;" name="description" value="<?php echo $change_golongan->description; ?>">
                                                    <input name="id" type="hidden" value="<?php echo $change_golongan->golonganid; ?>">
								                    <span class="help-inline"><?php echo form_error('description'); ?></span> 
                                                </td>
                                            </tr>                            				
                            				<tr valign="top">
                                                <td></td>
                                                <td colspan="2">
                                                    <input type="submit" class="btn-kirim-login" value="Simpan Data">
                                                    <input type="submit" class="btn-kirim-login" value="Reset" onclick="<?php echo base_url() ?>px/golongan/">                                                    
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
    