<?php for($i = 0; $i < count($survey->questions); $i++): ?>

    <div>
        <div class="card question d-flex mb-4 edit-quesiton">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
                            class="heading-number d-inline-block"><?php echo e($i + 1); ?>

                        </span><span class="preview-question"><?php echo e($survey->questions[$i]->question); ?></span></div>
                </div>
                <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                    <div class="btn btn-outline-theme-3 icon-button edit-button"><i class="simple-icon-pencil"></i></div>
                    <div class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></div>
                    <div class="btn btn-outline-theme-3 icon-button rotate-icon-click rotate" type="button"
                        data-toggle="collapse" data-target="#q<?php echo e($survey->questions[$i]->id); ?>" aria-expanded="true"
                        aria-controls="q<?php echo e($survey->questions[$i]->id); ?>"><i
                            class="simple-icon-arrow-down with-rotate-icon"></i></div>
                </div>
            </div>
            <div class="question-collapse collapse show" id="q<?php echo e($survey->questions[$i]->id); ?>">
                <div class="card-body pt-0">
                    <div class="edit-mode">
                        
                        <div class="form-group mb-5 que-section"><label>Question</label>
                            
                            <input type="hidden" class="que-num" value="<?php echo e($survey->questions[$i]->id); ?>">
                            <input class="form-control writtenQuestion" type="text"
                                name="ques[old][<?php echo e($survey->questions[$i]->id); ?>]"
                                value="<?php echo e($survey->questions[$i]->question); ?>">
                        </div>

                        <div class="separator mb-4"></div>

                        
                        <div class="form-group opt-type"><label class="d-block">Answer Type</label>
                            
                            <select class="form-control select2-single option-type" data-width="100%"
                                name="ques[old][<?php echo e($survey->questions[$i]->id); ?>][opt_type]">
                                
                                <?php $__currentLoopData = $optionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($optionType->id); ?>" <?php if($survey->questions[$i]->option_type_id == $optionType->id): ?>
                                        selected
                                <?php endif; ?>><?php echo e($optionType->type); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>


<div class="form-group ans-form">
    <div class="grid ans-group" <?php if($survey->questions[$i]->option_type_id != 5): ?> style="display: none" <?php endif; ?>>
        <label class="d-block">Answers</label>
        <div class="answers mb-3 d-flex col">
            <div class="col rows">
                <h5>Rows</h5>
                <div class="sortable">
                    <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-1 position-relative ans">
                            <input class="form-control" type="text"
                                name="ques[old][<?php echo e($survey->questions[$i]->id); ?>][ans][rows][old][<?php echo e($option->id); ?>]"
                                value="<?php echo e($option->option); ?>">
                            
                            <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                        class="simple-icon-cursor-move"></i> </span><span
                                    class="badge badge-pill btn del-ans"><i class="simple-icon-trash"></i></span></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col columns">
                <h5>Columns</h5>
                <div class="sortable">
                    <?php $__currentLoopData = $survey->columns->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-1 position-relative ans"><input class="form-control" type="text"
                                name="ques[old][<?php echo e($survey->questions[$i]->id); ?>][ans][columns][old][<?php echo e($option->id); ?>]"
                                value="<?php echo e($option->question); ?>">
                            
                            <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                        class="simple-icon-cursor-move"></i> </span><span
                                    class="badge badge-pill btn del-ans"><i class="simple-icon-trash"></i></span></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
        <div class="col-12 row">
            <div class="col text-center row-btn">
                <div class="btn btn-outline-primary btn-sm mb-2 grid-row"><i
                        class="simple-icon-plus btn-group-icon"></i>
                    Add
                    Row</div>
            </div>
            <div class="col text-center column-btn">
                <div class="btn btn-outline-primary btn-sm mb-2 grid-column"><i
                        class="simple-icon-plus btn-group-icon"></i>
                    Add
                    Column</div>
            </div>
        </div>
    </div>
    <div class="non-grid ans-group" <?php if($survey->questions[$i]->option_type_id == 5): ?> style="display: none" <?php endif; ?>>
        <label class="d-block">Answers</label>
        <div class="answers mb-3 sortable">

            <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-1 position-relative ans"><input class="form-control" type="text"
                        name="ques[old][<?php echo e($survey->questions[$i]->id); ?>][ans][old][<?php echo e($option->id); ?>]"
                        value="<?php echo e($option->option); ?>">
                    
                    <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                class="simple-icon-cursor-move"></i> </span><span
                            class="badge badge-pill btn del-ans"><i class="simple-icon-trash"></i></span></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="text-center">
            <div class="btn btn-outline-primary btn-sm mb-2 ans-btn"><i class="simple-icon-plus btn-group-icon"></i> Add
                Answer</div>
        </div>
    </div>
</div>
</div>


<div class="view-mode">
    <label class="preview-question">
        
    </label>
    
    <div class="mb-4">
        
    </div>
</div>
</div>
</div>
</div>
</div>

<?php endfor; ?>
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/dashboard/question/question-card.blade.php ENDPATH**/ ?>