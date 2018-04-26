<div class="wrap nosubsub">
    <h1 class="wp-heading-inline"><?php _e('Countries', $this->plugin_text_domain); ?></h1>
    <hr class="wp-header-end">
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="form-wrap">
                <h2>Add New Country</h2>
                <form id="hg_add_country_ajax_form" class="validate">
                    <div class="form-field form-required term-name-wrap">
                        <input type="hidden" id="country-id">
                        <label for="country-name">Name</label>
                        <input name="country-name" id="country-name" type="text" aria-required="true">
                        <p>Country name.</p>
                    </div>
                    <div class="submit">
                        <input type="submit" id="submit" name="submit" class="button button-primary" value="Add New Country">
                        <button type="button" id="save" class="button button-primary hidden" onclick="updateCountry()">Save</button>
                        <button type="reset" id="cancel" class="button button-secondary hidden" onclick="cancelEditCountry()">Cancel</button>
                    </div>
                </form>
                <div id="hg_country_form_feedback"></div>
            </div>
        </div>
        <div id="col-right">
            <div class="col-wrap">
                <div id="ng-country-list-table">
                    <div id="nds-post-body">
                        <form method="get">
                            <?php
                                $country_list_table = new HG\Pages\Country_List_Table();
                                $country_list_table->prepare_items();
                                $country_list_table->display(); 
                            ?>					
                        </form>
                    </div>			
                </div>
            </div>
        </div>
    </div>
</div>
