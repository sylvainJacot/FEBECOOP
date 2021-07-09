<span class="addtocalendar">
                    <var class="atc_event">
                        <var class="atc_date_start">
                        <?php if ($one_date || $hour_start_day ) : ?>
                            <?php the_field('ev-date');?>
                            <?php the_field('one-day-heure-start');?>
                        <?php endif;?>

                        <?php if ($several_date  || $hour_start_days ) : ?>
                            <?php the_field('ev-date-start');?>
                            <?php the_field('several-days-heure-start');?>
                        <?php endif;?>

                        </var>

                        <var class="atc_date_end">

                        <?php if ($one_date || $hour_start_day ) : ?>
                            <?php the_field('ev-date');?>
                            <?php the_field('one-day-heure-end');?>
                        <?php endif;?>

                        <?php if ($several_date  || $hour_start_days ) : ?>
                            <?php the_field('several-days-heure-end');?>
                            <?php the_field('ev-date-end');?>
                        <?php endif;?>

                        </var>

                        <var class="atc_title"><?php the_title(); ?></var>
                        <var class="atc_location"><?php the_field('ev-localisation');?></var>
                        <var class="atc_organizer">Febecoop</var>

                    </var>
                </span>