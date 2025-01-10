<?= $this->extend('templates/index');?>

<?= $this->section('page-content'); ?>

<link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

<div class="row edit-container">
        <div class="col-lg-6" style="max-width: 480px;">
            <div class="col-md ">
           
                <?php if(isset($user->user_image) && $user->user_image !== ''): ?>
                    <center><img src="<?= base_url('uploads/user_image/' . $user->user_image); ?>" class="image-edit" alt="<?=$user->user_image; ?>"></center>
                <?php else: ?>
                    <center><img src="<?= base_url('/img/' . $user->user_image); ?>" alt="<?= $user->user_image; ?>" class="image-profile"></center>
                <?php endif; ?>
            </div>
            <hr>

            <?= view('Myth\Auth\Views\_message_block') ?>

          

            <form action="<?= url_to('profile/update') ?>" method="post" enctype="multipart/form-data" class="user">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="user_image">Profile Image</label> 
                    <input type="file" class="form-control" id="user_image" name="user_image">
                </div>
                <div class="form-group">
                    <label for="fullname">FullName</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?=  $user->fullname; ?>">
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" ><?=  $user->bio; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?=  $user->phonenumber; ?>">
                </div>

                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?=  $user->username; ?>" readonly>
                    
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=  $user->email; ?>" readonly>
                </div>
                <div class="edit-button">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>

        </div>
</div>
</div>

<?= $this->endSection();?>