<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 survey-app">
                <div class="mb-2">
                    
                    <div class="text-zero top-right-button-container"><button type="button"
                            class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTIONS</button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
                                class="dropdown-item" href="#">Another action</a></div>
                    </div>
                </div>
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                    

                    <li class="nav-item"><a class="nav-link active" id="third-tab" data-toggle="tab" href="#third"
                            role="tab" aria-controls="third" aria-selected="false">SUBMITTED RESPONSES</a></li>
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane show active" id="third" role="tabpanel" aria-labelledby="third-tab">
                        <div class="row">
                            <div class="col-lg-4 col-12 mb-4">

                                <?php echo $__env->make('inc.dashboard.responses.alumni-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-12 col-lg-8">

                                <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <div class="col-12 <?php echo e($submission->user_id); ?> ques" style="display: none;">
                                        <?php for($i = 0; $i < count($survey->questions); $i++): ?>
                                            <div class="card question d-flex mb-4 card-style">
                                                <div class="d-flex flex-grow-1 min-width-zero">
                                                    <div
                                                        class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                                        <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                                            <span
                                                                class="heading-number d-inline-block"><?php echo e($i + 1); ?>

                                                            </span></div>
                                                    </div>
                                                </div>
                                                <div class="question-collapse collapse show"
                                                    id="q<?php echo e($survey->questions[$i]->id); ?>">
                                                    <div class="card-body pt-0">
                                                        
                                                        <div class="edit-mode">
                                                            <label class="preview-question">
                                                                <?php echo e($survey->questions[$i]->question); ?>

                                                            </label>
                                                            <div class="mb-4">
                                                                <?php if($survey->questions[$i]->option_type_id == 1): ?>
                                                                    <input class="form-control trim" type="text"
                                                                        name="ans[<?php echo e($survey->questions[$i]->id); ?>]"
                                                                        value="<?php $__currentLoopData = $allResponses->where('user_id', $submission->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->question_id == $survey->questions[$i]->id): ?><?php echo e($response->response); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" disabled>
                                                                <?php elseif($survey->questions[$i]->option_type_id ==
                                                                    2): ?>
                                                                    <textarea class="form-control trim"
                                                                        name="ans[<?php echo e($survey->questions[$i]->id); ?>]"
                                                                        cols="30" rows="2"
                                                                        disabled><?php $__currentLoopData = $allResponses->where('user_id', $submission->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->question_id == $survey->questions[$i]->id): ?><?php echo e($response->response); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></textarea>

                                                                <?php elseif($survey->questions[$i]->option_type_id ==
                                                                    3): ?>
                                                                    <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="custom-control custom-radio"><input
                                                                                value="<?php echo e($option->option); ?>"
                                                                                type="radio"
                                                                                <?php $__currentLoopData = $allResponses->where('user_id', $submission->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->response == $option->option): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                id="o<?php echo e($option->id); ?>"
                                                                                name="ans[<?php echo e($survey->questions[$i]->id); ?>]"
                                                                                class="custom-control-input" disabled>
                                                                            <label class="custom-control-label"
                                                                                for="o<?php echo e($option->id); ?>"><?php echo e($option->option); ?></label>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php elseif($survey->questions[$i]->option_type_id ==
                                                                    4): ?>
                                                                    <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input value="<?php echo e($option->option); ?>"
                                                                                class="custom-control-input"
                                                                                type="checkbox"
                                                                                <?php $__currentLoopData = $allResponses->where('user_id', $submission->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->response == $option->option): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                name="ans[<?php echo e($survey->questions[$i]->id); ?>][<?php echo e($option->id); ?>]"
                                                                                class="form-control"
                                                                                id="o<?php echo e($option->id); ?>" disabled>
                                                                            <label for="o<?php echo e($option->id); ?>"
                                                                                class="custom-control-label"><?php echo e($option->option); ?></label>
                                                                        </div>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                                <?php else: ?>
                                                                    <div class="row col-12">
                                                                        <div class="d-flex flex-column col-2">
                                                                            <div style="height: 50px"></div>
                                                                            <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="text-center">
                                                                                    <?php echo e($option->option); ?></div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                        <div class="col-10 row"
                                                                            style="flex-wrap: nowrap">
                                                                            <?php $__currentLoopData = $survey->columns->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="d-flex flex-column justify-content-between"
                                                                                    style="width: 100px; height: 100%; min-width:100px">
                                                                                    <div style="height: 50px"
                                                                                        class="d-flex align-items-center justify-content-center w-100">
                                                                                        <?php echo e($column->question); ?>

                                                                                    </div>
                                                                                    <?php $__currentLoopData = $survey->options->where('question_id', $survey->questions[$i]->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <div class="d-flex justify-content-center">
                                                                                            <input type="radio"  id="" <?php $__currentLoopData = $allResponses->where('user_id', $submission->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($response->response == $column->question): ?> <?php if($response->option_id == $option->id): ?> checked <?php endif; ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                                                        </div>
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
                                    </div>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                        </div>
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
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/dashboard/responses/responses-content.blade.php ENDPATH**/ ?>