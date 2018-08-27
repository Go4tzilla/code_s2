<nav class="navbar navbar-default navbar-fixed-top">
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="index.php">Home</a></li>
                 <?php if (isset($_SESSION['user_id'])) { ?>
		    <li class="grow-text"><a href="./index.php?page=rdv">RDV</a></li>
                <li class="grow-text"><a href="./index.php?page=file">File</a></li>
                <li class="grow-text"><a href="./index.php?page=contact">Contact</a></li>
                <li><a href="./index.php?page=info">change my info</a></li>
                <?php } ?>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <?php if (isset($_SESSION['user_id'])) { ?>
                <li>
                    <p class="navbar-text"><span class="glyphicon glyphicon-user"></span>
                       <strong>Signed in as
                        <?php echo $_SESSION['username']; ?></strong>
                    </p>
                </li>
                <li class="grow-text"><a href="./index.php?page=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } else { ?>
                <li class="grow-text"><a href="./index.php?page=login"><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                <li class="grow-text"><a href="./index.php?page=register"><span class='glyphicon glyphicon-user'></span> Register</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
