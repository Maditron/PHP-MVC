<?php $this->include("app.layouts.header", ['categories' => $categories]); ?>
    <section class="container my-5">
        <section class="row">
            <section class="col-12">
                <h1><?php echo $category['name'] ?></h1>
                <hr>
            </section>
        </section>
        <section class="row">
            <?php foreach ($articles as $article) { ?>
            <section class="col-md-4 border border-primary rounded p-4 m-3"> 
                <h3><?php echo $article['title'] ?></h3>
                <p><?php echo substr($article['content'], 1,100) ?></p>
                <p><a class="btn btn-primary" href="<?php $this->url('home/show/' . $article['id']) ?>" role="button">View details »</a></p>
                <p><?php if (isset($article['updated_at'])) { 
                    $upat = explode(' ', $article['updated_at']);
                    echo 'Updated at: '. $upat[0]; } else{ 
                    $crat = explode(' ', $article['created_at']);
                    echo 'Updated at: '. $crat[0]; } ?></p> 
            </section>
            <?php } ?>
            
        </section>
    </section>
    <?php $this->include("app.layouts.footer"); ?>
