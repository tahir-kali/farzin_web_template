<div class="xs-seocify-testimonial-10 swiper xs-seocify-testimonial-4" data-nagivation="<?php echo esc_attr($seocify_hide_navigation); ?>">
    <div class="swiper-wrapper">
        <?php if(!empty($testimonials)) {
            foreach ($testimonials as $testimonial) {

            ?>
            <div class="xs-seocify-testimonial-review swiper-slide">
                <?php if ( $testimonial['icon'] ): ?>
                    <i class="<?php echo esc_attr( $testimonial['icon'] );  ?>"></i>
                <?php endif ?>

                <div class="xs-seocify-testimonial-rating">
                    <i class="xsicon xsicon-star"></i>
                    <i class="xsicon xsicon-star"></i>
                    <i class="xsicon xsicon-star"></i>
                    <i class="xsicon xsicon-star"></i>
                    <i class="xsicon xsicon-star"></i>
                </div>
                <?php if($testimonial['review']) : ?>

                    <p><?php echo esc_html($testimonial['review']); ?></p>

                <?php endif;

                if($testimonial['client_name']) : ?>
                    <h4><?php echo esc_html($testimonial['client_name']); ?></h4>
                <?php endif;

                if($testimonial['designation']): ?>

                    <h5><?php echo esc_html($testimonial['designation']); ?></h5>

                <?php endif; ?>
            </div>
        <?php } } ?>
    </div>
    <div class="xs-seocify-testimonial-10-navigation xs-seocify-testimonial-4">
        <div class="swiper-button-prev">
            <i class="xsicon xsicon-arrow-left"></i>
        </div>
        <div class="swiper-button-next">
            <i class="xsicon xsicon-arrow-right"></i>
        </div>
    </div>
    
</div>