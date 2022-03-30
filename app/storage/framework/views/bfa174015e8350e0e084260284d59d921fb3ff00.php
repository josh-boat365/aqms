

<style type="text/css">
    .card-style{
        width: 80% !important;
        margin: 0 auto;
        }
        @media (min-width: 320px) and (max-width: 652px){
            .card-style{
                width: 100%;
            }
        }
</style>

<?php for($i = 0; $i < count($survey->questions); $i++): ?>

    <div class="col-12">
        <div class="card question d-flex mb-4 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
                            class="heading-number d-inline-block"><?php echo e($i + 1); ?>

                        </span></div>
                </div>
            </div>
            <div class="question-collapse collapse show" id="q<?php echo e($survey->questions[$i]->id); ?>">
                <div class="card-body pt-0">
                    
                    <div class="edit-mode">
                        <label class="preview-question">
                            <?php echo e($survey->questions[$i]->question); ?>

                        </label>
                        <div class="mb-4">
                            <?php if($survey->questions[$i]->option_type_id == 1): ?>
                                <input class="form-control trim" type="text"
                                    name="ans[<?php echo e($survey->questions[$i]->id); ?>]" value="<?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->question_id == $survey->questions[$i]->id): ?><?php echo e($response->response); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                            <?php elseif($survey->questions[$i]->option_type_id == 2): ?>
                                <textarea class="form-control" name="ans[<?php echo e($survey->questions[$i]->id); ?>]"
                                    cols="30" rows="2"><?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->question_id == $survey->questions[$i]->id): ?><?php echo e($response->response); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></textarea>

                            <?php elseif($survey->questions[$i]->option_type_id == 3): ?>
                                <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-radio"><input value="<?php echo e($option->option); ?>"
                                            type="radio" id="o<?php echo e($option->id); ?>"
                                            <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->response == $option->option): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            name="ans[<?php echo e($survey->questions[$i]->id); ?>]" class="custom-control-input">
                                        <label class="custom-control-label"
                                            for="o<?php echo e($option->id); ?>"><?php echo e($option->option); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php elseif($survey->questions[$i]->option_type_id == 4): ?>
                                <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-checkbox">
                                        <input value="<?php echo e($option->option); ?>" class="custom-control-input"
                                            type="checkbox"
                                            <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->response ==  $option->option): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            name="ans[<?php echo e($survey->questions[$i]->id); ?>][<?php echo e($option->id); ?>]"
                                            id="o<?php echo e($option->id); ?>">
                                        <label for="o<?php echo e($option->id); ?>"
                                            class="custom-control-label"><?php echo e($option->option); ?></label>
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
                                            <div class="d-flex flex-column justify-content-between"
                                                style="width: 100px; height: 100%; min-width:100px">
                                                <div style="height: 50px"
                                                    class="d-flex align-items-center justify-content-center w-100">
                                                    <?php echo e($column->question); ?>

                                                </div>
                                                <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="d-flex justify-content-center check-box"><input type="radio"
                                                            name="ans[<?php echo e($survey->questions[$i]->id); ?>][<?php echo e($option->id); ?>]"
                                                            id="" value="<?php echo e($column->question); ?>"
                                                            <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->response ==  $column->question): ?> <?php if($response->option_id == $option->id): ?> checked <?php endif; ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            ></div>
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
    </div>

<?php endfor; ?>
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/alumnus/question/question-card.blade.php ENDPATH**/ ?>