<div class="card mb-4 sticky-top" style="top: 115px; z-index: 0">
    <div class="card-body">
        <div class="d-flex">
            <i class="iconsminds-business-man-woman h4"></i> &nbsp;
            <p class="list-item-heading" style="position: relative; top:0.66rem">ALUMNI</p>
        </div>
        <div class="separator mb-3"></div>
        <div class="scroll h-100 col mt-2" style="max-height: 500px">
            @foreach ($submissions as $submission)
                    {{-- <a href="#"> --}}
                        <div class="alumni col alumnus-hover py-2 rounded">
                            @foreach ($users->where('id', $submission->user_id) as $user)
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                {{ $user->firstName }}
                            @endforeach
                        </div>
                    {{-- </a> --}}
            @endforeach
            {{-- <div class="col alumnus-hover py-2 rounded">
                                                <a href="#">
                                                <div class="">Aaron Kwame Koranteng Odoom</div>
                                                </a>
                                            </div>
                                            <div class="col alumnus-hover py-2 rounded">
                                                <a href="#">
                                                <div class="">Aaron Kwame Koranteng Odoom</div>
                                                </a>
                                            </div>
                                            <div class="col alumnus-hover py-2 rounded">
                                                <a href="#">
                                                <div class="">Aaron Kwame Koranteng Odoom</div>
                                                </a>
                                            </div>
                                            <div class="col alumnus-hover py-2 rounded">
                                                <a href="#">
                                                <div class="">Aaron Kwame Koranteng Odoom</div>
                                                </a>
                                            </div>
                                            <div class="col alumnus-hover py-2 rounded">
                                                <a href="#">
                                                <div class="">Aaron Kwame Koranteng Odoom</div>
                                                </a>
                                            </div> --}}
        </div>

    </div>
</div>
