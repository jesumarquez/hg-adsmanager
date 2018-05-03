<div class="wrap nosubsub">
    <h1 class="wp-heading-inline"><?php _e('New Publication', $this->plugin_text_domain); ?></h1>
    <hr class="wp-header-end">
    <div id="col-container" class="wp-clearfix">
        <div class="notice notice-error is-dismissible" hidden>
            <p></p>
        </div>
        <div id="col-left">
            <div class="form-wrap">
                <form id="hg_add_publication_ajax_form" class="validate">
                    <div class="form-field form-required term-name-wrap">
                        <input type="hidden" id="publication-id">
                        <label for="publication-name">Name</label>
                        <input name="publication-name" id="publication-name" type="text" aria-required="true">
                        <p>Publication name.</p>
                        <label for="customer-id">Customer</label>
                        <select name="customer-id" id="customer-id">
                        <?php
                            $customerEntity = new HG\Base\Entities\CustomerEntity();
                            $customers = $customerEntity->getAll();
                            foreach ($customers as $cust) {
                                echo "<option value='{$cust['id']}'>{$cust['name']}</option>";
                            }
                        ?>
                        </select>
                        <label for="country-id">Country</label>
                        <select name="country-id" id="country-id">
                        <?php
                            $countryEntity = new HG\Base\Entities\CountryEntity();
                            $countries = $countryEntity->getAll();
                            foreach ($countries as $country) {
                                echo "<option value='{$country['id']}'>{$country['name']}</option>";
                            }
                        ?>                        
                        </select>
                        <label for="image-url">Image</label>
                        <input name="image-url" id="image-url" type="text" aria-required="true">
                        <p>Image url.</p>
                        <label for="call-to-action-url">Call to action</label>
                        <input name="call-to-action-url" id="call-to-action-url" type="text" aria-required="true">
                        <p>Call to action url.</p>
                        <label for="start-date">Start</label>
                        <input name="start-date" id="start-date" type="date" aria-required="true">
                        <p>Start date.</p>
                        <label for="finish-date">Finish</label>
                        <input name="finish-date" id="finish-date" type="date" aria-required="true">
                        <p>Finish date.</p>
                        <label for="active">Active</label>
                        <input name="active" id="active" type="checkbox" aria-required="true">
                    </div>
                    <div class="submit">
                        <input type="submit" id="submit" name="submit" class="button button-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
