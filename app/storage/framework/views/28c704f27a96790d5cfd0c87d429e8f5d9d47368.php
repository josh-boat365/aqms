<style type="text/css">
    @media (min-width: 320px)and (max-width: 639px){
        .navbar{
            width: 100%;
            justify-content: space-between;
        }
        
        nav .navbar-right{
            position: relative;
            right: -58%;
            bottom: 1.7rem;
        }
        nav .atu-icon{
            position: relative;
            right: 5rem;
        }
        nav .atu-icon a img{
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
                    <span class="count">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                    <div class="scroll">
                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#"><img src="<?php echo e(asset('img/profiles/l-2.jpg')); ?>" alt="Notification Image"
                                    class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#"><img src="<?php echo e(asset('img/notifications/1.jpg')); ?>" alt="Notification Image"
                                    class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#"><img src="<?php echo e(asset('img/notifications/2.jpg')); ?>" alt="Notification Image"
                                    class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 pb-3">
                            <a href="#"><img src="<?php echo e(asset('img/notifications/3.jpg')); ?>" alt="Notification Image')}}"
                                    class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">3 items just added to wish list by a user!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user d-inline-block"><button class="btn btn-empty p-0" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span
                    class="name"><?php echo e(auth()->user()->firstName); ?></span> <span><img alt="Profile Picture"
                        src="<?php echo e(asset('img/profiles/l-1.jpg')); ?>"></span></button>
            <div class="dropdown-menu dropdown-menu-right mt-3">
                <form action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input class="dropdown-item" type="submit" value="Log out">
                </form>
                
            </div>
        </div>
</nav>
<?php /**PATH C:\Users\_kay_\Documents\Projects\aqms\app\resources\views/inc/alumnus/navbar.blade.php ENDPATH**/ ?>