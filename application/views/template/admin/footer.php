
    
		<hr />
		<div class="row">
			<div class="span12">
			<footer>
			<p>&copy; Admin XMart 2014.</p>
			</footer>
			</div>
		</div><br />
		
    </div> <!-- /container -->

    <!-- Le javascript
   
   ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-typeahead.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tultip').tooltip('hide');
			//$('#form-login').css('margin-left', ($('.row-fluid').width()-$('#form-login').width())/2+"px");
		});
	</script>
	<!-- table fixed header -->
	<script src="<?php echo base_url(); ?>assets/admin/js/table-fixed-header.js"></script>
	<script language="javascript" type="text/javascript" >
			$('.table-fixed-header').fixedHeader();
	</script>
	<!-- end table fixed header -->
	<!-- wysihtml5 -->
	<script src="<?php echo base_url(); ?>assets/admin/js/wysihtml5-0.3.0.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-wysihtml5.js"></script>	
	<script type="text/javascript">
		$('#some-textarea').wysihtml5();
	</script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/easyui/jquery.easyui.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/easyTree.js'); ?>"></script>
	<!-- end wysihtml5 -- >
    <script src="<?php echo base_url(); ?>asset/js/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  //Examples of how to assign the ColorBox event to elements
			  $(".cbbarang").colorbox({rel:'group', iframe:true, width:"700", height:"500"});
			  $(".cbpelanggan").colorbox({rel:'group', iframe:true, width:"700", height:"90%"});
			  $(".cblsbarang").colorbox({rel:'group', iframe:true, width:"700", height:"60%"});
			  $(".cbuser").colorbox({rel:'group', iframe:true, width:"700", height:"60%"});
              //colorbox for tambah Kota
	          $(".cbkota").colorbox({rel:'group', iframe:true, width:"700", height:"50%"});  
		  });
	</script>
  </body>
</html>
