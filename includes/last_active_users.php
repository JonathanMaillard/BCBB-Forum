<?php
// request to get the last active users 
$req_last_users = $db->query('SELECT * FROM users ORDER BY user_id DESC LIMIT 3');
if (!$req_last_users) {
    echo 'There is no users to display' .mysql_error();
} else {
?>

<!-- last_active_users section -->
<div class="container bg-light rounded-lg mt-4 mb-2">
    <!-- last_active_users header -->
    <div class="banner-aside row  align-items-center">
        Last Active Users
    </div>
    <!-- last_active_users container -->
    <div class="d-flex justify-content-between flex-row">
        <?php
        while ($user = $req_last_users->fetch())
        {
        ?>
            <!-- last_active_users cards-->
            <div class="last-active-users card col px-2 py-2 border-0 my-2"> 
                <!-- UNCOMMENT next line to active the link -->
                <!-- <a href="#" class="stretched-link"></a> -->   

                <!-- last_active_users user-avatar first_row -->
                <img class="last-active-users__avatar-img rounded-circle mx-auto row" src="<?php echo($user['user_avatar']); ?>" alt="">                            
                <!-- last_active_users user-name second_row -->
                <div class="last-active-user__name row font-weight-bold mx-auto "> 
                    <?php echo($user['user_name']);?>
                </div>
                <!-- last_active_users user-signature third_row -->
                <div class="last-active-user__signature row mx-auto text-secondary text-truncate"> 
                    <?php echo($user['user_signature']);?>
                </div> 
            </div>
        <?php
        }
        $req_topics->closeCursor();
        ?>
    </div>
</div>
    
<?php
}

?>