<?php
include 'Filter.php';
    $db_handle = new Filter();
    $productfilterdata = array('black','white','green','blue','red','yellow','orange','purple','grey','pink');
    $categoryfilterdata = array('Women','Men');
    $pricefilterdata = array('$10','$20','$30','$40');
    $product_result = array(
      array(
          'product_name' => 'black',
          'category_name' => 'Men',
          'price' => '$10',
          'image' => 'images/black.png'
      ),
      array(
          'product_name' => 'white',
          'category_name' => 'Women',
          'price' => '$20',
          'image' => 'images/white.png'
      ),
      array(
          'product_name' => 'green',
          'category_name' => 'Women',
          'price' => '$30',
          'image' => 'images/green.png'
      ),
      array(
          'product_name' => 'blue',
          'category_name' => 'Men',
          'price' => '$40',
          'image' => 'images/blue.png'
      ),
      array(
          'product_name' => 'red',
          'category_name' => 'Women',
          'price' => '$30',
          'image' => 'images/red.png'
      ),
        array(
          'product_name' => 'yellow',
          'category_name' => 'Men',
          'price' => '$40',
          'image' => 'images/yellow.png'
      ),
        array(
          'product_name' => 'orange',
          'category_name' => 'Women',
          'price' => '$20',
          'image' => 'images/orange.png'
      ),
        array(
          'product_name' => 'purple',
          'category_name' => 'Women',
          'price' => '$40',
          'image' => 'images/purple.png'
      ),
        array(
          'product_name' => 'grey',
          'category_name' => 'Men',
          'price' => '$10',
          'image' => 'images/grey.png'
      ),
        array(
          'product_name' => 'maroon',
          'category_name' => 'Women',
          'price' => '$30',
          'image' => 'images/maroon.png'
      ),
        array(
          'product_name' => 'pink',
          'category_name' => 'Women',
          'price' => '$40',
          'image' => 'images/pink.png'
      )
    );
    $final_result = $db_handle->filter_data($product_result);
?>
<html>
    <head>
       <link rel="stylesheet" href="css/style1.css">

        <title>Product Listing</title>
        <style>
            /*page 2 start*/
.product-section {
    display: flex;
    flex-wrap: wrap;
}
.search-part {
  width: 18.5%;
  margin: 0 1.5%;
   display: flex;
  flex-wrap: wrap;
}
.diamond-part {
  width: 75.50%;
  margin: 0 1.5%;
  display: flex;
  flex-wrap: wrap;
}
.p-box {
    width: 31.3%;
    margin: 0 1%;
     display: flex;
  flex-wrap: wrap;
  box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.17);
}



.search-inner {
    width: 100%;
    margin-bottom: 10px;
}

.img-part {
    width: 100%;
}

.text-part {
    width: 100%;
}
.search-part ul li {
    margin-bottom: 10px;
}
.img-part img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
ul {
    margin: 0;
}
.inner-part {
    width: 100%;
}

@media (min-width:1024px) { 

}

@media (max-width:992px) {

     .p-box  {
        width: 48%;
    }
    .search-part {
        width: 100%;
    }
    .search-part ul li { 
        display: inline-block;
        margin-right: 134px;
    }
     .search-part ul li:last-child {
        margin-right: 0;
     }
     .diamond-part {
        width: 100%;
     }
 } 
 @media (max-width:768px) {

     .p-box  {
        width: 48%;
    }
 } 
 @media (max-width:767px) {
 .search-part, .diamond-part {
    width: 100%;
 }
 .p-box  {
    width: 100%;
 }   

 h2{
    font-size: 80px;
 }
 .img-part {
    width: 20%;
}
.text-part {
    width: 80%;
}

}
/*page 2 end*/
 </style>

       
    </head>
    <body>
          <div class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
      Clothes
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  
  <div class="nav-links">
   <a href="productList.php">Product List</a>
    <a href="index.html">Main</a>   
  </div>
</div>
        <div class="container">
     <h2>Filter</h2>
        <form method="POST" name="search_form" id="search_form" action="productList.php">
            <div class="product-section">
                <div class="search-part">
               <ul> 
               <li>  
            <select id="search[product_name]" name="search[product_name]">
                <option value="0" selected="selected">Select Product</option>
                    <?php
                    if (! empty($productfilterdata)) {
                        foreach ($productfilterdata as $key => $product_value) {
                          if(isset($_POST['search']['product_name']) && $product_value == $_POST['search']['product_name']){
                                $selected = 'selected';
                             }else{
                                $selected = '';
                            }
                            echo '<option value="' . $product_value. '" '.$selected.'>' . $product_value . '</option>';
                        }
                    }
                    ?>
            </select><!-- <br> <br> -->
      
        </li>
        <li>
            <select id="search[category_name]" name="search[category_name]">
                <option value="0" selected="selected">Select Category</option>
                    <?php
                    if (! empty($categoryfilterdata)) {
                        foreach ($categoryfilterdata as $key => $catt_value) {
                          if(isset($_POST['search']['category_name']) && $catt_value == $_POST['search']['category_name']){
                                $selected = 'selected';
                             }else{
                                $selected = '';
                            }
                            
                            echo '<option value="' . $catt_value . '"'.$selected.'>' . $catt_value . '</option>';
                        }
                    }
                    ?>
            </select><!-- <br> <br> -->
       </li>
       <li>
       
            <select id="search[price]" name="search[price]">
                <option value="0" selected="selected">Select Price</option>
                    <?php
                    if (! empty($pricefilterdata)) {
                        foreach ($pricefilterdata as $key => $price_value) {
                          if(isset($_POST['search']['price']) && $price_value == $_POST['search']['price']){
                                $selected = 'selected';
                             }else{
                                $selected = '';
                            }
                            echo '<option value="' . $price_value . '"'.$selected.'>' . $price_value . '</option>';
                        }
                    }
                    ?>
            </select><!-- <br> <br> -->
       </li>
       <li>
       
            <button id="Filter" type="submit">Search</button>
        </li>
        </ul>
        </div>
        <div class="diamond-part">
            
            <?php
                if ($final_result) {
                    foreach ($final_result as $product_key => $product_value) { ?>
                      <div class="p-box">
                          <div class="img-part text-center">
                            <img class="img-responsive" src="<?= $product_value['image'] ?>">
                          </div>
                          <div class="text-part">
                            <ul>
                              <li><h4><?= $product_value['product_name']?></h4></li>
                              <li class="float-right"> <h4><?= $product_value['price']?></h4></li>
                            </ul>
                          </div>
                      </div>  
                <?php  }
                }
            ?>        
          
            </div>
            </div>

        </form> 
        </div>
         <footer>
              <div class="container-fluid">
                <div class="footer-part">
                  <div class="inner-part">
                    <h5>eComerce Marketplace, LLC</h5>
                  </div>
                  <div class="inner-part">
                    <div class="conter-1">
                    <h5>(555)-555-5555</h5>
                  </div>
                  </div>
                  <div class="inner-part">
                    <ul>
                      <li>55 Fake Street</li>
                      <li>Faketown, NJ</li>
                      <li>00000</li>
                    </ul>
                  </div>
                </div>
              </div>
            </footer>
