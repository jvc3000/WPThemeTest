<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 12/13/2015
 * Time: 9:39 PM
 */
?>

<form role="search" method="get" action="<?php echo home_url('/'); ?>">
	<input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="Search" />
</form>