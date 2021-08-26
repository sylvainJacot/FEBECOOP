<?php
        $label = get_field('footer_formulaires', 'options');
        $link = get_field('footer_formulaire_lien', 'options');
        ?>
            <a class="form-type-a-footer"  href="mailto:<?php echo$link; ?>">

                    <?php
                    $openspan = "<span>";
                    $openmainttitle = str_replace('(*(', $openspan, $label);
                    $closemainttitle = str_replace(')*)','</span>',$openmainttitle);
                    echo $closemainttitle;
                    ?>


            </a>


    </div>
</section>



