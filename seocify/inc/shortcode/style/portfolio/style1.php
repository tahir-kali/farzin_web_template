<div class="cases-grid-item <?php echo esc_attr($project_terms);?>">
    <div class="single-cases-card">
        <div class="card-image">
            <?php 
                if (has_post_thumbnail()):
                echo wp_get_attachment_image(get_post_thumbnail_id($xs_query->ID), 'full',"",array(
                    'alt'  =>  get_the_title(get_post_thumbnail_id($xs_query->ID)),
                ));

            ?>
            <div class="hover-area">
                <a href="<?php echo get_the_permalink(); ?>"><i class="xsicon xsicon-bullhorn"></i></a>
            </div>
            <?php endif; ?> 
        </div>
        <div class="cases-content">
            <h2 class="xs-title">
                <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <?php $categories = get_the_terms( get_the_ID(), 'portfolio_cat' ); 

            $tags = array();
            foreach($categories as $category){ 
            $tags[] = $category->name;
            }
            $tags_str = implode(', ', $tags);
            ?>


            <span class="tag"><?php echo esc_html($tags_str);?></span>
        </div>
    </div>
</div>