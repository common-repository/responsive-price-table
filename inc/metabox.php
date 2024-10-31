<?php

for ($i=0; $i<5 ; $i++) { 
   if(empty($data_tables[$i]['price_table_title']))$data_tables[$i]['price_table_title']=NULL;
   if(empty($data_tables[$i]['price_table_price']))$data_tables[$i]['price_table_price']=NULL;
   if(empty($data_tables[$i]['pric_table_description']))$data_tables[$i]['pric_table_description']=NULL;
   if(empty($data_tables[$i]['price_table_package']))$data_tables[$i]['price_table_package']=NULL;
   if(empty($data_tables[$i]['price_table_button_link']))$data_tables[$i]['price_table_button_link']=NULL;
   if(empty($data_tables[$i]['price_table_head_color']))$data_tables[$i]['price_table_head_color']=NULL;
   if(empty($data_tables[$i]['price_table_head_font_color']))$data_tables[$i]['price_table_head_font_color']=NULL;
   if(empty($data_tables[$i]['price_table_button_color']))$data_tables[$i]['price_table_button_color']=NULL;
   if(empty($data_tables[$i]['price_table_button_text_color']))$data_tables[$i]['price_table_button_text_color']=NULL;
   if(empty($data_tables[$i]['price_table_button_text']))$data_tables[$i]['price_table_button_text']=NULL;
   if(empty($data_tables[$i]['price_table_font_icon']))$data_tables[$i]['price_table_font_icon']=NULL;
   if(empty($data_tables[$i]['price_table_font_icon_color']))$data_tables[$i]['price_table_font_icon_color']=NULL;
?> 
    <div class="bs_price_group">
        <h3 class="table_title">Table <?php echo $i+1 ?></h3>
  
        <div class="bs_price_title">
            <div class="price_table_left">
                <label class="bs_price_table_label_title" >Title</label>
            </div> 
            <div class="price_table_right"> 
                <input class="price_table_cl" type="text" name="<?='bs_price_table_group['.$i.'][price_table_title]';?>" value="<?=esc_attr($data_tables[$i]['price_table_title']);?>"></input>
            </div>     
        </div>

        <div class="bs_price_price">
             <div class="price_table_left">
                <label class="bs_price_table_label" >Price</label>
             </div>
            <div class="price_table_right"> 
                <input class="price_table_cl" type="text" name="<?='bs_price_table_group['.$i.'][price_table_price]';?>" value="<?=esc_attr($data_tables[$i]['price_table_price']);?>"></input>
            </div>
        </div>
        <div class="bs_price_des">
            <div class="price_table_left">
                <label class="bs_price_table_label" >Description</label>
            </div>
            <?php
            $description =($data_tables[$i]['pric_table_description']);
            ?>
            <div class="price_table_right">
                <textarea  placeholder="10 GB Bandwidth,Up to 100 Users,Security Suite"  class="price_table_cl bs_price_textarea" name="<?='bs_price_table_group['.$i.'][pric_table_description]';?>"><?php echo esc_attr($description)?></textarea>

             </div>
        </div>
        <div class="bs_price_package">
        <div class="price_table_left">
            <label class="bs_price_table_label">package Duration</label>
        </div>
            <div class="price_table_right">     
                    <select  class="price_table_cl" id='price_table_package' name="<?='bs_price_table_group['.$i.'][price_table_package]';?>">;
                    <?php 
                        $values = array('Select','Month','Year');
                        foreach ( $values as $key ) {
                            echo '<option value="' . esc_attr($key) . '"';
                            if ( $key == $data_tables[$i]['price_table_package'] ) {
                                echo 'selected="selected"';
                            }
                            echo '>' . esc_attr($key) . '</option>';
                            }
                            
                     ?>
                    </select> 
            </div>        
        </div>

        <div class="bs_price_bu_text">
        <div class="price_table_left">
            <label class="bs_price_table_label">Button Text</label>
        </div>  
        <div class="price_table_right">
 
            <input  class="price_table_cl" type="text" name="<?='bs_price_table_group['.$i.'][price_table_button_text]';?>" value="<?=esc_attr($data_tables[$i]['price_table_button_text']);?>"></input>
         </div>   

        </div>
      
        <div class="bs_price_bu_link">
            <div class="price_table_left">
                <label class="bs_price_table_label">Button Link</label>
            </div>
            <div class="price_table_right">   
                <input class="price_table_cl" type="text" name="<?='bs_price_table_group['.$i.'][price_table_button_link]';?>" value="<?=esc_attr($data_tables[$i]['price_table_button_link']);?>"></input>
             </div>   

        </div>
        <div class="bs_price_header_color">
            <div class="price_table_left">
                <label class="bs_price_table_label">Header Color</label>
             </div>
             <div class="price_table_right">   
                <input  type="text" class="bs_price_table_color" name="<?='bs_price_table_group['.$i.'][price_table_head_color]';?>" value="<?=esc_attr($data_tables[$i]['price_table_head_color']);?>"></input>
             </div>   
        </div>
        <div class="bs_price_header_tx_color">
            <div class="price_table_left">
                <label class="bs_price_table_label">Header Text Color</label>
             </div>   
            <div class="price_table_right">
                <input  type="text" class="bs_price_table_color" name="<?='bs_price_table_group['.$i.'][price_table_head_font_color]';?>" value="<?=esc_attr($data_tables[$i]['price_table_head_font_color']);?>"></input>
             </div>   
        </div>
        <div class="bs_price_bu_color">
            <div class="price_table_left">
                <label class="bs_price_table_label">Button Color</label>
            </div>
            <div class="price_table_right">    
                <input  type="text" class="bs_price_table_color" name="<?='bs_price_table_group['.$i.'][price_table_button_color]';?>" value="<?=esc_attr($data_tables[$i]['price_table_button_color']);?>"></input>
            </div>    
        </div>
        <div class="bs_price_bu_tx_color">
            <div class="price_table_left">
                <label class="bs_price_table_label">Button Text Color</label>
             </div>   
            <div class="price_table_right">
                <input  type="text" class="bs_price_table_color" name="<?='bs_price_table_group['.$i.'][price_table_button_text_color]';?>" value="<?=esc_attr($data_tables[$i]['price_table_button_text_color']);?>"></input>
            </div>

        </div>
        <div class="bs_price_icon">
            <div class="price_table_left">
                <label class="bs_price_table_label">Icon</label>
            </div>  
            <div class="price_table_right">  
                <input class="price_table_cl" type="text" name="<?='bs_price_table_group['.$i.'][price_table_font_icon]';?>" value="<?=esc_attr($data_tables[$i]['price_table_font_icon']);?>"></input>
            </div>

        </div>
        <div class="bs_price_icon_color">
            <div class="price_table_left">
                <label class="bs_price_table_label">Icon Color</label>
            </div> 
            <div class="price_table_right">   
                <input  type="text" class="bs_price_table_color" name="<?='bs_price_table_group['.$i.'][price_table_font_icon_color]';?>" value="<?=esc_attr($data_tables[$i]['price_table_font_icon_color']);?>"></input>
            </div>    

        </div>


    </div> 
    

     <?php } ?>






