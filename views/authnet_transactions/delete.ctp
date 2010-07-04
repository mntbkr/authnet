<?php
	echo $form->create('AuthnetTransaction', array('action' => 'delete'));
	echo $form->input('AuthnetTransaction.trans_id', array('type' => 'text'));
	echo $form->input('AuthnetTransaction.card_num');
	echo $form->end('Save');
?>
