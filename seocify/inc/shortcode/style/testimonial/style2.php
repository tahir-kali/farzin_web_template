<div class="testimonial-slider swiper">
    <div class="swiper-wrapper">
        <?php if( !empty( $testimonials ) ):

            foreach( $testimonials as $testimonial ):

                if( $testimonial[ 'image' ] != '' ){
                    $img = $testimonial[ 'image' ][ 'id' ];
                }
                ?>
                <div class="single-testimonial-preview swiper-slide">
                    <?php if( !empty( $testimonial[ 'review' ] ) ) : ?>
                        <p>“ <?php echo esc_html( $testimonial[ 'review' ] ); ?> ”</p>
                    <?php endif; ?>
                    <span class="border-line"></span>
                    <div class="single-bio-thumb">
                        <?php if( !empty( $img ) ): ?>
                            <div class="bio-image">
                                <?php
                                    echo wp_get_attachment_image($img, 'full',"",array(
                                        'alt'  =>  get_the_title($img),
                                    ));
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="bio-info">
                            <h4 class="small"><?php echo esc_html( $testimonial[ 'client_name' ] ); ?></h4>
                            <p><?php echo esc_html( $testimonial[ 'designation' ] ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>
    <div class="testimonial-slider2-pagination"></div>
</div>

<?php if( $show_watermark == 'yes' ): ?>
    <div class="big-watermark-icon <?php if( $watermark_style == 'small' ){
        echo 'small-version';
    } ?>">
        <i class="xsicon xsicon-quote-right"></i>
    </div>
<?php endif; ?>