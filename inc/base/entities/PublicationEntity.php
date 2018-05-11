<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base\Entities;

class PublicationEntity {
    private $table_name;
    private $wpdb;

    public function __construct(){
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'hg_adsmanager_publication';
    }

    public function getAll(){
        $customer_table = $this->wpdb->prefix . 'hg_adsmanager_customer';
        $country_table = $this->wpdb->prefix . 'hg_adsmanager_country';
        $result = $this->wpdb->get_results("select p.id, p.name, p.customer_id, cust.name customer, p.country_id, country.name country, p.active, p.start_date, p.finish_date from {$this->table_name} p inner join {$customer_table} cust on cust.id = p.customer_id inner join {$country_table} country on country.id = p.country_id", ARRAY_A );
        return $result;
    }

    public function getById( $id ) {
        return $this->wpdb->get_row( $this->wpdb->prepare( "SELECT * FROM $this->table_name WHERE id = %d", $id ) );
    }

    public function getRandomPublicationByCountryCode( $countryCode ) {
        $country_table = $this->wpdb->prefix . 'hg_adsmanager_country';
        return $this->wpdb->get_row( $this->wpdb->prepare( "SELECT p.* FROM $this->table_name p
                                                            INNER JOIN $country_table c ON c.id = p.country_id
                                                            WHERE c.code = %s
                                                            AND p.active = 1
                                                            AND c.active = 1
                                                            AND now() BETWEEN p.start_date AND p.finish_date
                                                            ORDER BY RAND() LIMIT 1", $countryCode ) );
    }

    public function add($name, $customerId, $countryId, $imageUrl, $callToActionUrl, $startDate, $endDate, $active) {
        $this->wpdb->insert(
            $this->table_name, 
            array(
                'time'                  => current_time('mysql'),
                'name'                  => $name,
                'customer_id'           => $customerId,
                'country_id'            => $countryId,
                'active'                => $active,
                'image_url'             => $imageUrl,
                'call_to_action_url'    => $callToActionUrl,
                'start_date'            => $startDate,
                'finish_date'           => $endDate,
            )
        );        
    }

    public function delete($id){
        // error_log('plugin error publicationid: ' . $id, 3, 'c:/temp/php.log');
        $this->wpdb->delete(
            $this->table_name,
            array( 'id' => $id),
            array( '%d' )
        );
    }

    public function update($id, $name, $customerId, $countryId, $imageUrl, $callToActionUrl, $startDate, $endDate, $active) {
        $this->wpdb->update(
            $this->table_name,
            array( 
                'name'                  => $name,
                'customer_id'           => $customerId,
                'country_id'            => $countryId,
                'active'                => $active,
                'image_url'             => $imageUrl,
                'call_to_action_url'    => $callToActionUrl,
                'start_date'            => $startDate,
                'finish_date'           => $endDate,
            ),
            array( 'id' => $id )
        );
    }
}