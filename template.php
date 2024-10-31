<?php
$size = sizeof($data_values);
if ($size == 1 || $size == 2) {
    $width = '45%';
} elseif ($size == 3) {
    $width = '30.33%';
} elseif ($size == 4) {
    $width = '22.5%';
}

?>
<div class="pricing-grid1" style="width:<?php echo $width; ?>">
    <div class="price-value" style="<?php echo 'background:', (!empty($data_table['price_table_head_color']) ? $data_table['price_table_head_color'] : '#000'); ?>">
        <span><i style="color:<?php echo (!empty($data_table['price_table_font_icon_color']) ? $data_table['price_table_font_icon_color'] : '#000'); ?>" class="<?php echo (!empty($data_table['price_table_font_icon']) ? $data_table['price_table_font_icon'] : '') ?>"></i></span>
        <h2><a href="#" style="color:<?php echo (!empty($data_table['price_table_head_font_color']) ? $data_table['price_table_head_font_color'] : '#fff'); ?>"> <?php echo (!empty($data_table['price_table_title']) ? $data_table['price_table_title'] : '') ?></a></h2>
        <h5><span><?php echo (!empty($data_table['price_table_price']) ? $data_table['price_table_price'] : '') ?></span><lable> / <?php echo (!empty($data_table['price_table_package']) ? $data_table['price_table_package'] : '') ?></lable></h5>
    </div>
    <div class="price-bg">
        <ul>
            <?php
            $description = explode(",", $data_table['pric_table_description']);
            if (empty($description)):$description = array('');
            else: 
                $description = explode(",", $data_table['pric_table_description']);
            endif;
            foreach ($description as $description_data):
                echo '<li class="main_data">' . $description_data . '</li>';
            endforeach;
            ?>
        </ul>
        <div class="cart1">
            <a style="color:<?php echo (!empty($data_table['price_table_button_text_color'])) ? $data_table['price_table_button_text_color'] : '' ?>;background:<?php echo (!empty($data_table['price_table_button_color']) ? $data_table['price_table_button_color'] : '#F7D30B'); ?>" class="popup-with-zoom-anim" href="<?php echo (!empty($data_table['price_table_button_link']) ? $data_table['price_table_button_link'] : '') ?>" target="<?php echo (!empty($data_table['price_table_button_target']) ? $data_table['price_table_button_target'] : '#') ?>" ><?php
                if (!empty($data_table['price_table_button_text']))
                    echo $data_table['price_table_button_text'];
                else
                    echo 'Buy Now';
                ?></a>
        </div>
    </div>
</div>
<div class="both-clear"></div>
