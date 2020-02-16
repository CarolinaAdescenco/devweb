<?php get_header(); ?>
<main class="interna py-5">
    <div class="container">
        <div class="d-block banner-interna">
            <?php

            /*

            $args_banner = array(
                'post_type' => 'banner',
                'meta_query' => array(
                    array(
                        'key' => 'pagina',
                        'value' => 5,
                        'compare' => 'LIKE',
                    ),
                ),
            );
            $query_banner = new WP_Query($args_banner);
            if ($query_banner->have_posts()) {
                while ($query_banner->have_posts()) {
                    $query_banner->the_post();
                    if (!wp_is_mobile()) {
                        $banner_url = get_field('imagem_desktop');
                    } else {
                        $banner_url = get_field('imagem_mobile');
                    }
                    ?>
                    <img src="<?php echo $banner_url ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="img-fluid d-block w-100">
            <?php
                }
                wp_reset_query();
            } 
            
            */
            ?>
        </div>
    </div>
</main>
<section class="d-block cardapio cardapio-content-produtos produtos mb-md-5" <?php if(!wp_is_mobile()) { echo "style=\"margin-top: 0px !important;\""; } ?>>
    <div class="container">
        <div class="row align-items-start no-gutters">
            <div class="col-12 col-md-2">
                <div class="d-block">
                    <?php $currentCategory = get_category($cat)->category_parent; ?>
                    <?php $categorias = get_categories(
                        array(
                            'taxonomy' => 'category',
                            'exclude' => 1,
                            'parent' => 0,
                            'orderby' => 'ID',
                            'hide_empty' => true
                        )
                    );
                    foreach ($categorias as $key_cat => $categoria) {
                        ?>
                        <div class="d-block item text-dark h5 py-2 px-3 <?= $categoria->term_id == $currentCategory ? 'active' : '' ?>" data-toggle="collapse" href="#collapse_<?= $key_cat ?>" role="button" aria-expanded="false" aria-controls="collapse_<?= $key_cat ?>">
                            <?= $categoria->name; ?>
                        </div>
                        <?php
                            $subcategorias = get_categories(
                                array(
                                    'taxonomy' => 'category',
                                    'exclude' => 1,
                                    'parent' => $categoria->term_id,
                                    'orderby' => 'ID',
                                    'hide_empty' => true
                                )
                            );
                            if (count($subcategorias) > 0) {
                                ?>
                            <div class="collapse py-4 <?= $categoria->term_id == $currentCategory ? 'show' : '' ?>" id="collapse_<?= $key_cat ?>">
                                <div class="submenu">
                                    <?php foreach ($subcategorias as $key_sub => $subcategoria) { ?>
                                        <a href="<?= get_category_link($subcategoria->term_id); ?>" class="d-block subitem categoria text-dark h6 <?= $subcategoria->term_id == $cat ? 'active' : '' ?>">
                                            <?= $subcategoria->name; ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } else { ?>

                                <div class="collapse py-4" id="collapse_<?= $key_cat ?>">

                                    <div class="submenu">

                                        <a href="<?= bloginfo('home')?>/produtos/<?= $categoria->name; ?>" class="d-block subitem categoria text-dark h6"> 

                                            Exibir tudo

                                        </a>

                                    </div>

                                </div>

                            <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-10 px-md-4">
                <div class="d-block descricao-categoria p-4 mb-4">
                    <h4 class="text-dark text-bold"><?= get_cat_name($cat); ?></h4>
                    <?= category_description($cat) ? category_description($cat) : 'Descrição indisponível.'; ?>
                </div>
                <div class="d-block d-md-flex flex-wrap slider-produtos justify-content-start align-items-stretch">
                    <?php
                    $args_produtos = array(
                        'post_type' => 'produto',
                        'posts_per_page' => 8,
                        'category__in' => array($cat)
                    );
                    $query_produtos = new WP_Query($args_produtos);
                    if ($query_produtos->have_posts()) {
                        while ($query_produtos->have_posts()) {
                            $query_produtos->the_post();
                            ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <?php include('shared-produto.php'); ?>
                            </div>
                        <?php
                            }
                            wp_reset_query();
                        } else {
                            ?>
                        <div class="col-12 py-5 text-center">
                            <h2 class="text-dark">Nenhum produto encontrado nesta categoria</h2>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>