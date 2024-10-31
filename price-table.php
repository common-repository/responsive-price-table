<?php
/*
  Plugin Name: Responsive Price Table
  Plugin URI: http://www.junktheme.com
  Description: Create a Dynamic, 100% Responsive and Fully Customizable Pricing Table in moment for your WordPress site. No programming knowledge required.
  Author: Junk Theme
  Version: 1.0
  Author URI: http://www.junktheme.com
 */

class Bs_Price_Table {

    public function bs_postInstance() {
        include dirname(__FILE__) . '/price-table-post.php';
        $custom_post = new Bs_Custom_Post('bs-price-table');
        $custom_post->Bs_Make_Custom_Post('bs_price_table', 'Price Table', 'Price Tables', array('supports' => array('title')));
        add_action('admin_init', array($this, 'bs_price_table_metabox_feild'));
        add_action('admin_init', array($this, 'bs_price_table_metabox_feild_shortcode'));
        add_action('save_post', array($this, 'add_bs_price_table'), 10, 2);

        include dirname(__FILE__) . '/price-table-shortcode.php';
    }

    public function bs_getInstance() {
        $this->bs_postInstance();
    }

    public function bs_price_table_metabox_feild() {
        add_meta_box('bs_price_table_meta_id', 'Add Table', array($this, 'display_price_table_metabox'), 'bs_price_table', 'normal', 'high');
    }

    public function bs_price_table_metabox_feild_shortcode() {
        add_meta_box('bs_price_table_meta_shortcode', 'ShortCode', array($this, 'display_price_table_metabox_shortcode'), 'bs_price_table', 'side', 'low');
    }

    public function display_price_table_metabox_shortcode($bs_price_table) {
        ?>
        <div class="bs_price">
            <input type="text" name="shortcode_display[]" value="[bs_price_table id='<?= get_the_id(); ?>']" disabled></input>
        </div>

        <?php
    }

    public function display_price_table_metabox($bs_price_table) {
        wp_nonce_field('bs_price_table_nonce', 'bs_price_table_nonce_field');
        $data_tables = get_post_meta($bs_price_table->ID, '_bs_price_table_group', true);
        include dirname(__FILE__) . '/inc/metabox.php';
    }

    public function add_bs_price_table($post_id, $bs_price_table) {
        if (!isset($_POST['bs_price_table_nonce_field']) || !wp_verify_nonce($_POST['bs_price_table_nonce_field'], 'bs_price_table_nonce')) {
            return;
        }
        if (!current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
        if ($bs_price_table->post_type == 'bs_price_table') {
            if (empty($_POST['bs_price_table_group'])) {
                $_POST['bs_price_table_group'] = array('');
            }
            foreach ($_POST['bs_price_table_group'] as $key => $data_table):  
                if (empty($_POST['bs_price_table_group'])) {
                    $data_table['price_table_package'] = 'Select';
                }
                $bs_price_table_group_array[] = array_map( 'sanitize_text_field', $data_table );
                foreach ($bs_price_table_group_array as $key => $data_table) {
                    if
                    (
                            empty($data_table['price_table_title']) &&
                            empty($data_table['price_table_price']) &&
                            empty($data_table['pric_table_description']) &&
                            empty($data_table['price_table_button_link']) &&
                            empty($data_table['price_table_head_color']) &&
                            empty($data_table['price_table_head_font_color']) &&
                            empty($data_table['price_table_button_color']) &&
                            empty($data_table['price_table_button_text_color']) &&
                            empty($data_table['price_table_button_text']) &&
                            empty($data_table['price_table_font_icon']) &&
                            empty($data_table['price_table_font_icon_color']) &&
                            ($data_table['price_table_package'] == 'Select')
                    )
                unset($bs_price_table_group_array[$key]); 
                 } 
            endforeach;
            if (isset($_POST['bs_price_table_group']) &&
                    $_POST['bs_price_table_group'] != '') {
                update_post_meta($post_id, '_bs_price_table_group', $bs_price_table_group_array);
            }
        }
    }

}

$var = new Bs_Price_Table();
$var->bs_getInstance();

add_action('admin_head', 'bs_price_table_admin_css');
function bs_price_table_admin_css() {
    wp_enqueue_style('price_table_admin_css', plugin_dir_url(__FILE__) . 'css/admin_style.css');
}


add_action('admin_enqueue_scripts', 'bs_price_table_color_picker');
function bs_price_table_color_picker() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('bs_price_table_color_js', plugins_url('inc/color_picker.js', __FILE__), array('wp-color-picker'), '', true);
}

