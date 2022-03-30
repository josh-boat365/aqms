

<form action="<?php echo e(route('survey.update')); ?>" method="post" id="update-form" class="row col">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="survey_id" value="<?php echo e($survey->id); ?>">
    <div class="col-lg-4 col-12 mb-4">
        <div class="card mb-4">
            <div class="position-absolute card-top-buttons"><div class="btn btn-header-light icon-button desc-edit"><i
                        class="simple-icon-pencil"></i></div></div>
            <div class="card-body">
                <p class="list-item-heading mb-4">Summary</p>
                <p class="text-muted text-small mb-2">Name</p>
                <p class="mb-3 name"><?php echo e($survey->name); ?></p>
                <input type="text" class="form-control" id="survey-name" style="display: none" name='name' value="<?php echo e($survey->name); ?>">
                <p class="text-muted text-small mb-2">Description</p>
                <p class="desc mb-3"><?php echo e($survey->description); ?></p>
                <textarea class="form-control" id="survey-description" rows="10" style="display: none"
                    name="description"><?php echo e($survey->description); ?></textarea>
                <p class="text-muted text-small mb-2">Date Created</p>
                <p class="mb-3"><?php echo e($survey->created_at->format('Y-m-d')); ?> </p>
                
            </div>
        </div>
    </div>
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/dashboard/question/question-summary.blade.php ENDPATH**/ ?>