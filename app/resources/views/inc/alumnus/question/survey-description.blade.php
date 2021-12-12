
<script type="text/javascript">
   
        //displays modal once on page load - by storing user session
        $(window).on('load',function(){
        if (!sessionStorage.getItem('shown-modal')){
            $('.desc-survey').modal('show');
            sessionStorage.setItem('shown-modal', 'true');
        }
        });
    
    
        </script>
        
       <!-- Modal -->
       <div class="modal fade desc-survey"  id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog bg-transparent" role="document">
            <div class="modal-content" style="border-radius:1rem; ">
                <div class="modal-header">
                    <h5 class="modal-title" >Survey Description</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div class="modal-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Reiciendis totam natus voluptatesrerum ab fugiat!
                     Nemo cupiditate nihil ea in architecto ut placeat, voluptas, nulla veritatis 
                     tempora repellat quis debitis exercitationem, 
                     amet odio dolores totam possimus delectus sit accusantium. Ratione magni adipisci nam 
                     veritatis dicta! Repudiandae hic 
                     rem voluptatibus expedita, aliquid officiis ea ut deleniti, ipsa, ullam a 
                     accusamus animi dicta tenetur facilis quibusdam quaerat.
                     veritatis dicta! Repudiandae hic 
                     rem voluptatibus expedita, aliquid officiis ea ut deleniti, ipsa, ullam a 
                     accusamus animi dicta tenetur facilis quibusdam quaerat.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Reiciendis totam natus voluptatesrerum ab fugiat!
                     Nemo cupiditate nihil ea in architecto ut placeat, voluptas, nulla veritatis 
                     tempora repellat quis debitis exercitationem, 
                     amet odio dolores totam possimus delectus sit accusantium. Ratione magni adipisci nam 
                     veritatis dicta! Repudiandae hic 
                     rem voluptatibus expedita, aliquid officiis ea ut deleniti, ipsa, ullam a 
                     accusamus animi dicta tenetur facilis quibusdam quaerat.
                     veritatis dicta! Repudiandae hic 
                     rem voluptatibus expedita, aliquid officiis ea ut deleniti, ipsa, ullam a 
                     accusamus animi dicta tenetur facilis quibusdam quaerat.
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>