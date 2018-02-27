jQuery(document).ready(function($) {

   $(document).on('click', '.encrypted-font-group li', function(){
	   	$('.encrypted-font-group li').removeClass();
	    $(this).addClass('selected');
	    var aa = $(this).parents('#encrypted-font-awesome-list').find('.encrypted-font-group li.selected').children('i').attr('class');
    	$(this).parents('#encrypted-font-awesome-list').siblings('p').find('.hidden-icon-input').val(aa);
    	$(this).parents('#encrypted-font-awesome-list').siblings('p').find('.icon-receiver').html('<i class="'+aa+'"></i>');
	    return false;
   });
    
});
