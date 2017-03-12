<?php
drupal_add_css(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScroll/IMXScroll.css');
drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScroll/handlebars-v1.3.0.js', array('scope' => 'header', 'weight' => -2));
drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScroll/jquery.ImxInfiniteScroll.plugin-v2.0.min.js', array('scope' => 'header', 'weight' => -1));
drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/infiniteScrolls.js', array('scope' => 'header', 'weight' => 0));
?>
<section id="registerEvent" class="tacenter">
<h1 class="O60l0 tacenter mt30 mb30">¡Muchas gracias por tu colaboración en Garuyo!</h1>
    <h3 class="O40l0 tacenter mt40 mb20">En breve te informaremos si tu lugar/evento ha sido publicado</h3>
    <h3 class="O40l0 tacenter mt40 mb20">¿Deseas registar otro lugar/evento?</h3>
    <a href="/registrar-evento-lugar" class="btn-registrar mt30 centered"><span></span></a>
</section>
<section class="nodesList listado-cuadricula limited">
  
    <ul id="infiniteAds">
        <li id="imx_ads_block_3" class="col-3 bsbb pl10 mt30 tacenter pr5 mb20 left"></li>
        <?php
        foreach ($view->result as $idx => $v):
            $ocio = isset($v->field_field_ocio[0]) ? $v->field_field_ocio[0]["raw"]["tid"] : "";
            $images = isset($v->field_field_image) ? $v->field_field_image[0]["rendered"]["#item"]['uri'] : "";
            $categoria = isset($v->field_field_categoria) ? $v->field_field_categoria[0]["raw"]["taxonomy_term"]->name : "";
            $body_sumary = isset($v->field_body) ? $v->field_body[0]["raw"]["summary"] : "";
            $votos = isset($v->field_field_votos) ? $v->field_field_votos[0]["raw"]["average"] : "";
            ?>
            <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
                <article itemscope itemtype="http://schema.org/NewsArticle">
                    <div class="nodesList-img prelative">
                        <div class="nodesList-tools <?php echo ($ocio == 305787) ? "bg-ocio-calle" : " bg-ocio-sillon" ?>">
                            <div class="nodesList-section <?php echo ($ocio == 305787) ? "pleca-ocio-calle-s" : "pleca-ocio-sillon-s" ?>"></div>
                            <?php if ($user->uid): ?>
                                <span title="Agregar a favoritos" id="<?php echo $v->nid ?>" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark" data-mark-nid="<?php echo $v->nid ?>" data-mark-status="0" data-mark-type="1"></span>
                            <?php else:?>
                            <span title="Agregar a favoritos" id="<?php echo $v->nid ?>" class="icn-pin no-sesion right link mr10" data-mark-nid="<?php echo $v->nid ?>" data-mark-status="0" data-mark-type="1"></span>
                            <?php endif;?>
                        </div>
                        <a href="<?php echo url('node/' . $v->nid,array('absolute' => true)) ?>">
                            <img itemprop="image" class="lazy-garuyo"  data-original="<?php print ($images) ? image_style_url('home_y_canales', $images) : "http://placehold.it/440x250"  ?>" alt="<?php echo $v->node_title ?>" />
                        </a>
                        <div class="nodesList-ranking  <?php echo ($ocio == 305787) ? "bg-ocio-calle-o" : "bg-ocio-sillon-o" ?>">
                            <span class="stars-<?php echo ceil((($votos) / 2) / 10) ?>"></span>
                        </div>
                    </div>
                    <div itemprop="keywords" class="N16b4 mt5">
                        <?php if ($categoria): ?>
                            <a href="<?php echo url('taxonomy/term/' . $v->field_field_categoria[0]["raw"]["tid"],array('absolute' => true)) ?>" class="N16b4"><?php echo strtolower($categoria) ?></a>
                        <?php endif; ?>
                        <?php foreach ($v->field_field_categoria_secundaria as $t): ?>
                            |<a href="<?php echo url('taxonomy/term/' . $t["raw"]["tid"],array('absolute' => true)) ?>" class="N16b4"><?php echo strtolower($t["raw"]["taxonomy_term"]->name) ?></a>
                        <?php endforeach; ?>
                    </div>
                    <h1 itemprop="headline" class="mtb10">
                        <a href="<?php print url('node/' . $v->nid,array('absolute' => true)) ?>" class="O25r0"><?php echo $v->node_title ?></a>
                    </h1>
                    <p itemprop="description" class="N18r0 lh22"><?php print $body_sumary ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="clear"></div>
</section>
<script type="text/IMxInfiniteScroll" id="wrapper-infinite-scrollHome" style="display:none;">
    <li id="infiniteAds_banner" class="col-3 bsbb pl10 mt30 tacenter pr5 mb20 left"></li>
    {{#ifC3 this.0.url "&&" this.0.title "&&" this.0.images.principal.0.styles.large.url }}
        <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
            <article itemscope itemtype="http://schema.org/NewsArticle">
                <div class="nodesList-img prelative">
                    <div class="nodesList-tools bg-ocio-calle">
                        <div class="nodesList-section pleca-ocio-calle-s"></div>
                        <span title="Agregar a favoritos" id="{{ this.0.id }}" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark"></span>
                    </div>
                    <a href="{{ this.0.url }}">
                        <img itemprop="image" src="{{ this.0.images.principal.0.styles.large.url }}" alt="{{ this.0.title }}" />
                    </a>
                    <div class="nodesList-ranking bg-ocio-calle-o">
                        <span class="stars-1"></span>
                    </div>
                </div>
                <div itemprop="keywords" class="N16b4 mt5">
                    <a href="{{ this.0.taxonomy.0.url }}" class="N16b4">{{ this.0.taxonomy.0.name }}</a>
                </div>
                <h1 itemprop="headline" class="mtb10">
                    <a href="{{ this.0.url }}" class="O25r0">{{ this.0.title }}</a>
                </h1>
                <p itemprop="description" class="N18r0 lh22">{{ this.0.summary }}</p>
            </article>
        </li>
    {{/ifC3}}
    {{#ifC3 this.1.url "&&" this.1.title "&&" this.1.images.principal.0.styles.large.url }}
        <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
            <article itemscope itemtype="http://schema.org/NewsArticle">
                <div class="nodesList-img prelative">
                    <div class="nodesList-tools bg-ocio-calle">
                        <div class="nodesList-section pleca-ocio-calle-s"></div>
                        <span title="Agregar a favoritos" id="{{ this.1.id }}" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark"></span>
                    </div>
                    <a href="{{ this.1.url }}">
                        <img itemprop="image" src="{{ this.1.images.principal.0.styles.large.url }}" alt="{{ this.1.title }}" />
                    </a>
                    <div class="nodesList-ranking bg-ocio-calle-o">
                        <span class="stars-1"></span>
                    </div>
                </div>
                <div itemprop="keywords" class="N16b4 mt5">
                    <a href="{{ this.1.taxonomy.0.url }}" class="N16b4">{{ this.1.taxonomy.0.name }}</a>
                </div>
                <h1 itemprop="headline" class="mtb10">
                    <a href="{{ this.1.url }}" class="O25r0">{{ this.1.title }}</a>
                </h1>
                <p itemprop="description" class="N18r0 lh22">{{ this.1.summary }}</p>
            </article>
        </li>
    {{/ifC3}}
    {{#ifC3 this.2.url "&&" this.2.title "&&" this.2.images.principal.0.styles.large.url }}
        <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
            <article itemscope itemtype="http://schema.org/NewsArticle">
                <div class="nodesList-img prelative">
                    <div class="nodesList-tools bg-ocio-calle">
                        <div class="nodesList-section pleca-ocio-calle-s"></div>
                        <span title="Agregar a favoritos" id="{{ this.2.id }}" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark"></span>
                    </div>
                    <a href="{{ this.2.url }}">
                        <img itemprop="image" src="{{ this.2.images.principal.0.styles.large.url }}" alt="{{ this.2.title }}" />
                    </a>
                    <div class="nodesList-ranking bg-ocio-calle-o">
                        <span class="stars-1"></span>
                    </div>
                </div>
                <div itemprop="keywords" class="N16b4 mt5">
                    <a href="{{ this.2.taxonomy.0.url }}" class="N16b4">{{ this.2.taxonomy.0.name }}</a>
                </div>
                <h1 itemprop="headline" class="mtb10">
                    <a href="{{ this.2.url }}" class="O25r0">{{ this.2.title }}</a>
                </h1>
                <p itemprop="description" class="N18r0 lh22">{{ this.2.summary }}</p>
            </article>
        </li>
    {{/ifC3}}
    {{#ifC3 this.3.url "&&" this.3.title "&&" this.3.images.principal.0.styles.large.url }}
        <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
            <article itemscope itemtype="http://schema.org/NewsArticle">
                <div class="nodesList-img prelative">
                    <div class="nodesList-tools bg-ocio-calle">
                        <div class="nodesList-section pleca-ocio-calle-s"></div>
                        <span title="Agregar a favoritos" id="{{ this.3.id }}" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark"></span>
                    </div>
                    <a href="{{ this.3.url }}">
                        <img itemprop="image" src="{{ this.3.images.principal.0.styles.large.url }}" alt="{{ this.3.title }}" />
                    </a>
                    <div class="nodesList-ranking bg-ocio-calle-o">
                        <span class="stars-1"></span>
                    </div>
                </div>
                <div itemprop="keywords" class="N16b4 mt5">
                    <a href="{{ this.3.taxonomy.0.url }}" class="N16b4">{{ this.3.taxonomy.0.name }}</a>
                </div>
                <h1 itemprop="headline" class="mtb10">
                    <a href="{{ this.3.url }}" class="O25r0">{{ this.3.title }}</a>
                </h1>
                <p itemprop="description" class="N18r0 lh22">{{ this.3.summary }}</p>
            </article>
        </li>
    {{/ifC3}}
    {{#ifC3 this.4.url "&&" this.4.title "&&" this.4.images.principal.0.styles.large.url }}
        <li class="col-3 bsbb pl10 mt30 pr5 mb20 left">
            <article itemscope itemtype="http://schema.org/NewsArticle">
                <div class="nodesList-img prelative">
                    <div class="nodesList-tools bg-ocio-calle">
                        <div class="nodesList-section pleca-ocio-calle-s"></div>
                        <span title="Agregar a favoritos" id="{{ this.4.id }}" class="icn-pin imx-mark-pin-favorites right link mr10 imx_mark"></span>
                    </div>
                    <a href="{{ this.4.url }}">
                        <img itemprop="image" src="{{ this.4.images.principal.0.styles.large.url }}" alt="{{ this.4.title }}" />
                    </a>
                    <div class="nodesList-ranking bg-ocio-calle-o">
                        <span class="stars-1"></span>
                    </div>
                </div>
                <div itemprop="keywords" class="N16b4 mt5">
                    <a href="{{ this.4.taxonomy.0.url }}" class="N16b4">{{ this.4.taxonomy.0.name }}</a>
                </div>
                <h1 itemprop="headline" class="mtb10">
                    <a href="{{ this.4.url }}" class="O25r0">{{ this.4.title }}</a>
                </h1>
                <p itemprop="description" class="N18r0 lh22">{{ this.4.summary }}</p>
            </article>
        </li>
    {{/ifC3}}
</script>