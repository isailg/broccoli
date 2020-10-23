<?php get_header(); ?>

<main class='container'>
    <?php if(have_posts()){
            while(have_posts()){
                the_post(); ?>
            <h1 class='my-3'><?php //the_title(); ?></h1>
            <div class="row">
              <div class="col-12">
                <?php //the_content(); ?>
                <img src="<?php echo get_template_directory_uri()?>/assets/images/Assorted-Fruits.jpg" class="figure-img img-fluid rounded" alt="Responsive image">
              </div>
            </div>

        <?php    }
    }?>

    <div class="lista-productos my-5">
        <h2 class='text-center'>PRODUCTOS</h2>
        <div class="row">
        <?php
        $args = array(
            'post_type' => 'producto',
            'post_per_page' => -1, //All products
            'order'         => 'ASC',
            'orderby'       => 'title'
        );

        $productos = new WP_Query($args);

        if($productos->have_posts()){
            while($productos->have_posts()){
                $productos->the_post();
                ?>

                <div class="col-4">
                    <figure>
                        <?php the_post_thumbnail('large'); ?>
                    </figure>
                    <h4 class='my-3 text-center'>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title();?>
                        </a>
                    </h4>
                </div>

           <?php }
        }

        ?>
      </div>
    </div>
</main>

<?php get_footer() ?>
