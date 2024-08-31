<?php namespace classes; ?>

<?php include 'inc/header.php'; ?>

<?php

require_once 'classes/Product.php';
require_once 'classes/Session.php';
        $id = $_GET['id'];
        $prod = new Product();
        $product = $prod->getOne($id);

        $session = new Session();
        $error = $session->getSession("error");

?>



<div class="container my-5">
    <?php if($error) :?>
    <p class="alert alert-danger"><?= $error ?></p>
    <?php endif;?>

    <div class="row">

    <div class="col-lg-6">
        <img src="images/<?=$product['image']?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?=$product['name']?></h5>
            <p class="text-muted">Price: <?=$product['price']?> EGP</p>
            <p><?=$product['description']?></p>

            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id=<?=$product['ID']?>" class="btn btn-info">Edit</a>
            <a href="delete.php?id=<?=$product['ID']?>" class="btn btn-danger">Delete</a>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>