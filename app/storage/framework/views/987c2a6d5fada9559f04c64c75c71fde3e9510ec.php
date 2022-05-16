<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Surveys</h1>
                    
                    <div class="modal fade modal-right" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5><button
                                        type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group"><label>Title</label> <input type="text"
                                                class="form-control" placeholder=""></div>
                                        <div class="form-group"><label>Details</label> <textarea
                                                class="form-control" rows="2"></textarea></div>
                                        <div class="form-group"><label>Category</label> <select
                                                class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;">&nbsp;</option>
                                                <option value="Flexbox">Flexbox</option>
                                                <option value="Sass">Sass</option>
                                                <option value="React">React</option>
                                            </select></div>
                                        <div class="form-group"><label>Labels</label> <select
                                                class="form-control select2-multiple" multiple="multiple"
                                                data-width="100%">
                                                <option value="New Framework">New Framework</option>
                                                <option value="Education">Education</option>
                                                <option value="Personal">Personal</option>
                                            </select></div>
                                        <div class="form-group"><label>Status</label>
                                            <div class="custom-control custom-checkbox"><input type="checkbox"
                                                    class="custom-control-input" id="customCheck1"> <label
                                                    class="custom-control-label"
                                                    for="customCheck1">Completed</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Cancel</button> <button type="button"
                                        class="btn btn-primary">Submit</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2"><a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse"
                        href="#displayOptions" role="button" aria-expanded="true"
                        aria-controls="displayOptions">Display
                        Options <i class="simple-icon-arrow-down align-middle"></i></a>
                    
                </div>
                <div class="separator mb-5"></div>
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
    
</main><?php /**PATH C:\Users\_kay_\Documents\Projects\aqms\app\resources\views/inc/alumnus/survey/survey-content.blade.php ENDPATH**/ ?>