<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold h5">Add New Survey</h5><button type="button" class="close"
                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            
            <form class="tooltip-right-bottom" method="POST" novalidate action="<?php echo e(route('survey.store')); ?>">
                <?php echo csrf_field(); ?>
                
                <div class="form-group has-float-label position-relative"><label class="font-weight-bold">Title</label>
                    <input type="text" class="form-control rounded" value="<?php echo e(old('title')); ?>" name="title">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-tooltip d-block"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group"><label class="font-weight-bold">Details</label>
                    <textarea placeholder="" class="form-control rounded" rows="2" name="details"><?php echo e(old('details')); ?></textarea>
                </div>
                
                
                <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                        data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/dashboard/survey/survey-form.blade.php ENDPATH**/ ?>