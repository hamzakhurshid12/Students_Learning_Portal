<?php
function generateSidebar(){
echo '
<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="home.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-active">
                    <a href="add_students.php">
						<i class="fa fa-child" aria-hidden="true"></i>
							<span>Add Students and Activities</span>
						</a>
                    </li>
                    <li class="nav-active">
                    <a href="students.php">
						<i class="fa fa-child" aria-hidden="true"></i>
							<span>View Students</span>
						</a>
                    </li>
                    <li class="nav-active">
                    <a href="activities.php">
						<i class="fa fa-file" aria-hidden="true"></i>
							<span>View Activities</span>
						</a>
                    </li>
                    <li class="nav-active">
                    <a href="php/logout.php">
						<i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>
							<span>Log Out</span>
						</a>
                    </li>
                </ul>
            </nav>

            <hr class="separator" />
            </div>
        </div>


</aside>
<!-- end: sidebar -->
';
}
?>