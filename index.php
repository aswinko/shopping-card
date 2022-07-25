<?php

include './config/connect_db.php';

//write query
$sql = 'SELECT id, img, title, author, price FROM product_details ORDER BY id';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch all resulting row from an array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

//FREE result from array
mysqli_free_result($result);

mysqli_close($conn);

// print_r($product_details);
?>

<!DOCTYPE html>
<html lang="en">
    <?php include './Template/header.php'; ?>

    <main class="container home">
        <?php if ($products): ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col s8 m3">
                        <a href="product_details.php?id=<?php echo $product['id']; ?>" class='grey-text'>
                            <div class="card">
                                <div class="card-image">
                                    <img width="240" height="150" class="home-course-image" src="<?php echo 'data: image/jpeg;base64,' . base64_encode($product['img']); ?>" alt="..."/>
                                    <!-- <span class="card-title">Card Title</span> -->
                                </div>
                                <div class="card-content">
                                    <p class="black-text title bold"><?php echo htmlspecialchars(
                                        $product['title']
                                    ); ?></p>
                                    <p class="author"><?php echo htmlspecialchars(
                                        $product['author']
                                    ); ?></p>
                                    <p class="price black-text bold">₹<?php echo htmlspecialchars(
                                        $product['price']
                                    ); ?></p>
                                    <!-- <a href="#" class="btn btn-primary">Buy Now</a> -->
                                </div>
                                <!-- <div class="card-action">
                                    <a href="#">This is a link</a>
                                </div> -->
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <h1>No products found</h1>
        <?php endif; ?>
        
    </main>

    <?php include './Template/footer.php'; ?>
</html>