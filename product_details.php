<?php 
    include('./config/connect_db.php');

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        //write query
        $sql = "SELECT img, title, author, price, product_description FROM product_details WHERE id = $id";

        //get the query result
        $result = mysqli_query($conn, $sql);

        //fetch the result in an array
        $products = mysqli_fetch_assoc($result);

        //free reult from array
        mysqli_free_result($result);

        //close connection
        mysqli_close($conn);
    }
    

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('./Template/header.php') ?>
    <main class="container product-details">

        <?php if($products): ?>
            <div class="img">
                <img src="<?php echo 'data: image/jpeg;base64,' . base64_encode($products['img']); ?>" alt="..." />
            </div>
            <div class="title">
                <h2><?php echo htmlspecialchars($products['title']); ?></h2>
            </div>
            <div class="divider"></div>
            <div class="author">
                <p><?php echo htmlspecialchars($products['author']); ?></p>
            </div>
            <div class="divider"></div>
            <div class="price">
                <p>₹<?php echo htmlspecialchars($products['price']); ?></p>
            </div>
            <div class="divider"></div>
            <div class="description">
                <p><?php echo htmlspecialchars($products['product_description']); ?></p>
            </div>
        <?php else: ?>
            <h1>No details found</h1>
        <?php endif; ?>

    </main>
    <?php include('./Template/footer.php') ?>
</html>