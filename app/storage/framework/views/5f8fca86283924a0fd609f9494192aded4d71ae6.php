<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 survey-app">
                <div class="mb-2">
                    <h1><?php echo e($survey->name); ?></h1>
                    
                </div>
                <?php echo $__env->make('inc.alumnus.question.survey-description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <div class="mt-4"></div>
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
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/alumnus/question/question-content.blade.php ENDPATH**/ ?>