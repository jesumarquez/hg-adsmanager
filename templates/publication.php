<div class="wrap nosubsub">
    <h1 class="wp-heading-inline"><?php _e('Publications', $this->plugin_text_domain); ?></h1>
    <a href="admin.php?page=hg_adsmanager_new_publication" class="page-title-action">Add New</a>
    <hr class="wp-header-end">
    <div id="col-container" class="wp-clearfix">
        <div class="notice notice-error is-dismissible" hidden>
            <p></p>
        </div>
        <?php
            $publication_list_table = new HG\Pages\Publication_List_Table();
            $publication_list_table->prepare_items();
            $publication_list_table->display(); 
        ?>
    </div>
</div>