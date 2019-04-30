<?php get_header()?>
    <?php if ( have_posts() ) { while ( have_posts() ) { the_post() ?>

        <!-- Loop para CPT -->
        <div class="d-block mx-0 my-5 item-servicos">                       
            <?php  
                $args_exemplo = array('post_type' => 'produto', 'posts_per_page' => -1);
                $query_exemplo = new WP_Query($args_exemplo);

                if ($query_exemplo -> have_posts()) {
                    while ( $query_exemplo -> have_posts()) {						
                        $query_exemplo -> the_post();                   
            ?>   

                <a href="<?php the_permalink()?>" class="p-3">
                    <figure>
                        <img src="<?php the_field('imagem_externa')?>" class="img-fluid">
                        <figcaption>
                            <h5><?php the_title()?></h5>
                        </figcaption>
                    </figure>
                </a>

            <?php
                        } 
                    wp_reset_query();
                }
            ?>
        </div>

        <!-- Loop foreach -->
        <?php foreach(get_field('paragrafos') as $info){ ?>
            <p><?php echo $info['paragrafo']?></p>
            <img src="<?php echo $info['imagem']?>" alt="Descrição da imagem" title="Título da imagem">
        <?}?>

        <!-- Campo repetidor dentro de outro campo repetidor -->
        <?php if( have_rows('perfil_comportamental', 55) ):

            // loop through the rows of data
            while ( have_rows('perfil_comportamental', 55) ) : the_row();

                if( have_rows('texto') ):

                    // loop through the rows of data
                    while ( have_rows('texto') ) : the_row();?>

                    <p style="line-height: 1.2"> <?php echo strip_tags(the_sub_field('paragrafo'));?> </p>

                    <?php endwhile;
                endif;
            endwhile;
            ?>
        <?php endif ?>

        <!-- Retirar formatação content -->
        <p><?php echo striptags(get_the_content())?></p>

        <!-- Retirar formatação content de outra página -->
        <p><?php echo strip_tags(get_post(19) -> post_content)?></p>

        <!-- Imagem destacada -->
        <img src="<?php the_post_thumnail_url()?>" alt="Descrição da imagem" title="Título da imagem">

        <!-- Puxa postagens de outro blog -->
        <div class="container">
            <div class="row mx-0">
                <div class="col-md-12">
                <h3 class="blog--home-titulo text-center mb-3 mb-md-5 p-3">Artigos em destaque</h3>
                </div>
            </div>
            <div class="row mx-0">
                <?php 
                $json = file_get_contents('https://blog.gruposocium.com.br/wp-json/wp/v2/posts?per_page=3');
                $posts = json_decode($json);
                foreach($posts as $p){ ?>
                    <div class="col-md-4">
                            <img src="<?php echo $p->better_featured_image->source_url ?>" class="img-fluid" style="height: 180px; width: 100%;" alt="">
                            <h3>
                                <?php echo $p->title->rendered; ?>
                            </h3>
                            <p>
                                <?php echo countWords($p->excerpt->rendered, 24); ?> [...]
                            </p>
                            <a class="btn--depoimentos" href="<?php echo $p->link; ?>">Continue lendo...</a>
                    </div>
                <?php } ?>
            </div>
        </div>



    <?php } wp_reset_postdata(); } ?>
<?php get_footer()?>