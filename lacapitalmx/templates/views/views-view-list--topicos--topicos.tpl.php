<?php if(count($view->result)>1): ?>
<?php drupal_add_js(drupal_get_path('theme', 'lacapitalmx') . '/js/isotope.pkgd.min.js'); ?>
<div class="nodeTopicoRelateds">
  <div class="nodeTopicoRelatedsCategory bt1 tacenter pt10">
    <?php $data_filter=array();?>
    <?php ?>
    <?php foreach($view->result as $t):?>
    <?php if($t->field_field_ocio[0]["raw"]["tid"]=="305787" && !array_key_exists("305787",$data_filter)): //calle ?> 
    <?php $data_filter[]=$t->field_field_ocio[0]["raw"]["tid"] ?>
    <?php endif;?>
    <?php if($t->field_field_ocio[0]["raw"]["tid"]=="305788" && !array_key_exists("305788",$data_filter)): //calle ?> 
    <?php $data_filter[]=$t->field_field_ocio[0]["raw"]["tid"] ?>
    <?php endif;?>
    
    <?php if($t->node_type=="article" && !array_key_exists("article",$data_filter)): //calle ?> 
    <?php $data_filter[]=$t->node_type ?>
    <?php endif;?>
    <?php if($t->node_type=="video" && !array_key_exists("video",$data_filter)): //calle ?> 
    <?php $data_filter[]=$t->node_type ?>
    <?php endif;?>
    <?php if($t->node_type=="gallerie" && !array_key_exists("gallerie",$data_filter)): //calle ?> 
    <?php $data_filter[]=$t->node_type ?>
    <?php endif;?>
    <?php endforeach;?>
    <?php asort($data_filter)?>
    
    <?php $size=count($data_filter)+1;?>
    <span id="nt-todos" class="N16b4 left col-<?php echo $size ?> link active filter-topic" data-filter="grid-item-topic">Todos</span>
    <?php foreach($data_filter as $d):?>
    <?php if($d=="305787" && !array_key_exists("305787",$data_filter)): //calle ?> 
    <span id="nt-calle" class="N16b4 left col-<?php echo $size ?> link filter-topic" data-filter="topic-calle">Para la calle</span>
    <?php endif;?>
    <?php if($d=="305788" && !array_key_exists("305788",$data_filter)): //calle ?> 
    <span id="nt-sillon" class="N16b4 left col-<?php echo $size ?> link filter-topic" data-filter="topic-sillon">Para el sillón</span>
    <?php endif;?>
    
    <?php if($d=="article" && !array_key_exists("article",$data_filter)): //calle ?> 
    <span id="nt-article" class="N16b4 left col-<?php echo $size ?> link filter-topic" data-filter="topic-article">Articulos</span>
    <?php endif;?>
    <?php if($d=="video" && !array_key_exists("video",$data_filter)): //calle ?> 
    <span id="nt-videos" class="N16b4 left col-<?php echo $size ?> link filter-topic" data-filter="topic-video">Videos</span>
    <?php endif;?>
    <?php if($d=="gallerie" && !array_key_exists("gallerie",$data_filter)): //calle ?> 
    <span id="nt-galerias" class="N16b4 left col-<?php echo $size ?> link filter-topic" data-filter="topic-gallerie">Galerías</span>
    <?php endif;?>
    <?php endforeach;?>
    
    <?php // print_r($data_filter);exit;?>
    <div class="clear"></div> 
  </div>
  <section class="nodesList listado-full">
    <ul class="grid-topicos">
      <?php foreach ($view->result as $v): ?>
          <?php
          $type=$v->node_type;
          $ocio = isset($v->field_field_ocio[0]) ? $v->field_field_ocio[0]["raw"]["tid"] : "";
          $images = isset($v->field_field_image) ? $v->field_field_image[0]["rendered"]["#item"]['uri'] : "";
          $categoria = isset($v->field_field_categoria) ? $v->field_field_categoria[0]["raw"]["taxonomy_term"]->name : "";
          $body_sumary = isset($v->field_body) ? $v->field_body[0]["raw"]["summary"] : "";
          $votos = isset($v->field_field_votos) ? $v->field_field_votos[0]["raw"]["average"] : "";
          ?>          
          <li class="bt1 ptb10 mtb10 grid-item-topic topic-<?php echo $type?> <?php echo ($ocio == 305787) ? "topic-calle" : "topic-sillon"?>">
            <article itemscope itemtype="http://schema.org/NewsArticle">
              <div class="nodesList-img prelative left cuad-4 bsbb">
                <a href="<?php echo url("node/" . $v->nid) ?>" class="no-bg">
                  <img itemprop="image" src="<?php print ($images) ? image_style_url('home_y_canales', $images) : "http://placehold.it/440x250"  ?>" alt="<?php echo $v->node_title ?>" />
                </a>
              </div>
              <div class="nodesList-text pt10 left cuad-8 bsbb pl10">
                <h1 itemprop="headline" class="mtb10">
                  <a href="<?php echo url("node/" . $v->nid) ?>" class="O25r0"><?php echo $v->node_title ?></a>
                </h1>
                <p itemprop="description" class="N18r0 lh22"><?php echo $body_sumary ?></p>
                <div class="nodesListKeywords N13r4 mt10">
                  <span class="<?php echo ($ocio == 305787) ? "icn-calle" : "icn-sillon" ?> left mr10"></span> 
                  <?php if ($categoria): ?>
                    <a href="<?php echo url('taxonomy/term/' . $v->field_field_categoria[0]["raw"]["tid"]) ?>" class="N13r4 mt5 diblock"><?php echo strtolower($categoria) ?></a>
                  <?php endif; ?>
                  <?php foreach ($v->field_field_categoria_secundaria as $t): ?>
                    |<a href="<?php echo url('taxonomy/term/' . $t["raw"]["tid"]) ?>" class="N13r4 mt5 diblock"><?php echo strtolower($t["raw"]["taxonomy_term"]->name) ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="clear"></div>
            </article>
          </li>
        <?php endforeach; ?>
    </ul>
  </section>
</div>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('.grid-topicos').isotope({
  // options
  itemSelector: '.grid-item-topic',
  layoutMode: 'fitRows'
});
  });
  
  jQuery("body").on("click",".filter-topic",function(){
    var element=jQuery(this).attr("id");
    jQuery(".active").removeClass("active");
    jQuery('.grid-topicos').isotope({filter: '.'+jQuery(this).attr("data-filter")+'' });
    setTimeout(function(){
      jQuery("#"+element).addClass("active");
    },200);
  });
</script>
<?php endif;?>