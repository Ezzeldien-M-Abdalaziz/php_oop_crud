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
            <form action="handlers/editHandler.php?id=<?= $product['ID'] ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" rows="3" name="desc"><?= htmlspecialchars($product['description']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <div class="col-lg-3">
                    <img src="images/<?= htmlspecialchars($product['image']) ?>" class="card-img-top">
                </div>

                <center><button type="submit" class="btn btn-primary" name="submit">Update</button></center>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
