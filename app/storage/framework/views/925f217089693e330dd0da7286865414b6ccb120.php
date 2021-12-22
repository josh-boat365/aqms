<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="active"><a href="#survey"><i class="iconsminds-check"></i> Surveys</a></li>
                <li class=""><a href="<?php echo e(route('alumnus.profile')); ?>"><i class="simple-icon-people"></i>Profile</a></li>
                
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="survey" id="survey">
                <li><a href="<?php echo e(route('home')); ?>"><i class="simple-icon-eye"></i> <span class="d-inline-block">View All Surveys</span></a>
                    <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(url('/home/surveys/' . $survey->id)); ?>"><i class="iconsminds-check"></i> <span
                                class="d-inline-block"><?php echo e($survey->name); ?></span></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>
               
            </ul>
            
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/alumnus/side-bar.blade.php ENDPATH**/ ?>