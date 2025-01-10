<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<h2>Product List</h2>

<a href="<?= base_url('/products/create') ?>" class="btn btn-primary">Create Product</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product['id_product'] ?></td>
            <td><?= $product['name_product'] ?></td>
            <td><?= $product['description_product'] ?></td>
            <td><?= $product['price_product'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>
