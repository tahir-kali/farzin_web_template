<div class="row no-gutters working-process-group"><?php
    foreach($work_process_items as $work_process_item):
    ?>
        <div class="col-lg-3 col-md-6">
            <div class="single-work-process">
                <div class="work-process-icon">
                    <?php
                        echo wp_get_attachment_image($work_process_item['image']['id'], 'full',"",array(
                            'alt'  =>  get_the_title($work_process_item['image']['id']),
                        ));
                    ?>
                </div>
                <h4 class="small"><?php echo esc_html($work_process_item['title']);?></h4>
            </div>
        </div>
    <?php
    endforeach; 
?></div>