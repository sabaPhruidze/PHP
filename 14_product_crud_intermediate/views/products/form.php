<?php if (!empty($errors)) : ?>
<div class='alert alert-danger'>
    <!-- ახალი ტიპის foreach -->
    <?php foreach ($errors as $error) : ?>
    <div><?php echo $error ?></div>
    <?php endforeach; ?>
</div>
<?php endif ?>
<form method="post" enctype="multipart/form-data">
    <!--იმისათვის რომ სურათი აიტვირთოს საჭიროა ჩავწეროთ encoding type-->
    <?php if ($product['image']) : ?>
    <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>">
    <?php endif; ?>
    <div class="mb-3">
        <label class="form-label">Product image</label><br>
        <input type="file" name='image'>
    </div>
    <div class="mb-3">
        <label class="form-label">Prodcut title</label>
        <input type="text" class="form-control" name='title' value="<?php echo $title ?>">
        <!-- value  ან პირდაპირ ჩაწერით სუბმით ს რომ დავაჭერ თუნდაც არ გაეშვას მაინც value შენარჩუნდება-->
    </div>
    <div class="mb-3">
        <label class="form-label">Prodcut description</label>
        <textarea class="form-control" name="description"><?php echo $description ?></textarea>
        <!-- value  ან პირდაპირ ჩაწერით სუბმით ს რომ დავაჭერ თუნდაც არ გაეშვას მაინც value შენარჩუნდება-->
    </div>
    <div class="mb-3">
        <label class="form-label">Prodcut Price</label>
        <input type="number" class="form-control" step='0.01' name="price" value="<?php echo $price ?>">
        <!-- value  ან პირდაპირ ჩაწერით სუბმით ს რომ დავაჭერ თუნდაც არ გაეშვას მაინც value შენარჩუნდება-->
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>