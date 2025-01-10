<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image" style="background-image: url('/img/forgot2.jpeg');"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><?=lang('Auth.forgotPassword')?></h1>
                                        <!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p> -->
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <p><?=lang('Auth.enterEmailForInstructions')?></p>

                                    <form action="<?= url_to('forgot') ?>" method="post" class="user">
                                    <?= csrf_field() ?>

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                                name="name" aria-describedby="emailHelp"
                                                placeholder="<?=lang('Auth.email')?>">
                                            <div class="invalid-feedback">
                                                 <?= session('errors.email') ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?=lang('Auth.sendInstructions')?>
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= url_to('login') ?>"><?=lang('Auth.alreadyRegistered')?> <?=lang('Auth.signIn')?></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?= $this->endSection(); ?>