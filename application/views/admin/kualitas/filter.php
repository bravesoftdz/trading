<div class="container">
		<div class="row">
			<div class="span12">				
				<div class="row">
					<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->
					<!-- table, content, etc -->
					<div class="span9">
                        <h1><?php echo $judul; ?></h1><br />
						<div class=""><!-- basic tabs menu -->
						<?php if($this->session->flashdata('info')) { ?>
							<div class="alert alert-info">  
									<a class="close" data-dismiss="alert">x</a>  
									<strong>Info! </strong><?php echo $this->session->flashdata('info'); ?>  
							</div>
						<?php } ?>
							<ul class="nav nav-tabs">
								<li class="active"><a href="#">General</a></li>																
							</ul>
						</div><!-- basic tabs menu -->
						<h5>Daftar Kualitas, diurutkan berdasarkan data dimutahirkan.</h5><br />
						<h5>Semua Kualitas berjumlah sebanyak: <?php echo $count; ?> record(s).</h5><br />                                                                       	                                                                       
                       <!-- <a  style="float:right; margin:18px;width:auto" href="<?php echo base_url() ?>umum/setting/form/" class="dark_green btn cbKota">Tambah Data Kota</a>-->                                                 
                        <div class="well blue">                                                    
							<div class="well-header">
                                <form class="inline" role="form" action="<?php echo base_url() ?>px/kualitas/filter/" method="post">
                                    <div class="form-group">                
                                        <button type="submit" class="btn btn-info" style="float: right;" onclick="<?php echo base_url() ?>px/kualitas/list_">Clear</button>                                                                                                                                                                                                                                                                    
                                        <button type="submit" class="btn btn-info" style="float: right;">Cari</button>
                                        <input type="text" class="form-control" id="cari" placeholder="Enter Search" style="float: right; margin: inherit;" name="cari" >                                    
                                    </div>
                                </form>
                                <h5 style="width:auto">List Daftar Kualitas </h5><br/>	
							</div>
							<div class="well-content">
							    <div class="table_options top_options"></div>                      
    							<table class="table table-striped table-bordered"><!-- table default style -->
    								<thead>	
                                        <th>ID</th>
                                        <th>Kualitas ID</th>									
    									<th>Nama Kualitas</th>									
    									<th colspan="2"><!--<button type="submit" class="btn btn-primary" style="float: left;" onclick="#">Tambah</button>-->
                                        <a title="Tambah Data Kualitas" href="<?php echo base_url(); ?>px/kualitas/new_/">
    											<i class="icon-add"></i> Tambah Data Kualitas
    										</a>
                                        </th>                                    
    								</thead>
    								<tr>
    								<?php $no=1; 
    									foreach($kualitas->result() as $row){ 
    								?>
    									<td><?php echo $this->session->userdata('row')+$no; ?></td>
                                        <td style="text-transform: uppercase;"><?php echo ucwords($row->kualitasid); ?></td>
    									<td style="text-transform: uppercase;"><?php echo ucwords($row->description); ?></td>																		
    									<td border="0">
    										<a title="Edit Kualitas" href="<?php echo base_url(); ?>kualitas/change/<?php echo $row->kualitasid; ?>">
    											<i class="icon-edit"></i> Edit
    										</a> | <a href="#" onClick="if(confirm('Anda yakin HAPUS data ini? ')){document.location='<?php echo base_url()?>kualitas/delete/<?php echo $row->kualitasid; ?>'}" title="Hapus kualitas" >
    											<i class="icon-trash"></i> Hapus
    										</a>
    									</td>
    								</tr>
    							<?php 
    								$no++;
    								} 
    							?>
    							</table><!-- table default style -->
    							<div class="pagination">
    								<ul>
    									<?php echo $this->pagination->create_links(); ?>
    								</ul>
    							</div>
      					     </div>
           					 <!-- table, content, etc -->                         
		              </div>
				<div class="table_options bottom_options">
				</div>			
		</div>
                