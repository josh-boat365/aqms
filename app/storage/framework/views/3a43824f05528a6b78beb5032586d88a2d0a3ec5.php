<div class="card mb-4 sticky-top" style="top: 115px; z-index: 0">
    <div class="card-body">
        <div class="d-flex">
            <i class="iconsminds-business-man-woman h4"></i> &nbsp;
            <p class="list-item-heading" style="position: relative; top:0.66rem">ALUMNI</p>
        </div>
        <div class="separator mb-3"></div>
        <div class="scroll h-100 col mt-2" style="max-height: 500px">
            <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="alumni col alumnus-hover py-2 rounded">
                            <?php $__currentLoopData = $users->where('id', $submission->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                <?php echo e($user->firstName); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>

    </div>
</div>
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/dashboard/responses/alumni-list.blade.php ENDPATH**/ ?>