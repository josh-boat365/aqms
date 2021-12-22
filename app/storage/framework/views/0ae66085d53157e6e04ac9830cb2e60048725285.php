<style>
    .tile-header h5{
        width: 142%;
        padding: 0;
        margin: 0;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Surveys</h1>
                </div>
               
                <div class="separator mb-5"></div>
                
                <?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  
                  <div class="card mb-5 tile-header">
                    <div class=" card-body row">
                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Title</h5>
                        </div>

                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Progress</h5>
                        </div>

                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Expiration Date</h5>
                        </div>

                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Status</h5>
                        </div>

                    </div>
                </div>
                <div class="list disable-text-selection" data-check-all="checkAll">
                    <?php echo $__env->yieldContent('survey-tiles'); ?>
                   
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

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/alumnus/survey/survey-content.blade.php ENDPATH**/ ?>