<style>
    .orderby-btn{
        width: 15%;
        height: 2.2rem;
    }
    .orderby-search{
        height: 2.2rem !important;
        width: 30rem;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Submissions</h1>
                    <div class="top-right-button-container">
                        
                        
                        
                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" aria-hidden="true">
                            <?php echo $__env->yieldContent('survey-form'); ?>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="mb-2"><a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse"
                        href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">Display
                        Options <i class="simple-icon-arrow-down align-middle"></i></a>
                    <div class="collapse d-md-block" id="displayOptions">
                        <div class="d-flex">
                            <div class="btn-group orderby-btn float-md-left mr-1 mb-1">
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Order
                                    By</button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a> <a
                                        class="dropdown-item" href="#">Another action</a></div>
                            </div>
                            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                <input class="orderby-search" placeholder="Search..."></div>
                        </div>
                    </div>
                </div>
                <div class="separator mb-5"></div>
                <?php echo $__env->make('inc.dashboard.dashboard-welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <div class="card mb-5 tile-header">
                    <div class=" card-body row">
                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Survey</h5>
                        </div>

                        <div class="col-3 text-center">
                            <h5 class="font-weight-bold h5">Submissions</h5>
                        </div>
                    </div>
                </div>
                <div class="list disable-text-selection" data-check-all="checkAll">
                    <?php echo $__env->yieldContent('submission-tiles'); ?>
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
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/dashboard/submissions/content.blade.php ENDPATH**/ ?>