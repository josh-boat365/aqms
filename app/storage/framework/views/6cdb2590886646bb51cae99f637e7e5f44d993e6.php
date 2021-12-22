<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 survey-app">
                <div class="mb-2">
                    <h1><?php echo e($survey->name); ?></h1>
                    
                </div>
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                            role="tab" aria-controls="first" aria-selected="true">CREATE QUESTIONS</a></li>
                    
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="row">
                            <?php echo $__env->yieldContent('question-summary'); ?>
                            <?php echo $__env->yieldContent('question-list'); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll">
                <p class="text-muted text-small">Status</p>
                <ul class="list-unstyled mb-5">
                    <?php echo $__env->yieldContent('stat'); ?>
                </ul>
                
            </div>
        </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i class="simple-icon-options"></i></a>
    </div>
    
</main>
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/dashboard/question/question-content.blade.php ENDPATH**/ ?>