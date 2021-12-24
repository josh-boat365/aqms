
<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li><a href="#dashboard"><i class="iconsminds-shop-4"></i> <span>Dashboards</span></a></li>
                <li class=""><a href="#surveys"><i class="iconsminds-check"></i> Surveys</a></li>
                <li class=""><a href="#"><i class="simple-icon-people"></i>Users</a></li>
                <li class=""><a href="<?php echo e(route('submissions.index')); ?>"><i class="iconsminds-bar-chart-4"></i>Responses</a></li>
                <li class="active"><a href="<?php echo e(route('dashboard.profile')); ?>"><i class="simple-icon-people"></i>Profile</a></li>
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="scroll">
            
            <ul class="list-unstyled" data-link="dashboard">

                <li><a href="Dashboard.Analytics.html"><i class="simple-icon-pie-chart"></i> <span
                            class="d-inline-block">Analytics</span></a></li>
            </ul>

            
            <ul class="list-unstyled" data-link="surveys" id="surveys">
                <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="simple-icon-eye"></i> <span class="d-inline-block">View All Surveys</span></a>
                </li>

                
                <?php if($surveys->where('status_id', 1)->count() > 0): ?>
                    <li><a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50"><i
                                class="simple-icon-arrow-down"></i> <span class="d-inline-block">Drafts</span></a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <?php $__currentLoopData = $surveys->where('status_id', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(url('/dashboard/surveys/' . $survey->id)); ?>"><i
                                                class="simple-icon-clock"></i> <span
                                                class="d-inline-block"><?php echo e($survey->name); ?></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                
                <?php if($surveys->where('status_id', 3)->count() > 0): ?>
                    <li><a href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
                            aria-controls="collapseProduct" class="rotate-arrow-icon opacity-50"><i
                                class="simple-icon-arrow-down"></i> <span class="d-inline-block">Archived</span></a>
                        <div id="collapseProduct" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <?php $__currentLoopData = $surveys->where('status_id', 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(url('/dashboard/surveys/' . $survey->id)); ?>"><i
                                                class="simple-icon-drawer"></i> <span
                                                class="d-inline-block"><?php echo e($survey->name); ?></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                
                <?php if($surveys->where('status_id', 2)->count() > 0): ?>
                    <li><a href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                            aria-controls="collapseProfile" class="rotate-arrow-icon opacity-50"><i
                                class="simple-icon-arrow-down"></i> <span class="d-inline-block">Deployed</span></a>
                        <div id="collapseProfile" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <?php $__currentLoopData = $surveys->where('status_id', 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(url('/dashboard/surveys/' . $survey->id)); ?>"><i
                                                class="iconsminds-yes"></i> <span
                                                class="d-inline-block"><?php echo e($survey->name); ?></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

            </ul>

            
            

            
            
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/dashboard/profile/side-bar.blade.php ENDPATH**/ ?>