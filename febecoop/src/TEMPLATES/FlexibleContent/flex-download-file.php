<?php if(get_row_layout() == 'fichier_a_telecharger') : 

$titre = get_sub_field('titre');
$doc = get_sub_field('fichier');



?>
    <a class="flex-download-cta" href="<?php echo $doc ?>" download>
    <div class="donwload-icone">
    <svg width="29" height="38" viewBox="0 0 29 38" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0 2.6C0 1.1 1.1 0 2.6 0H17.2C17.9 0 18.5 0.3 19 0.7L28.2 9.9C28.7 10.4 28.9 11 28.9 11.7V34.9C28.9 36.3 27.8 37.5 26.3 37.5H2.6C1.2 37.5 0 36.4 0 34.9V2.6ZM2.6 1.7C2.1 1.7 1.7 2.1 1.7 2.6V35C1.7 35.5 2.1 35.9 2.6 35.9H26.5C27 35.9 27.4 35.5 27.4 35V12H19.7C18.3 12 17.1 10.9 17.1 9.4V1.7H2.6ZM18.8 2.9V9.4C18.8 9.9 19.2 10.3 19.7 10.3H26.2L18.8 2.9ZM7.7 17.9C7.7 17.4 8.1 17 8.6 17H20.5C21 17 21.4 17.4 21.4 17.9C21.4 18.4 21 18.8 20.5 18.8H8.5C8.1 18.8 7.7 18.4 7.7 17.9ZM7.7 23C7.7 22.5 8.1 22.1 8.6 22.1H20.5C21 22.1 21.4 22.5 21.4 23C21.4 23.5 21 23.9 20.5 23.9H8.5C8.1 23.9 7.7 23.5 7.7 23ZM7.7 28.1C7.7 27.6 8.1 27.2 8.6 27.2H13.7C14.2 27.2 14.6 27.6 14.6 28.1C14.6 28.6 14.2 29 13.7 29H8.5C8.1 29 7.7 28.6 7.7 28.1Z" fill="#FFA951"/>
</svg>
    </div>

    <?php echo $titre;?></a>

<?php endif;?>