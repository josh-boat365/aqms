
<script type="text/javascript">
    
    // displays modal everytime on pageload
        $(document).ready(function(){
            $(".desc-survey").modal('show');
        });
    
    
        </script>

       <div class="modal fade desc-survey"  id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog bg-transparent" role="document">
            <div class="modal-content" style="border-radius:1rem; ">
                <div class="modal-header">
                    <h5 class="modal-title" >Welcome Alumnus</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div class="modal-body">
                 <h1>Hi! &nbsp;<span class="name"><?php echo e(auth()->user()->firstName); ?> <?php echo e(auth()->user()->lastName); ?></span></h1>
                 <h2>Please Kindly Update Your Profile Before Starting Survey.</h2>
                 <h4>Click on this <a style="color: red" href="<?php echo e(route('alumnus.profile')); ?>">Link</a> to access profile tab.</h4>
                 <h4>Thanks.</h4>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div><?php /**PATH D:\Projects\new-projects-dev\app\resources\views/welcome.blade.php ENDPATH**/ ?>