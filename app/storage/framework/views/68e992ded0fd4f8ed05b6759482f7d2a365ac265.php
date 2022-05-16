<div class="col">
    <div class="container">
        <form action="<?php echo e(route('alumnus.survey.save')); ?>" method="post" id="save-form" class="d-flex flex-column align-items-center">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="survey_id" value="<?php echo e($survey->id); ?>">
            <?php echo $__env->make('inc.alumnus.question.question-card', ['survey', $survey], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>

    </div>
    
</div>

</form>
<?php /**PATH C:\Users\_kay_\Documents\Projects\aqms\app\resources\views/inc/alumnus/question/question-list.blade.php ENDPATH**/ ?>