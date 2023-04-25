<?php session_start(); ?>
<div class="navbar navbar-inverse set-radius-zero" style="background-color:#114f6e ;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbr-brand">
            <font size="3" face="tahoma">
                <img src="assets/img/spu.png" />
                <span style="color: white;">SYRIAN PRIVATE UNIVERSITY LIBRARY</span>
            </a>

        </div>
        <?php if (isset($_SESSION['login'])) {
        ?>
            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- LOGO HEADER END-->
<?php if (isset($_SESSION['login'])) {
?>
    <section class="menu-section" style="background-color:#147aad;  border-bottom:5px solid white;">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active" style="color: white ;background-color:#147aad;">DASHBOARD</a></li>
                            <li><a href="issued-books.php" style="color: white;">Issued Books</a></li>
                            <li><a href="add_note.php" style="color: white;">add note</a></li>
                            
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="color: white;"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="menu-section" style="background-color:rgba(200,32,46,.88);  border-bottom:1px solid white;">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php" style="color: white ;background-color:rgba(200,32,46,.88);">Home</a></li>
                            <li><a href="studentlogin.php" style="color: white;">User Login</a></li>
                            <li><a href="adminlogin.php" style="color: white;">Admin Login</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php } ?>