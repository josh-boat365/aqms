

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('font/iconsmind-s/css/iconsminds.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('font/simple-line-icons/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap.rtl.only.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-float-label.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-class'); ?> class="background show-spinner no-footer" <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="fixed-background"></div>
    <div class="container col-12 position-absolute" style="z-index: 200">
        
    </div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card mt-3 mb-3">
                        <div class="position-relative image-side">
                            <p class="text-white h2">WELCOME TO ATU TRACER</p>
                            <p class="white mb-0">Dear Alumnus:</p>

                            <p class="white">Thank you for the intended participation.</p>

                            <p class="text-wrap white">
                                The Tracer Study seeks to learn about the extent to which the educational experience at Accra Technical University (ATU) has contributed to the career developments of its alumni.
                            </p>

                            <p class="text-wrap white">
                                In particular, the study aims at determining, from your perspective, the impact of the training received on work placement and career progression.
                            </p>

                            <p class="text-wrap white">
                                Your feedback, processed confidentially, will inform institutional policy on improving academic programmes and practical training, for quality service delivery to current students, prospective admissions, and industry.
                            </p>

                            <p class="white">We look forward to receiving your responses.</p>
                            <a href="<?php echo e(route('register')); ?>" class="white font-weight-bold h5">Register</a>.</p>
                        </div>
                        <div class="form-side position-relative">
                            <?php if(session('error')): ?>
                                <div class="alert alert-danger position-absolute"
                                    style="top: 5%; left: 50%; transform: translateX(-50%)">
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>


                            <div style="height: 95px; position: relative; top: -3rem;"></div>
                            <div class="atu-icon" style="position: relative; top: -3rem;">
                                <a href="">
                                    <img src="/img/custom/atulogo.png" height="15%" width="45%" alt="">
                                </a>
                            </div>
                            <h5 class="header-title mb-3" style="margin-top: 0.5rem">Login</h5>

                            
                            <form class="tooltip-right-bottom" novalidate method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group has-float-label"><input class="" value="<?php echo e(old('email')); ?>"
                                        class="form-control" name="email" required>
                                    <span>E-mail</span>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-tooltip d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group has-float-label"><input class="" name="password" class="form-control"
                                        type="password" required>
                                    <span>Password</span>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-tooltip d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="float-right">
                                    <a  href="<?php echo e(route('forgot-password')); ?>">Forgotten password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Log in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/vendor/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dore.script.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\new-projects-dev\app\resources\views/auth/login.blade.php ENDPATH**/ ?>