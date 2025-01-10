<?= $this->extend('templates/index');?>

<?= $this->section('page-content'); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= base_url('css/write.css'); ?>">

<div class="controls">
    <button id="eraser">
        <i>🧹</i> Eraser
    </button>
    <button id="colorChange">
        <i>🎨</i> Change Color
    </button>
    <span class="color-display">Color: #faacac</span>
</div>
<canvas></canvas>

<script src="js/write.js">
</script>


<?= $this->endSection();?>