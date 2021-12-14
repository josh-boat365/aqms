{{-- Mobile View For Tiles  --}}
<style type="text/css">
    .tile-x{
                color: rgb(187, 25, 25) !important;
            }
            p{
                margin: auto;
            }
        @media (min-width: 320px) and (max-width: 656px){
            .dash-survey-tile{
                display: flex !important;
                flex-direction: column !important;
                }
            .tile-info p{
                width: 7rem !important;
                margin: 5px !important;
            }
            .tile-header .card-body .col-3 h5{
                font-size: 11px !important;
            }
            
        }
    </style>
<a href="{{ url('/home/surveys/' . $survey->id) }}">
    <div class="card d-flex flex-row mb-3">
        <div class="d-flex flex-grow-1 min-width-zero">
            <div class="dash-survey-tile card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
               <div class="col-3 tile-info">
                <span class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0">
        
                    <div class="align-middle d-inline-block">{{$survey->name}}</div>
                </span>
               </div>
               
               <div class="col-3 title-info">
                <div class="w-15 w-xs-100">
                    <p class="mb-0 text-muted font-weight-bold  text-medium">4/50</p>
                </div>
                
               </div>
                
                <div class="col-3 tile-info">
                    <div class="w-8 w-xs-100">
                        <p class="mb-0 text-muted font-weight-bold text-medium">{{$survey->created_at->format('Y-m-d') }}</p>
                    </div>
                </div>
    
                <div class="col-3 tile-info">
                    <div class="w-8 w-xs-100">
                        <p class="mb-0 tile-x text-muted font-weight-bold text-medium">{{$survey->created_at->format('Y-m-d') }}</p>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    
</a>
