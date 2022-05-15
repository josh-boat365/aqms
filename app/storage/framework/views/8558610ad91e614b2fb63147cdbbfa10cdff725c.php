

<style type="text/css">
    .card-style{
        width: 65% !important;
        margin: 0 auto;
        }
</style>

<?php for($i = 0; $i < count($survey->questions); $i++): ?>

    <div class="<?php if($survey->questions[$i]->option_type_id == 5): ?> col-12 <?php else: ?> col-lg-12 <?php endif; ?>">
        <div class="card question d-flex mb-4 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0  w-80 d-flex mb-1 mt-1">

                        
                        <div class="heading-number d-inline-block"> <?php echo e($i + 1); ?> </div>

                        
                        <div class="ques-header" id="q<?php echo e($survey->questions[$i]->id); ?>">
                            <?php echo e($survey->questions[$i]->question); ?>

                        </div>

                    </div>
                </div>
            </div>
            
            <div class="card-body ">
                <div class="mb-4">
                    <?php if($survey->questions[$i]->option_type_id == 1): ?>
                        <input class="form-control" type="text" name="ans[<?php echo e($survey->questions[$i]->id); ?>]"
                            <?php $__currentLoopData = $responses->where('question_id', $survey->questions[$i]->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        value="<?php echo e($response->response); ?>"
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                <?php elseif($survey->questions[$i]->option_type_id == 2): ?>
                    <textarea class="form-control" name="ans[<?php echo e($survey->questions[$i]->id); ?>]" cols="30"
                        rows="2"><?php $__currentLoopData = $responses->where('question_id', $survey->questions[$i]->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($response->response); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </textarea>
    
                <?php elseif($survey->questions[$i]->option_type_id == 3): ?>
                    <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="custom-control custom-radio"><input value="<?php echo e($option->option); ?>"
                                type="radio" id="o<?php echo e($option->id); ?>"
                                name="ans[<?php echo e($survey->questions[$i]->id); ?>]" class="custom-control-input"
                                >
                            <label class="custom-control-label"
                                for="o<?php echo e($option->id); ?>"><?php echo e($option->option); ?></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                <?php elseif($survey->questions[$i]->option_type_id == 4): ?>
                    <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="custom-control custom-checkbox">
                            <input value="<?php echo e($option->option); ?>" class="custom-control-input" type="checkbox"
                                name="ans[<?php echo e($survey->questions[$i]->id); ?>][]" id="o<?php echo e($option->id); ?>"
                                <?php $__currentLoopData = $responses->where('question_id', $survey->questions[$i]->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($response->response == $option->option): ?>
                                checked
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                    <label for="o<?php echo e($option->id); ?>"
                        class="custom-control-label"><?php echo e($option->option); ?></label>
                </div>
            </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php else: ?>
<div class="row col-12">
    
    <div class="d-flex flex-column col-2">
        <div style="height: 50px"></div>
        
        <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center"><?php echo e($option->option); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
    <div class="col-10 row" style="flex-wrap: nowrap">
        <?php $__currentLoopData = $survey->columns->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex flex-column justify-content-between" style="width: 100px; height: 100%; min-width:100px">
                <div style="height: 50px" class="d-flex align-items-center justify-content-center w-100">
                    <?php echo e($column->question); ?></div>
                
                <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-center"><input type="radio"
                            name="ans[<?php echo e($survey->questions[$i]->id); ?>][<?php echo e($option->id); ?>]" id="" value="<?php echo e($column->question); ?>"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

        

    </div>
</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>

<?php endfor; ?>
<?php /**PATH C:\Users\_kay_\Documents\Projects\aqms\app\resources\views/inc/alumnus/question/question-card.blade.php ENDPATH**/ ?>