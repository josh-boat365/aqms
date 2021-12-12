<div class="card mb-4 sticky-top" style="top: 115px;">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <i class="iconsminds-business-man-woman h4"></i> &nbsp;
                                            <p class="list-item-heading" style="position: relative; top:0.66rem">ALUMNI</p></div>
                                        <div class="separator mb-3"></div>
                                        <div class="scroll h-100 col text-center mt-2" style="max-height: 500px">
                                            @foreach ($users as $user)
                                            <div class="col alumnus-hover py-2 rounded">
                                                <a href="#">
                                                <div class="">{{$user->firstName . " " . $user->lastName}}</div>
                                                </a>
                                            </div>
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