<?php include 'req_search.php';?>



<?php if ($search_done == true) { ?>

<?php if ($req_topics_results -> rowCount() > 0) { ?>
    <?php while($topic_results = $req_topics_results->fetch()) { ?>
        <div class="card border-0 my-3">
            <!-- link to the topic -->
            <!-- <a class="stretched-link" href="comments.php?id=<?php echo $topic_results['topic_id'];?>"></a> -->
            <div class="card-body">
                <div class=" d-flex align-items-center row">
                    <div class="col-6"><?= $topic_results['topic_subject'];?></div>
                    <div class="col-2">num topic</div>
                    <div class="col-2">vues topic</div> 
                    <div class="col-2">
                        <div class="row"><?= $topic_results['topic_date'];?></div>
                        <div class="row"><?= $topic_results['topic_by'];?></div>
                    </div> 
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
