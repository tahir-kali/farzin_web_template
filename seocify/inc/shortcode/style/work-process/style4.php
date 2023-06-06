<div class="work-process-style4">
    <div class="xs-workprocess-slider workprocess-sync2 swiper workprocess-sync2-<?php echo esc_attr($this->get_id()); ?>" data-controls="<?php echo esc_attr($widgets_controls); ?>">

        <div class="swiper-wrapper">
            <?php if(!empty($work_process_items)) :
                $i = 1;
                foreach ($work_process_items as $item) : ?>

                    <div class="item swiper-slide <?php echo esc_attr( $i== 1 ? 'xs-selected' : ''); ?>">
                        <p><?php echo esc_html($item['socify_work_process_yes']); ?></p>

                        <?php if ( 'yes' == $seocify_workporeess_shadow_text ): ?>
                            <span class="xs-workprocess-water-mark"><?php echo esc_html($item['socify_work_process_yes']); ?></span>
                        <?php endif; ?>
                    </div>

                <?php $i++; endforeach; endif; 
            ?>
        </div>
        <div class="workprocess-slider-navigation">
            <div class="work-process-button-prev-<?php echo esc_attr($this->get_id()); ?>">
                <i class="xsicon xsicon-chevron-left"></i>
            </div>
            <div class="work-process-button-next-<?php echo esc_attr($this->get_id()); ?>">
                <i class="xsicon xsicon-chevron-right"></i>
            </div>
        </div>

    </div>

    <div class="xs-workprocess-posts workprocess-sync1 swiper">
        <div class="swiper-wrapper">
            <?php if(!empty($work_process_items)) :
                $i = 1;
                foreach ($work_process_items as $item) :?>

                    <div class="item swiper-slide">
                        <h3><?php echo esc_html($item['title']); ?></h3>
                        <p><?php echo esc_html($item['description']); ?></p>
                    </div>

                <?php endforeach; endif; 
            ?>
        </div>
    </div>
</div>