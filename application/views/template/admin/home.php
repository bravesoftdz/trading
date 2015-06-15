
<?php
	$this->tree->setFolderImage('assets/images/');
	$this->tree->addToArray(100,'Home',0);
	foreach($menu->result_array() as $rows) {
		$this->tree->addToArray($rows['id_menu'], $rows['menu'],$rows['parent'], base_url().$rows['menuaction'].$rows['id_menu']);
	}
	
	$this->tree->writeCSS();
	$this->tree->writeJavascript();
	$this->tree->drawTree();
?>