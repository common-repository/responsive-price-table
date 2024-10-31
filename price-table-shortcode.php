<?php

class Bs_price_shortcode_genarate {

    public function __construct() {

        add_shortcode('bs_price_table', array($this, 'show_shortcode_price_table'));
        add_action('wp_enqueue_scripts', array($this, 'bs_price_table_enqueue_scripts'));
    }

    private function GetQueryloop_price_table($atts, $content = NULL) {
        extract(shortcode_atts(
                        array(
            'id' => '',
                        ), $atts)
        );
        $query_args = array(
            'p' => (!empty($id)) ? $id : -1,
            'posts_per_page' => -1,
            'post_type' => 'bs_price_table',
            'order' => 'DESC',
            'orderby' => 'menu_order',
        );
        $wp_query = new WP_Query($query_args);
        if ($wp_query->have_posts()):while ($wp_query->have_posts()) : $wp_query->the_post();
                return $data_tables = get_post_meta($id, '_bs_price_table_group', true); //print_r($data_tables);  exit();
            endwhile;
        else: echo 'No Price Table Found';
        endif;
    }

    public function show_shortcode_price_table($atts, $content = NULL) {
        $data_values = $this->GetQueryloop_price_table($atts, $content = NULL);
        $this->bs_price_table_enqueue_scripts();
        ob_start();
        ?>
        <div class="pricing-grids">
            <?php
            if (!empty($data_values)) {
                foreach ($data_values as $key => $data_table):
                    include dirname(__FILE__) . '/template.php';
                endforeach;
            }
            ?>
            <div class="clear"> </div>
        </div>
		<div style='color:#ccc; font-size: 9px; text-align:right;'><a href='http://www.junktheme.com/' title='visit us' target='_blank'>junk theme</a></div>
        <div class="clear"> </div>
        <?php
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }

    public function bs_price_table_enqueue_scripts() {
        $style = get_post_meta(get_the_ID(), 'price_table_style', true);
        if (!empty($style)) {
            wp_enqueue_style('bs_table_css', plugin_dir_url(__FILE__) . 'css/' . $style);
        } else {
            wp_enqueue_style('bs_table_css', plugin_dir_url(__FILE__) . 'css/style.css');
        }
        wp_enqueue_style('wp_head', plugin_dir_url(__FILE__) . 'css/font-awesome.min.css');
    }

}

new Bs_price_shortcode_genarate();



