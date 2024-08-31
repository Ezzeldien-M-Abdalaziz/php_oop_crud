<?php
 use classes\Product; include 'inc/header.php';
require_once 'classes/Product.php';
 $product = new Product();
 $products = $product->getAll();
?>




<div class="container my-5">

    <div class="row">

        <?php foreach ($products as $product): ?>
                <div class="col-lg-4 mb-3">
                    <div class="card">
                    <img src="images/<?=$product['image']?>" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title"><?=$product['name']?></h5>
                    <p class="text-muted"><?=$product['price']?></p>
                    <p class="card-text"><?=$product['description']?></p>

                    <a href="show.php?id=<?=$product['ID']?>" class="btn btn-primary">Show</a>
                    <a href="edit.php?id=<?=$product['ID']?>" class="btn btn-info">Edit</a>
                    <a href="delete.php?id=<?=$product['ID']?>" class="btn btn-danger" >Delete</a>

                    </div>
                    </div>
                 </div>
            <?php endforeach;?>
        
    </div>

</div>



<?php include 'inc/footer.php'; ?>