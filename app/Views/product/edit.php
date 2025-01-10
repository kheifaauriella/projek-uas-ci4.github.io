<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<h2>Create Product</h2>

<form action="<?= base_url('/products/store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?= $this->endSection(); ?>
