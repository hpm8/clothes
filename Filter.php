<?php
class Filter {
	function filter_data($array) {
		if (isset($_POST['search'])) {
			if ($_POST['search']['product_name'] || $_POST['search']['category_name'] || $_POST['search']['price']) {
				$final_array = [];
			    foreach($array as $key => $arr_value){
			        if ($arr_value['product_name'] == $_POST['search']['product_name']) {
			            array_push($final_array, $arr_value);
			        }elseif ($arr_value['category_name'] == $_POST['search']['category_name']) {
			        	array_push($final_array, $arr_value);
			        }elseif ($arr_value['price'] == $_POST['search']['price']) {
			        	array_push($final_array, $arr_value);
			        }
			    }
			}else{
				$final_array =	$array;
			}
		}else{
			$final_array =	$array;
		}
		return $final_array;
	}
}
?>