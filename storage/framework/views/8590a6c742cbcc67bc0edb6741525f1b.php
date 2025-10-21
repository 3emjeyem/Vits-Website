<div class="navbar-design-rect"></div>
<nav>
    <!-- Left -->
    <div class="nav-left">
        <div class="search">
            <i class="fas fa-search"></i>
        </div>
    </div>
    
    <!-- Center -->
   <div class="nav-center">
        <div class="navbar-design-rect"></div> 
        
        <ul>
            <li><a href="/main" class="<?php echo e(request()->is('main') ? 'active' : ''); ?>">HOME</a></li>
            <li><a href="/events" class="<?php echo e(request()->is('events*') ? 'active' : ''); ?>">EVENTS</a></li>
            <li><a href="/merchandise" class="<?php echo e(request()->is('merchandise') ? 'active' : ''); ?>">MERCHANDISE</a></li>
            <li><a href="/ceit" class="<?php echo e(request()->is('ceit') ? 'active' : ''); ?>">CEIT OVERVIEW</a></li>
        </ul>
        
        <img src="<?php echo e(asset('Shadow.png')); ?>" alt="shadow">
    </div>

    <div class="nav-right">
        <i class="fas fa-bell"></i>
        <i class="fas fa-bullhorn"></i>
    </div>
</nav><?php /**PATH C:\Users\javin\Codes\vits_website\resources\views/components/nav-link.blade.php ENDPATH**/ ?>