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

                                <?php echo $__env->yieldContent('alumni-list'); ?>                                                          
                            </div>
                            <div class="col-12 col-lg-8">

                                <?php echo $__env->yieldContent('question-list'); ?>
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
<?php /**PATH D:\Projects\new-projects-dev\app\resources\views/inc/dashboard/responses/content.blade.php ENDPATH**/ ?>