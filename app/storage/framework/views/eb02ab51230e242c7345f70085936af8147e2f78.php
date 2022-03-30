<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 survey-app">
                <div class="mb-2">
                    <h1><?php echo e($survey->name); ?></h1>
                    <div class="text-zero top-right-button-container"><button type="button"
                            class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTIONS</button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
                                class="dropdown-item" href="#">Another action</a></div>
                    </div>
                </div>
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                            role="tab" aria-controls="first" aria-selected="true">DETAILS</a></li>
                    <li class="nav-item"><a class="nav-link" id="third-tab" data-toggle="tab" href="#third"
                            role="tab" aria-controls="third" aria-selected="false">RESULTS</a></li>
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="row">
                            <?php echo $__env->yieldContent('question-summary'); ?>
                            <?php echo $__env->yieldContent('question-list'); ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                        <div class="row">
                            <div class="col-lg-4 col-12 mb-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <p class="list-item-heading mb-4">Quota</p>
                                        <div class="mb-4">
                                            <p class="mb-2">Gender</p>
                                            <div class="progress mb-3">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-theme-2" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="p-0 pb-1 w-10"><span
                                                                class="log-indicator border-theme-1 align-middle"></span>
                                                        </td>
                                                        <td class="p-0 pb-1"><span
                                                                class="font-weight-medium text-muted text-small">105/125
                                                                Male</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-0 pb-1 w-10"><span
                                                                class="log-indicator border-theme-2 align-middle"></span>
                                                        </td>
                                                        <td class="p-0 pb-1"><span
                                                                class="font-weight-medium text-muted text-small">90/125
                                                                Female</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mb-4">
                                            <p class="mb-2">Education</p>
                                            <div class="progress mb-3">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-theme-2" role="progressbar"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="p-0 pb-1 w-10"><span
                                                                class="log-indicator border-theme-1 align-middle"></span>
                                                        </td>
                                                        <td class="p-0 pb-1"><span
                                                                class="font-weight-medium text-muted text-small">139/125
                                                                College</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-0 pb-1 w-10"><span
                                                                class="log-indicator border-theme-2 align-middle"></span>
                                                        </td>
                                                        <td class="p-0 pb-1"><span
                                                                class="font-weight-medium text-muted text-small">95/125
                                                                High School</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <p class="mb-2">Age</p>
                                            <div class="progress mb-3">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="35"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-theme-2" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-theme-3" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="p-0 pb-1 w-10"><span
                                                                class="log-indicator border-theme-1 align-middle"></span>
                                                        </td>
                                                        <td class="p-0 pb-1"><span
                                                                class="font-weight-medium text-muted text-small">50/75
                                                                18-24</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-0 pb-1 w-10"><span
                                                                class="log-indicator border-theme-2 align-middle"></span>
                                                        </td>
                                                        <td class="p-0 pb-1"><span
                                                                class="font-weight-medium text-muted text-small">40/75
                                                                24-30</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-0 pb-1 w-10"><span
                                                                class="log-indicator border-theme-3 align-middle"></span>
                                                        </td>
                                                        <td class="p-0 pb-1"><span
                                                                class="font-weight-medium text-muted text-small">60/75
                                                                30-40</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h6 class="mb-4">How old are you?</h6>
                                        <div class="dashboard-donut-chart chart"><canvas id="ageChart"></canvas></div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h6 class="mb-4">What is your gender?</h6>
                                        <div class="dashboard-donut-chart chart"><canvas id="genderChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h6 class="mb-4">What is your employment status?</h6>
                                        <div class="dashboard-donut-chart chart"><canvas id="workChart"></canvas></div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4">What programming languages do you use?</h6>
                                        <div class="dashboard-donut-chart chart"><canvas id="codingChart"></canvas>
                                        </div>
                                    </div>
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
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/dashboard/question/question-content.blade.php ENDPATH**/ ?>