<?php $this->include("panel.layouts.header"); ?>
                <form action="<?php $this->url('category/update/' . $category['id']) ?>" method="POST">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $category['name'] ?>" id="name" placeholder="name ...">
                    </section>
                    <section class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" value="<?php echo $category['description'] ?>" id="description" placeholder="description ...">
                    </section>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
  <?php $this->include("panel.layouts.footer"); ?>
