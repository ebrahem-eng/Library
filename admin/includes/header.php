<div class="navbar navbar-inverse set-radius-zero" style="background-color:#114f6e ; ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navar-brand">
            <font size="3" face="tahoma">
                <img src="assets/img/spu.png" />
                <span style="color: white "> <span>SYRIAN PRIVATE UNIVERSITY LIBRARY
                    </span>
                </span>

            </a>

        </div>

        <div class="right-div">
            <a href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section" style="background-color:#147aad;  border-bottom:5px solid white;">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
            <div class="navbar-collapse collapse ">
                <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="dashboard.php" class="menu-top-active" style="color: white ;">Reports</a></li>
                        <!--
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="color: white ;"> Categories <i class=" fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-category.php">Add Category</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-categories.php">Manage Categories</a></li>
                            </ul>
                        </li>
-->
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="color: white ;"> Authors <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-author.php">Add Author</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-authors.php">Manage Authors</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="color: white ;"> Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-book.php">Add Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-books.php">Manage Books</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="color: white ;"> Issue Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="issue-book.php">Issue New Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-issued-books.php">Manage Issued Books</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="color: white ;"> Students <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-student.php">Reg Student</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="reg-students.php">Manage Students</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="color: white ;"> Admin <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <?php if ($_SESSION['groupID'] == 1) { ?>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-admin.php">Reg Admin</a></li>
                                <?php } ?>

                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-admin.php">Manage Admins</a></li>
                            </ul>
                        </li>
                        <?php if ($_SESSION['groupID'] == 1) { ?>
                            <li>

                                <a class="btn notes" href="show_notes.php" style="color: white ;">Notes</a>

                                <span class="count" id="count" style="position: absolute;color:white ; right:6px; top:6px ; width:12px; display:none;">
                                </span>
                            </li>
                        <?php }
                        ?>

                        <li><a href="change-password.php" style="color: white ;">Change Password</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>