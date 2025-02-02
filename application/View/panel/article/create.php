<?php $this->include("panel.layouts.header"); ?>
                <form action="<?php $this->url('article/store'); ?>" method="POST">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="catid">Category</label>
                        <select class="form-control" id="catid" name="catid">
                            <option value="">Select a category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                            <?php } ?>
                            
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="content" rows="5" placeholder="body ..."></textarea>
                    </section>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
<?php $this->include("panel.layouts.footer"); ?>
