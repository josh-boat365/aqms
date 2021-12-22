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
                        <div class="col-12 mb-5"><img class="social-header card-img" src="<?php echo e(asset('img/profiles/p-h3.jpg')); ?>"></div>
                        <div class="col-12 col-lg-5 col-xl-4 col-left">
                            <a href="#" class="lightbox"><img alt="Profile" src="<?php echo e(asset('img/profiles/p-a1.png')); ?>" class="img-thumbnail card-img social-profile-img"></a>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="text-center pt-4">
                                        <p class="list-item-heading pt-2"><?php echo e(auth()->user()->firstName); ?>  <?php echo e(auth()->user()->lastName); ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Name: &nbsp;</p>
                                        <p class="mb-3"><?php echo e(auth()->user()->firstName); ?>  <?php echo e(auth()->user()->lastName); ?> <?php echo e(auth()->user()->otherName); ?> </p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Email: &nbsp;</p>
                                        <p class="mb-3"><?php echo e(auth()->user()->email); ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Gender: &nbsp;</p>
                                        <p class="mb-3">Male</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Phone number: &nbsp;</p>
                                        <p class="mb-3">+233 0550746180</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Program of study: &nbsp;</p>
                                        <p class="mb-3">Computer Science</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Department of study: &nbsp;</p>
                                        <p class="mb-3">Computer Science</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="mb-3">Year of completion: &nbsp;</p>
                                        <p class="mb-3">2022</p>
                                    </div>
     
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-xl-8 col-right">
                            <div class="card mb-4">
                                <div class="card-body">
                    
                                   <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">UPDATE PROFILE</a></li>
                                        <li class="nav-item"><a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="true">CHANGE PASSWORD</a></li>
                                
                                    </ul>

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                                        <form class="tooltip-right-bottom mob-view" novalidate method="POST" action="#">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group has-float-label"><input value="<?php echo e(old('firstName')); ?>" class="<?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" name="firstName" required>
                                                    <span>First Name</span>
                                                    <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-tooltip d-block"><?php echo e($message); ?></div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group has-float-label"><input value="<?php echo e(old('lastName')); ?>" class="<?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" name="lastName" required>
                                                    <span>Last Name</span>
                                                    <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-tooltip d-block"><?php echo e($message); ?></div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group has-float-label"><input value="<?php echo e(old('otherName')); ?>" class="form-control" name="otherName" required>
                                                    <span>Other Name (optional)</span>
                                                </div>
                                                <div class="form-group has-float-label">
                                                    <input value="<?php echo e(old('email')); ?>" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" name="email" required>
                                                    <span>E-mail</span>
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-tooltip d-block"><?php echo e($message); ?></div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group has-float-label">
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Choose...</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <span>Gender</span> 
                                                </div>
                                                <div class="form-group has-float-label">
                                                    <input value="" type="tel" class="form-control" name="otherName" required>
                                                    <span>Phone number</span>
                                                </div>
                                            
                                                <div class="form-group has-float-label">
                                                    <select class="form-control select2-single" name="jQueryTopLabelsState" required data-width="100%">
                                                        <option></option>
                                                        <option value="AK">BTECH - Mechanical Engineering</option>
                                                        <option value="HI">BTECH - Automobile Engineering</option>
                                                        <option value="HI">BTECH - Electrical/Electronics Engineering</option>
                                                        <option value="HI">BTECH - Civil Engineering</option>
                                                        <option value="HI">BTECH - Building Technology</option>
                                                        <option value="HI">BTECH - Medical Laboratory Science</option>
                                                        <option value="HI">BTECH - Science Laboratory Science</option>
                                                        <option value="HI">BTECH - Statistics</option>
                                                        <option value="HI">BTECH - Computer Science</option>
                                                        <option value="HI">BTECH - Fashion Design and Textiles</option>
                                                        <option value="HI">BTECH - Procurement and Supply Chain Management</option>
                                                        <option value="HI">BTECH - Accounting</option>
                                                        <option value="HI">BTECH - Banking and Finance</option>
                                                        <option value="HI">BTECH - Secretaryship and Management Studies</option>
                                                        <option value="HI">BTECH - Marketing</option>
                                                        <option value="HI">HND - Mechanical Engineering</option>
                                                        <option value="HI">HND - Electrical/Electronics Engineering</option>
                                                        <option value="HI">HND - Building Technology</option>
                                                        <option value="HI">HND - Civil Engineering</option>
                                                        <option value="HI">HND - Interior Design and Technology</option>
                                                        <option value="HI">HND - Furniture Design and Production</option>
                                                        <option value="HI">HND - Science Laboratory Technology (SLT)</option>
                                                        <option value="HI">HND - Statistics</option>
                                                        <option value="HI">HND - Computer Science</option>
                                                        <option value="HI">HND - Hotel, Catering and Institutional Management (HCIM)</option>
                                                        <option value="HI">HND - Accountancy</option>
                                                        <option value="HI">HND - Marketing</option>
                                                        <option value="HI">HND - Purchasing and Supply</option>
                                                        <option value="HI">HND - Secretaryship and Management Studies</option>
                                                        <option value="HI">HND - Bilingual Secretaryship and Management Studies</option>
                                                        <option value="HI">HND - Fashion Design and Textiles</option>
                                                        <option value="HI">CERTIFICATE</option>
                                                    </select>
                                                    <span>Program Studied</span>
                                                </div>
                                                
                                                <div class="form-group has-float-label">
                                                    <select class="form-control select2-single" name="jQueryTopLabelsState" required data-width="100%">
                                                        <option></option>
                                                        <option value="AK">Accounting and Finance</option>
                                                        <option value="HI">Applied Mathematics and Statistics</option>
                                                        <option value="HI">Building Technology</option>
                                                        <option value="CA">Civil Engineering</option>
                                                        <option value="NV">Electrical and Electronic Engineering</option>
                                                        <option value="OR">Fashion Design and Textiles</option>
                                                        <option value="WA">Interior Design and Upholstery Technology</option>
                                                        <option value="AZ">Liberal Studies and Communications Technology</option>
                                                        <option value="CO">Management and Public Administration</option>
                                                        <option value="ID">Marketing</option>
                                                        <option value="MT">Medical laboratory Technology</option>
                                                        <option value="NE">Procurement and Supply Chain Management</option>
                                                        <option value="NM">Science Laboratory Technology</option>
                                                        <option value="ND">Hotel Catering and Institutional Management</option>
                                                
                                                    </select><span>Department of study</span>
                                                </div>
                                                
                                                <div class="form-group has-float-label">
                                                    <select class="form-control select2-single" name="jQueryTopLabelsState" required data-width="100%">
                                                        <option></option>
                                                        
                                                            <option value="AK">2020</option>
                                                            <option value="HI">2019</option>
                                                        
                                                    
                                                            <option value="CA">2018</option>
                                                            <option value="NV">2017</option>
                                                            <option value="OR">2016</option>
                                                            <option value="WA">2015</option>
                                                
                                                        
                                                            <option value="AZ">2014</option>
                                                            <option value="CO">2013</option>
                                                            <option value="ID">2012</option>
                                                            <option value="MT">2011</option>
                                                            <option value="NE">2010</option>
                                                            <option value="NM">2009</option>
                                                            <option value="ND">2008</option>
                                                            <option value="UT">2007</option>
                                                            <option value="WY">2006</option>
                                                            <option value="WY">2005</option>
                                                            <option value="WY">2004</option>
                                                            <option value="WY">2003</option>
                                                            <option value="WY">2002</option>
                                                            <option value="WY">2001</option>
                                                            <option value="WY">2000</option>
                                                            <option value="WY">Before 2000</option>
                                                        
                                                    </select><span>Year of completion</span>
                                                </div>
                                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="second" role="tabpane1" aria-labelledby="second-tab">
                                        <form class="tooltip-right-bottom mob-view" novalidate method="POST" action="#">
                                            <div class="form-group has-float-label">
                                                <input name="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" type="password" required>
                                                <span>New Password</span>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-tooltip d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/dashboard/profile/profile-content.blade.php ENDPATH**/ ?>