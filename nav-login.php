<nav class="navbar navbar-default "  role="navigation">
	<div class="container-fluid">
		<!-- Brand -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Fundraiser</a>
		</div>
		<!-- Search -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<form class="navbar-form navbar-left" role="search" action="result.php" method="POST">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" name="keyword" id="send_keyword" placeholder="Search for something">
					</div>
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">

				<li><a href="newproject.html">Build fundraiser</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Me <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><?php session_start(); echo "<a href='home.php?id={$_SESSION['uid']}'>Profile</a>"; ?></li>
						<li><a href="#">Message</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>