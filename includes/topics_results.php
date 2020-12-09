<?php if ($search_done == true) { ?>
    <?php if ($req_topics_results -> rowCount() > 0) { ?>
        <?php while($topic_results = $req_topics_results->fetch()) { ?>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class=" d-flex align-items-center row">
                        <div class="col-6">
                            <a class=" text-decoration-none text-secondary" href="comment.php?topic_id=<?php echo $topic_results['topic_id'];?>">
                                    <?= $topic_results['topic_subject'];?>
                            </a>
                        </div>
                        <div class="col-2 text-center text-secondary">
                            <?php
                                $req_posts_num = $db->prepare("SELECT post_id FROM posts WHERE post_topic = :topic_id");                                                        
                                $req_posts_num->execute(array('topic_id' => $topic_results['topic_id']));
                                $posts_cnt = $req_posts_num->rowCount();
                                echo $posts_cnt;
                                $req_posts_num->closeCursor();
                            ?>
                        </div>
                        <div class="col-2 text-center text-secondary">
                            <?php echo $topic_results['topic_views'];?>
                        </div> 
                        <div class="col-2">
                            <div class="row">                       
                                <div class="font-italic pr-1">by</div>
                                <?php $req_user = $db->query("SELECT user_id, user_name FROM users WHERE user_id =" .  $topic_results['topic_by']); 
                                while($user = $req_user->fetch()) { ?>
                                <strong class="text-info"> 
                                    <?php
                                        echo $user['user_name'];
                                        }
                                        $req_user->closeCursor();
                                    ?>
                                </strong>                    
                            </div>
                            <div class="row text-secondary">
                                <small>
                                    <?php
                                        $topicDate = new DateTime($topic_results['topic_date']);
                                        echo $topicDate->format('D M d, H:i');
                                    ?>
                                </small>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        <?php }
        }else{ ?>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="result-card card-body d-flex align-items-center">
                        <p>No results...</p>
                    </div>
                </div>
            </div>
        <?php } ?>
<?php } ?>
