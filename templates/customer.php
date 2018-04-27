<div class="wrap nosubsub">
    <h1 class="wp-heading-inline"><?php _e('Customers', $this->plugin_text_domain); ?></h1>
    <hr class="wp-header-end">
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="form-wrap">
                <h2>Add New Customer</h2>
                <form id="hg_add_customer_ajax_form" class="validate">
                    <div class="form-field form-required term-name-wrap">
                        <input type="hidden" id="customer-id">
                        <label for="customer-name">Name</label>
                        <input name="customer-name" id="customer-name" type="text" aria-required="true">
                        <p>Customer name.</p>
                    </div>
                    <div class="submit">
                        <input type="submit" id="submit" name="submit" class="button button-primary" value="Add New Customer">
                        <button type="button" id="save" class="button button-primary hidden" onclick="updateCustomer()">Save</button>
                        <button type="reset" id="cancel" class="button button-secondary hidden" onclick="cancelEditCustomer()">Cancel</button>
                    </div>
                </form>
                <div id="hg_customer_form_feedback"></div>
            </div>
        </div>
        <div id="col-right">
            <div class="col-wrap">
                <div id="hg-customer-list-table">			
                    <div id="nds-post-body">		
                        <form method="get">					
                            <?php
                                $customer_list_table = new HG\Pages\Customer_List_Table();
                                $customer_list_table->prepare_items();
                                $customer_list_table->display(); 
                            ?>					
                        </form>
                    </div>			
                </div>
            </div>
        </div>
    </div>
</div>
