<?php $this->include("app.layouts.header", ['categories' => $categories]); ?>
    <section class="container my-5">
        <!-- Example row of columns -->
        <section class="row">
            <section class="col-md-12">
                <h1><?php echo $article['title'] ?></h1>
                <h5 class="d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none" href="<?php $this->url('home/category/'. $article['catid']) ?>"><?php echo $article['category'] ?></a>
                    <span class="date-time"><?php if (isset($article['updated_at'])) { 
                    $upat = explode(' ', $article['updated_at']);
                    echo 'Updated at: '. $upat[0]; } else{ 
                    $crat = explode(' ', $article['created_at']);
                    echo 'Updated at: '. $crat[0]; } ?></span>
                </h5>
                <article class="bg-article p-3">
                <?php echo $article['content'] ?>
                </article>
            </section>
        </section>
    </section>
    <?php $this->include("app.layouts.footer"); ?>
