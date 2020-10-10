<form role="search" <?php echo $aria_label?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) );?>">
    <label>
        <span class="screen-reader-text"><?php echo __('Знайти');?></span>
        <input type="search" class="search-field" placeholder="<?php echo __('Пошуковий текст..');?>" value="<?php echo get_search_query();?>" name="s" />
    </label>
    <input type="submit" class="search-submit" value="<?php echo __('Пошук');?>" />
</form>