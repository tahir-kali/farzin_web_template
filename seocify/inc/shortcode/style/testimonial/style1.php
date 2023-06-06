<div class="testimonial-slider-preview testimonial-slider-style-1 swiper" id="sync1-slider-preview-<?php echo $this->get_id(); ?>" data-id="sync1-slider-preview-<?php echo $this->get_id(); ?>">

    <div class="swiper-wrapper">
    <?php if (!empty($testimonials)):

        foreach ($testimonials as $testimonial):
            $img = $testimonial['image']['url'];
        ?>
        <div class="single-testimonial-preview swiper-slide">
            <?php if (!empty($testimonial['review'])) : ?>
                <p>“ <?php echo esc_html($testimonial['review']); ?> ”</p>
            <?php endif; ?>
            <span class="border-line"></span>
        </div>
        <?php endforeach;
        endif; 
    ?>
    </div>
</div>
<div class="testimonial-slider-thumb testimonial-slider-style-1-thumb swiper" id="sync2-slider-thumb-<?php echo $this->get_id(); ?>" data-id="sync2-slider-thumb-<?php echo $this->get_id(); ?>">

    <div class="swiper-wrapper">
    <?php if (!empty($testimonials)):

        foreach ($testimonials as $testimonial):

            if ($testimonial['image'] != '') {
                $img = $testimonial['image']['id'];
            }
            ?>

            <div class="single-bio-thumb swiper-slide">
                
                <?php if (!empty($img)): ?>
                    <div class="bio-image">
                        <?php
                            echo wp_get_attachment_image($img, 'full',"",array(
                                'alt'  =>  get_the_title($img),
                            ));
                        ?>
                    </div>
                <?php endif; ?>
                <div class="bio-info">
                    <h4 class="small"><?php echo esc_html($testimonial['client_name']); ?></h4>
                    <p><?php echo esc_html($testimonial['designation']); ?></p>
                </div>
            </div>
        <?php endforeach;
        endif; 
    ?>
    </div>
</div>
<?php if($show_watermark == 'yes'): ?>
    <div class="big-watermark-icon <?php if($watermark_style == 'small'){ echo 'small-version'; }?>">
        <i class="xsicon xsicon-quote-right"></i>
    </div>
<?php endif; ?>