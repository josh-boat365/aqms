
<style type="text/css">
    .tile-x {
        color: rgb(187, 25, 25) !important;
    }

    p {
        margin: auto;
    }

    @media (min-width: 320px) and (max-width: 656px) {
        .dash-survey-tile {
            display: flex !important;
            flex-direction: row !important;
        }
        .tile-text{
            font-size: 74%;
        }
        .surv-name{
            white-space: normal !important;
            position: relative;
            left: -1rem;
        }
        .surv-stats{
            padding: 5px;
            font-size: 8px;

        }
        
        .tile-info p {
            width: 4rem !important;
            
        }

        .tile-header .card-body .col-3 h5 {
            font-size: 11px !important;
        }

    }

</style>
<?php if($submissions->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() == 0): ?>
    <a href="<?php echo e(url('/home/surveys/' . $survey->id)); ?>">
<?php endif; ?>

<div class="card d-flex flex-row mb-3">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="dash-survey-tile card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="col-3 tile-info">
                <span class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0">

                    <div class="align-middle surv-name tile-text d-inline-block"><?php echo e($survey->name); ?></div>
                </span>
            </div>

            <div class="col-3 title-info">
                <div class="w-15 w-xs-100">
                    <p class="mb-0 text-muted tile-text font-weight-bold  text-medium">
                        
                        <?php if($progresses->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() > 0): ?>
                            <?php $__currentLoopData = $progresses->where('user_id', auth()->user()->id)->where('survey_id', $survey->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($progress->progress); ?>/<?php echo e($survey->questions->count()); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            0/<?php echo e($survey->questions->count()); ?>

                        <?php endif; ?>

                    </p>
                </div>

            </div>

            <div class="col-3 tile-info">
                <div class="w-8 w-xs-100">
                    <p class="mb-0 tile-x tile-text text-muted font-weight-bold text-medium">
                        <?php echo e($survey->expiration_date); ?></p> 
                </div>
            </div>

            <div class="col-3 tile-info">
                <div class="w-8 w-xs-100">
                    <p
                        class="mb-0 font-weight-bold surv-stats  text-medium badge badge-pill  <?php if($submissions->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() > 0): ?>
                            badge-success">
                        submitted
                    <?php else: ?>
                        badge-primary"> not Submitted
                        <?php endif; ?>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<?php if($submissions->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() == 0): ?>
    </a>
<?php endif; ?>
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/alumnus/survey/survey-tile.blade.php ENDPATH**/ ?>