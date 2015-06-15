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
                                                    <input type="text" class="input-medium form-control" id="description" placeholder="Entry kualitas ID" style="float: left; margin: inherit; 
                                                        text-transform: uppercase;" name="kualitasid" value="<?php echo $change_kualitas->kualitasid; ?>" readonly="true">                                                    
								                    <span class="help-inline"><?php echo form_error('kualitasid'); ?></span> 
                                                </td>
                                            </tr>     
                            				<tr>
                                                <td width="180">Nama Kualitas</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="description" placeholder="Entry Nama kualitas" 
                                                        style="float: left; margin: inherit; text-transform: uppercase;" name="description" value="<?php echo $change_kualitas->description; ?>">
                                                    <input name="id" type="hidden" value="<?php echo $change_kualitas->kualitasid; ?>">
								                    <span class="help-inline"><?php echo form_error('description'); ?></span> 
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
    