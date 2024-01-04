<?php 
    if(!isset($_SESSION['user'])):
        header('Location: /login');
        exit();
    endif;
?>
<?php
    $welcome = 'Welcome, '.$_SESSION['user']['fname']. ' '.$_SESSION['user']['lname'];
?>
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
        <?php echo $_SESSION['message']['msg']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>   
<div class="card">
<div class="card-body">
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <img src="/images/logo.png" class="img-fluid">
            </div>
            <div class="col-md-11 text-right">
                <nav>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <?php if($_SESSION['user']['level'] >= 1): ?>
                            <li><a href="/create">New Employee</a></li>
                            <li><a href="/users">Users</a></li>
                        <?php endif; ?>
                        <li><?php echo $welcome; ?> <a href="/logout">(Logout)</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>