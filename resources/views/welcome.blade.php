
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
                 <h1>Hi <span class="name">{{ auth()->user()->firstName }} {{ auth()->user()->lastName }}!</span></h1>
                 <h2>Please update your profile to start survey.</h2>
                 <h4>Click on this <a style="color: red" href="{{ route('alumnus.profile') }}">Link</a> to access profile tab.</h4>
                 <h4>Thank You.</h4>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>