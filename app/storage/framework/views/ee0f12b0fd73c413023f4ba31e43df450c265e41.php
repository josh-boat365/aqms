<style type="text/css">
    @media (min-width: 320px)and (max-width: 639px) {
        .navbar {
            width: 100%;
            justify-content: space-between;
        }

        nav .navbar-right {
            position: relative;
            right: -58%;
            bottom: 1.7rem;
        }

        nav .atu-icon {
            position: relative;
            right: 5rem;
        }

        nav .atu-icon a img {
            width: 45%;
        }
    }

</style>


<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left"><a href="#" class="menu-button d-none d-md-block"><svg
                class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg> <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg> </a>
        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none"><svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg></a>
        <div class="search" data-search-path="Pages.Search03d2.html?q="><input placeholder="Search..."> <span
                class="search-icon"><i class="simple-icon-magnifier"></i></span>
        </div>
        
        
    </div>
    
    <div class="atu-icon" style=" width:8rem">
        <a href="">
            <img src="/img/custom/atulogo.png" height="100%" width="90%" alt="">
        </a>
    </div>
    
    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">

            <div class="position-relative d-inline-block">
                <button class="header-icon btn btn-empty" type="button" id="notificationButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="simple-icon-bell"></i>
                    <span class="count"><?php echo e($notifications->where('notification_type_id', 3)->count()); ?></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                    <div class="scroll">
                        <?php $__currentLoopData = $notifications->where('notification_type_id', 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                
                                <div class="pl-3">
                                    <a href="<?php echo e(url('/home/surveys/' . $notification->survey_id)); ?>">
                                        <p class="font-weight-medium mb-1">
                                            new survey deploymnet
                                        </p>
                                        
                                        <p class="font-weight-medium mb-1"> - <?php $__currentLoopData = $allSurveys->where('id', $notification->survey_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($survey->name); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>

                                        <p class="text-muted mb-0 text-small">
                                            <?php echo e($notification->created_at->format('d/m/y')); ?>

                                            (<?php echo e($notification->created_at->format(' h : s ')); ?>)</p>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="user d-inline-block"><button class="btn btn-empty p-0" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span
                    class="name"><?php echo e(auth()->user()->firstName); ?> <?php echo e(auth()->user()->lastName); ?></span>
                <span><img alt="Profile Picture" src="<?php echo e(asset('img/profiles/p-a1.png')); ?>"></span></button>
            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="<?php echo e(route('alumnus.profile')); ?>">Profile</a>
                <form action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input class="dropdown-item" type="submit" value="Log out">
                </form>
                
            </div>
        </div>
    </div>
    <?php if(session()->has('success')): ?>
        <div style="left: 50%; transform: translate(-50%); top: 110%; display:none; z-index: 99999" id="notification"
            class="position-absolute py-4 px-3 bg-success container col-5 text-white text-center justify-content-center rounded">
            <h3 class="m-0">
                <?php echo e(session('success')); ?>

            </h3>
        </div>
    <?php endif; ?>

</nav>
<?php /**PATH C:\Users\Fuad\Documents\GitHub\aqms\app\resources\views/inc/alumnus/navbar.blade.php ENDPATH**/ ?>