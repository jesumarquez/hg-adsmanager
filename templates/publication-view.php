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
                        <input type="hidden" id="publication-id" value="<?php echo $id ?>">
                        <label for="publication-name">Name</label>
                        <input name="publication-name" id="publication-name" type="text" aria-required="true" <?php echo $readonly; ?> value="<?php echo $name ?>">
                        <p>Publication name.</p>
                        <label for="customer-id">Customer</label>
                        <select name="customer-id" id="customer-id" <?php echo $disabled; ?>>
                        <?php
                            $customerEntity = new HG\Base\Entities\CustomerEntity();
                            $customers = $customerEntity->getAll();
                            foreach ($customers as $cust) {
                                $selected = $cust['id'] == $customerId ? 'selected' : '';
                                echo "<option value='{$cust['id']}' {$selected}>{$cust['name']}</option>";
                            }
                        ?>
                        </select>
                        <label for="country-id">Country</label>
                        <select name="country-id" id="country-id" <?php echo $disabled; ?>>
                        <?php
                            $countryEntity = new HG\Base\Entities\CountryEntity();
                            $countries = $countryEntity->getAll();
                            foreach ($countries as $country) {
                                $selected = $country['id'] == $countryId ? 'selected' : '';
                                echo "<option value='{$country['id']}' {$selected}>{$country['name']}</option>";
                            }
                        ?>                        
                        </select>
                        <label for="image-url">Image</label>
                        <input name="image-url" id="image-url" type="text" aria-required="true" <?php echo $readonly; ?> value="<?php echo $imageUrl; ?>">
                        <p>Image url.</p>
                        <label for="call-to-action-url">Call to action</label>
                        <input name="call-to-action-url" id="call-to-action-url" type="text" aria-required="true" <?php echo $readonly; ?> value="<?php echo $callToActionUrl; ?>">
                        <p>Call to action url.</p>
                        <label for="start-date">Start</label>
                        <input name="start-date" id="start-date" type="date" aria-required="true" <?php echo $readonly; ?> value="<?php echo $startDate; ?>">
                        <p>Start date.</p>
                        <label for="finish-date">Finish</label>
                        <input name="finish-date" id="finish-date" type="date" aria-required="true" <?php echo $readonly; ?> value="<?php echo $finishDate; ?>">
                        <p>Finish date.</p>
                        <label for="active">Active</label>
                        <input name="active" id="active" type="checkbox" aria-required="true" <?php echo $disabled; ?> <?php echo $activeChecked; ?>>
                    </div>
                    <div class="submit">
                    <?php
                        switch ($action) {
                            case 'new':
                                echo '<input type="submit" id="submit" name="submit" class="button button-primary" value="Save">';
                                echo '<input type="button" id="btn_back" name="bt_back" class="button button-secondary" value="Cancel" onclick="goBack()">';
                                break;
                            case 'view':
                                echo '<input type="button" id="btn_back" name="bt_back" class="button button-primary" value="Back" onclick="goBack()">';
                                break;
                            case 'edit':
                                echo '<input type="button" id="edit_submit" name="edit_submit" class="button button-primary" value="Save" onclick="updatePublication()">';
                                echo '<input type="button" id="btn_back" name="bt_back" class="button button-default" value="Cancel" onclick="goBack()">';
                                break;
                            case 'delete':
                                echo '<input type="button" id="delete_submit" name="delete_submit" class="button button-primary" value="Delete" onclick="deletePublication()">';
                                echo '<input type="button" id="btn_back" name="bt_back" class="button button-default" value="Cancel" onclick="goBack()">';
                                break;
                        default:
                                # code...
                                break;
                        }
                    ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
