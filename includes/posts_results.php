<?php include 'req_search.php';?>

<?php if ($search_done == true) { ?>

<?php if ($req_posts_results -> rowCount() > 0) { ?>
    <?php while($posts_results = $req_posts_results->fetch()) { ?>
        <div class="card border-0 my-3">
            <!-- link to the topic -->
            <!-- <a href="comments.php?id=<?php echo $posts_results['post_id'] .'#'. $posts_results['post_id'];?>">-->
            <div class="card-body">
                <div class=" d-flex align-items-center row">
                    <div class="col-6" ><?= $posts_results['post_content'];?></div> 
                    <div class="col-2">num post</div>
                    <div class="col-2 "> vues post</div>
                    <div class="col-2 "><?= $posts_results['post_date'];?></div> 
                </div>
            </div>
        </div>
    <?php }
    }else{ ?>
        <div class="card border-0 my-3">
            <div class="card-body">
                <div class="result-card card-body d-flex align-items-center">
                    <p>Aucun résultat...</p>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
