<div class="col-md-6 col-lg-<?php echo esc_attr( $count_col ); ?> recent-post">
    <div class="single-blog-post-thumb post-style-2">
        <?php
        if ( has_post_thumbnail() ):
            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $xs_query->ID ), 'full' );
            $img = $img[ 0 ];
            ?>
            <div class="post-image">
                <?php
                    echo wp_get_attachment_image( get_post_thumbnail_id( $xs_query->ID ), 'full',"",array(
                        'alt'  =>  get_the_title(get_post_thumbnail_id( $xs_query->ID )),
                    ));
                ?>
            </div>
        <?php endif; ?>
        <div class="post-body">
            <div class="entry-header">

                <div class="entry-meta">
                    <span class="meta-date"><i class="xsicon xsicon-circle"></i> <?php echo get_the_date(); ?></span>
                </div>

                <h4 class="entry-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <div class="entry-content">
                    <a href="<?php echo esc_url(the_permalink()); ?>">
                        <i class="xsicon xsicon-plus"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>