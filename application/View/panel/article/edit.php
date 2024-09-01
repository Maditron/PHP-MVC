<?php $this->include("panel.layouts.header"); ?>
                <form action="<?php $this->url('article/update/' . $blog['id']); ?>" method="POST">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $blog['title']; ?>" id="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="catid">Category</label>
                        <select class="form-control" id="catid" name="catid">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id'] ?>" name='catid' <?php if ($category['id'] == $blog['catid']) echo 'selected'; ?>><?php echo $category['name'] ?></option>
                            <?php } ?>
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="content">Body</label>
                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="body ..."><?php echo $blog['content'] ?></textarea>
                    </section>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

<?php $this->include("panel.layouts.footer"); ?>
