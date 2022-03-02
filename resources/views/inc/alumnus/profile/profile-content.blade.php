<style>
    .profile-banner{
        width: 100% !important;
        height: 450px;
        max-height: 450px;
        border: #00558d solid 2px;
        border-radius: 1rem !important;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    .img-border{
        border: #00558d solid 2px !important;
    }

    .nav-link:hover{
        cursor: pointer;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">YOUR PROFILE</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                    <div class="row">
                        <div class="col-12 mb-5"><img class="profile-banner profile-banner-card" src="{{asset('img/profiles/atulogo.png')}}"></div>
                        <div class="col-12 col-lg-5 col-xl-4 col-left">
                            <a href="#" class="lightbox"><img alt="Profile" src="{{asset('img/profiles/p-a1.png')}}" class="img-thumbnail card-img social-profile-img img-border"></a>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="text-center pt-4">
                                        <p class="list-item-heading pt-2">{{ auth()->user()->firstName }}  {{ auth()->user()->lastName }}  {{ auth()->user()->otherName }}</p>
                                        <p class="list-item-heading pt-2">2 / 7</p>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <p class="mb-3">Email: &nbsp;</p>
                                        <p class="mb-3">{{ auth()->user()->email }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Gender: &nbsp;</p>
                                        <p class="mb-3"></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Phone number: &nbsp;</p>
                                        <p class="mb-3"></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Program of study: &nbsp;</p>
                                        <p class="mb-3"></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Department of study: &nbsp;</p>
                                        <p class="mb-3"></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Year of completion: &nbsp;</p>
                                        <p class="mb-3"></p>
                                    </div>
     
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-xl-8 col-right">
                            <div class="card mb-4">
                                <div class="card-body">
                    
                                    <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="profile-toggler">UPDATE PROFILE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="password-toggler">CHANGE PASSWORD</a>
                                        </li>
                                
                                    </ul>

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="profile-content-section" role="tabpanel" aria-labelledby="first-tab">
                                        <form class="tooltip-right-bottom mob-view" novalidate method="POST" action="#">
                                                @csrf
                                                <div class="form-group has-float-label"><input value="{{old('firstName')}}" class="@error('firstName') border-danger @enderror form-control" name="firstName" required>
                                                    <span>First Name</span>
                                                    @error('firstName')
                                                        <div class="invalid-tooltip d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group has-float-label"><input value="{{old('lastName')}}" class="@error('lastName') border-danger @enderror form-control" name="lastName" required>
                                                    <span>Last Name</span>
                                                    @error('lastName')
                                                        <div class="invalid-tooltip d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group has-float-label"><input value="{{old('otherName')}}" class="form-control" name="otherName" required>
                                                    <span>Other Name (optional)</span>
                                                </div>
                                                <div class="form-group has-float-label">
                                                    <input value="{{old('email')}}" class="@error('email') border-danger @enderror form-control" name="email" required>
                                                    <span>E-mail</span>
                                                    @error('email')
                                                        <div class="invalid-tooltip d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group has-float-label">
                                                    <select id="inputState" class="form-control select2-single">
                                                        <option selected="selected">Choose...</option>
                                                        <option value="Male">Male</option>
                                                        <option vlaue="Female">Female</option>
                                                    </select>
                                                    <span>Gender</span> 
                                                </div>
                                                <div class="form-group has-float-label">
                                                    <input value="" type="tel" class="form-control" name="contact" required>
                                                    <span>Phone number</span>
                                                </div>
                                            {{-- Program Studied --}}
                                                <div class="form-group has-float-label">
                                                    <select class="form-control select2-single" name="jQueryTopLabelsState" required data-width="100%">
                                                        <option></option>
                                                        <option value="BTECH - Mechanical Engineering">BTECH - Mechanical Engineering</option>
                                                        <option value="BTECH - Automobile Engineering">BTECH - Automobile Engineering</option>
                                                        <option value="BTECH - Electrical/Electronics Engineering">BTECH - Electrical/Electronics Engineering</option>
                                                        <option value="BTECH - Civil Engineering">BTECH - Civil Engineering</option>
                                                        <option value="BTECH - Building Technology">BTECH - Building Technology</option>
                                                        <option value="BTECH - Medical Laboratory Science">BTECH - Medical Laboratory Science</option>
                                                        <option value="BTECH - Science Laboratory Science">BTECH - Science Laboratory Science</option>
                                                        <option value="BTECH - Statistics">BTECH - Statistics</option>
                                                        <option value="BTECH - Computer Science">BTECH - Computer Science</option>
                                                        <option value="BTECH - Fashion Design and Textiles">BTECH - Fashion Design and Textiles</option>
                                                        <option value="BTECH - Procurement and Supply Chain Management">BTECH - Procurement and Supply Chain Management</option>
                                                        <option value="BTECH - Accounting">BTECH - Accounting</option>
                                                        <option value="BTECH - Banking and Finance">BTECH - Banking and Finance</option>
                                                        <option value="BTECH - Secretaryship and Management Studies">BTECH - Secretaryship and Management Studies</option>
                                                        <option value="BTECH - Marketing">BTECH - Marketing</option>
                                                        <option value="HND - Mechanical Engineering">HND - Mechanical Engineering</option>
                                                        <option value="HND - Electrical/Electronics Engineering">HND - Electrical/Electronics Engineering</option>
                                                        <option value="HND - Building Technology">HND - Building Technology</option>
                                                        <option value="HND - Civil Engineering">HND - Civil Engineering</option>
                                                        <option value="HND - Interior Design and Technology">HND - Interior Design and Technology</option>
                                                        <option value="HND - Furniture Design and Production">HND - Furniture Design and Production</option>
                                                        <option value="HND - Science Laboratory Technology (SLT)">HND - Science Laboratory Technology (SLT)</option>
                                                        <option value="HND - Statistics">HND - Statistics</option>
                                                        <option value="HND - Computer Science">HND - Computer Science</option>
                                                        <option value="HND - Hotel, Catering and Institutional Management (HCIM)">HND - Hotel, Catering and Institutional Management (HCIM)</option>
                                                        <option value="HND - Accountancy">HND - Accountancy</option>
                                                        <option value="HND - Marketing">HND - Marketing</option>
                                                        <option value="HND - Purchasing and Supply">HND - Purchasing and Supply</option>
                                                        <option value="HND - Secretaryship and Management Studies">HND - Secretaryship and Management Studies</option>
                                                        <option value="HND - Bilingual Secretaryship and Management Studies">HND - Bilingual Secretaryship and Management Studies</option>
                                                        <option value="HND - Fashion Design and Textiles">HND - Fashion Design and Textiles</option>
                                                        <option value="CERTIFICATE">CERTIFICATE</option>
                                                    </select>
                                                    <span>Program Studied</span>
                                                </div>
                                                {{-- Department --}}
                                                <div class="form-group has-float-label">
                                                    <select class="form-control select2-single" name="jQueryTopLabelsState" required data-width="100%">
                                                        <option></option>
                                                        <option value="Accounting and Finance">Accounting and Finance</option>
                                                        <option value="Applied Mathematics and Statistics">Applied Mathematics and Statistics</option>
                                                        <option value="Building Technology">Building Technology</option>
                                                        <option value="Civil Engineering">Civil Engineering</option>
                                                        <option value="Electrical and Electronic Engineering">Electrical and Electronic Engineering</option>
                                                        <option value="Fashion Design and Textiles">Fashion Design and Textiles</option>
                                                        <option value="Interior Design and Upholstery Technology">Interior Design and Upholstery Technology</option>
                                                        <option value="Liberal Studies and Communications Technology">Liberal Studies and Communications Technology</option>
                                                        <option value="Management and Public Administration">Management and Public Administration</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Medical laboratory Technology">Medical laboratory Technology</option>
                                                        <option value="Procurement and Supply Chain Management">Procurement and Supply Chain Management</option>
                                                        <option value="Science Laboratory Technology">Science Laboratory Technology</option>
                                                        <option value="Hotel Catering and Institutional Management">Hotel Catering and Institutional Management</option>
                                                
                                                    </select><span>Department of study</span>
                                                </div>
                                                {{-- Year of completion --}}
                                                <div class="form-group has-float-label">
                                                    <select class="form-control select2-single" name="jQueryTopLabelsState" required data-width="100%">
                                                        <option></option>
                                                        
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                        
                                                    
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                
                                                        
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="Before 2000">Before 2000</option>
                                                        
                                                    </select><span>Year of completion</span>
                                                </div>
                                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane show" id="password-section" role="tabpanel" aria-labelledby="second-tab">
                                        <form class="tooltip-right-bottom mob-view" novalidate method="POST" action="#">
                                            <div class="form-group has-float-label">
                                                <input name="old-password" class="@error('old-password') border-danger @enderror form-control" type="password" required>
                                                <span>Old Password</span>
                                                @error('old-password')
                                                <div class="invalid-tooltip d-block">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group has-float-label">
                                                <input name="password" class="@error('password') border-danger @enderror form-control" type="password" required>
                                                <span>New Password</span>
                                                @error('password')
                                                <div class="invalid-tooltip d-block">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group has-float-label"><input name="password_confirmation" class="form-control"
                                                type="password" required>
                                                <span>Confirm Password</span>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </form>
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
    </div>
</main>
@include('footer')