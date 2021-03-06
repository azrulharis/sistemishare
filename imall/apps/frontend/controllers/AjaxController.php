<?php

namespace JunMy\Frontend\Controllers;

use JunMy\Models\Users;

class AjaxController extends ControllerBase {
	
	/*
	*  Ajax username auto suggest
	*/
	public function ajaxusernameAction() {
		 
		$this->view->disable();
		$request = new \Phalcon\Http\Request();
		if($request->isAjax() == true) {
			$term=$_GET["term"];
			
			$phql = "SELECT username FROM JunMy\Models\Users WHERE username like '%$term%' GROUP BY username LIMIT 15";
			$rows = $this->modelsManager->executeQuery($phql);
			//$this->view->since = date('j F, Y', strtotime($rows['users']['created']));
			$json = '[';
	        $first = true;
			foreach($rows as $row) {
				if (!$first) { 
				    $json .=  ','; } else { $first = false; 
				}
	            $json .= '{"value":"'.$row['username'].'"}';
			}  
			$json .= ']';
	        echo $json;
	    }
	}
	
	/*
	*  Ajax user id auto suggest
	*  Return user id
	*/
	public function ajaxuseridAction() {
		$this->view->disable();
		$request = new \Phalcon\Http\Request();
		if($request->isAjax() == true) {
			$term=$_GET["term"];
			
			$phql = "SELECT id FROM JunMy\Models\Users WHERE username like '%$term%' GROUP BY username LIMIT 15";
			$rows = $this->modelsManager->executeQuery($phql);
			//$this->view->since = date('j F, Y', strtotime($rows['users']['created']));
			$json = '[';
	        $first = true;
			foreach($rows as $row) {
				if (!$first) { 
				    $json .=  ','; 
				} else { 
				    $first = false; 
				}
	            $json .= '{"value":"'.$row['id'].'"}';
			}  
			$json .= ']';
	        echo $json;	
		} 
	}
	
	/*
	*  Ajax image thumbnail on imall
	*/
	public function ajaximallAction() {
		$this->view->disable();
		$request = new \Phalcon\Http\Request();
		if($request->isAjax() == true) {
			if($request->isPost() == true) {
			    $image = $_POST['id'];
				echo '<div class="loadimage"><img src="'.$this->imall_image_dir().$image.'" alt="" title="" /></div>';
			}
		}
	}
	
	/*
	*  Ajax user id auto suggest
	*  Return user id
	*/
	public function ajaxcategoryAction() {
		$this->view->disable();
		$request = new \Phalcon\Http\Request();
		if($request->isAjax() == true) {
		    
			
			$id = $_REQUEST['category'];
			if($id == 1) {
			 
				require_once('../apps/frontend/ajaxs/post_option/carOption.php');
				
			} elseif($id == 2) {
			 
				require_once('../apps/frontend/ajaxs/post_option/priceOptionMotorcycle.php');
				
			} elseif($id == 6){
			 
				require_once('../apps/frontend/ajaxs/post_option/apartmentOption.php');
				
			} elseif($id == 7) {
			 
				require_once('../apps/frontend/ajaxs/post_option/houseOption.php');
				
			} elseif($id == 8) {
			 
				require_once('../apps/frontend/ajaxs/post_option/shopOption.php');
				
			} elseif($id == 9) {
			 
				require_once('../apps/frontend/ajaxs/post_option/landOption.php');
				
			} elseif($id == 10) {
			 
				require_once('../apps/frontend/ajaxs/post_option/roomOption.php');
				
			} elseif($id == 11) {
			 
				require_once('../apps/frontend/ajaxs/post_option/newPropertyOption.php');
				
			} elseif($id == 25) {
				
				require_once('../apps/frontend/ajaxs/post_option/jobOption.php');
				
			} else {
			 
			    require_once('../apps/frontend/ajaxs/post_option/priceOption.php');
			 
			}

		} 
	}
}