<?php
use classes\Product;
use classes\Session;
include 'inc/header.php';


require_once 'classes/Product.php';
require_once 'classes/Session.php';

$product = new Product();
$product = $product->getOne($_GET['id']);

$session = new Session();

$errors = $session->getSession('errors');
$pass = $session->getSession('pass');

$session->unsetSession('errors');
$session->unsetSession('pass');

?>



<div class="container my-5">

    <?php if (isset($pass)): ?>
        <p class="align-content-center text-primary"><?= $pass ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-lg-6 offset-lg-3">


            <form action="handlers/addHandler.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="img">
                </div>

                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>