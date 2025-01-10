<?= $this->extend('templates/index');?>

<?= $this->section('page-content'); ?>

<link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">My Profile</h1>

<div class="row">
        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 480px;">
                <div class="row g-0">
                    <div class="col-md-4 ">
                    <?php if(isset($user->user_image) && $user->user_image !== ''): ?>
                            <img src="<?= base_url('uploads/user_image/' . $user->user_image); ?>" class="image-profile" alt="<?= $user->user_image; ?>" >
                        <?php else: ?>
                            <img src="<?= base_url('/img/' . $user->user_image); ?>" alt="<?= $user->user_image; ?>" class="image-profile">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">

                            <ul class="list-group list-group-flush">
                                <?php if($user->fullname) : ?>
                                <li class="list-group-item">
                                    <h4><?= $user->fullname; ?></h4>
                                </li>
                                <?php endif; ?>

                                <?php if($user->bio) : ?>
                                <li class="list-group-item">
                                    <?= $user->bio; ?>
                                </li>
                                <?php endif; ?>

                                <li class="list-group-item"><?= $user->username; ?></li>

                                <li class="list-group-item"><?= $user->email; ?></li>

                                <?php if($user->phonenumber) : ?>
                                <li class="list-group-item">
                                    <?= $user->phonenumber; ?>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection();?>