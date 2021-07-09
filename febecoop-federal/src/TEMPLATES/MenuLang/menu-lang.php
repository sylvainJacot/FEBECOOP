<div class="menu-lang menu-lang-mobile" id="js-menu-lang">
    <?php 
    $languages = pll_the_languages(array('raw' => 1)); ?>
    <a href="#"><?php echo pll_current_language(); ?><?php get_template_part( '/src/assets/images/common/svg/icons/arrow' );?></a>
    <ul>
        <?php
        foreach ($languages as $lang) :
        if($lang['slug'] != pll_current_language()):
            echo '<li><a href ="' . $lang['url'] .'" hreflang = "' . $lang['slug'] . '">' . $lang['slug'] . '</a></li>';
        endif;
        endforeach;
        ?>
    </ul>
</div>

<div class="menu-lang menu-lang-laptop" id="js-menu-lang">
    <?php 
    $languages = pll_the_languages(array('raw' => 1)); ?>
    <a href="#"><?php echo pll_current_language(); ?><?php get_template_part( '/src/assets/images/common/svg/icons/arrow' );?></a>
    <ul>
        <?php
        foreach ($languages as $lang) :
        if($lang['slug'] != pll_current_language()):
            echo '<li><a href ="' . $lang['url'] .'" hreflang = "' . $lang['slug'] . '">' . $lang['slug'] . '</a></li>';
        endif;
        endforeach;
        ?>
    </ul>
</div>