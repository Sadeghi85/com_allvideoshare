<?php

/*
 * @version		$Id: add.php 2.3.0 2014-06-21 $
 * @package		Joomla
 * @copyright   Copyright (C) 2012-2014 MrVinoth
 * @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');


//$document = JFactory::getDocument();
//$document->addCustomTag('<script src="'.Juri::base() . 'components/com_allvideoshare/js/jquery.form.min.js" type="text/javascript"></script>');
?>

<div id="avs">
<div id="dim" style="display:none;z-index: 1000;background-color: #000;width: 100%;height: 100%;position: fixed;top: 0;left: 0;opacity: .5;text-align: center;"><img alt="" style="top: 50%;position: relative;" src="components/com_allvideoshare/assets/loading.gif" /></div>

  <form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
  	<?php 
		AllVideoShareFallback::startTabs();
		AllVideoShareFallback::initPanel(JText::_('GENERAL_SETTINGS'), 'generalsettingstab');
  	?>
    <table class="admintable">
      <tr>
        <td class="avskey"><?php echo JText::_('TITLE'); ?></td>
        <td><input type="text" name="title" size="60" /></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('SLUG'); ?></td>
        <td><input type="text" name="slug" size="60" /></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('TYPE'); ?></td>
        <td>
          <?php echo $this->type; ?>
          <span id="avs_help"> 
          	<a href="http://allvideoshare.mrvinoth.com/forum/7-adding-videos/3-video-uploading-issues" target="_blank"><?php echo JText::_('GENERAL_UPLOAD_HELP'); ?></a>
          </span>
        </td>
      </tr>
      <tr id="data_streamer">
        <td class="avskey"><?php echo JText::_('STREAMER'); ?></td>
        <td><input type="text" name="streamer" size="60" /></td>
      </tr>
      <tr id="url_data_video">
        <td class="avskey"><?php echo JText::_('VIDEO'); ?></td>
        <td><input type="text" name="video" size="60" /></td>
      </tr>
      <tr id="url_data_hd">
        <td class="avskey"><?php echo JText::_('HD_VIDEO'); ?></td>
        <td><input type="text" name="hd" size="60" /></td>
      </tr>
      <tr id="url_data_thumb">
        <td class="avskey"><?php echo JText::_('THUMB'); ?></td>
        <td><input type="text" name="thumb" size="60" /></td>
      </tr>
      <tr id="url_data_preview">
        <td class="avskey"><?php echo JText::_('PREVIEW'); ?></td>
        <td><input type="text" name="preview" size="60" /></td>
      </tr>
	  
	  <tr id="data_cdn_url">
        <td class="avskey"><?php echo JText::_('CDN_URL'); ?></td>
        <td><input type="text" name="cdn_url" size="60" value="<?php echo $this->cdn['cdn_url']; ?>" /></td>
      </tr>
	  <tr id="data_cdn_username">
        <td class="avskey"><?php echo JText::_('CDN_USERNAME'); ?></td>
        <td><input type="text" name="cdn_username" size="60" value="<?php echo $this->cdn['cdn_username']; ?>" /></td>
      </tr>
	  <tr id="data_cdn_password">
        <td class="avskey"><?php echo JText::_('CDN_PASSWORD'); ?></td>
        <td><input type="password" name="cdn_password" size="60" value="<?php echo $this->cdn['cdn_password']; ?>" /></td>
      </tr>
	  <tr id="upload_cdn_video">
        <td class="avskey"><?php echo JText::_('VIDEO'); ?></td>
        <td><input type="file" name="cdn_video" maxlength="100" /></td>
      </tr>
      <tr id="upload_cdn_thumb">
        <td class="avskey"><?php echo JText::_('THUMB'); ?></td>
        <td><input type="file" name="cdn_thumb" maxlength="100" /></td>
      </tr>
      <tr id="upload_cdn_preview">
        <td class="avskey"><?php echo JText::_('PREVIEW'); ?></td>
        <td><input type="file" name="cdn_preview" maxlength="100" /></td>
      </tr>
	  
	  <input type="hidden" name="categoryslugs" value="<?php echo $this->categoryslugs; ?>">
	  
	  
	  
	  
      <tr id="upload_data_video">
        <td class="avskey"><?php echo JText::_('VIDEO'); ?></td>
        <td><input type="file" name="upload_video" maxlength="100" /></td>
      </tr>
      <tr id="upload_data_hd">
        <td class="avskey"><?php echo JText::_('HD_VIDEO'); ?></td>
        <td><input type="file" name="upload_hd" maxlength="100" /></td>
      </tr>
      <tr id="upload_data_thumb">
        <td class="avskey"><?php echo JText::_('THUMB'); ?></td>
        <td><input type="file" name="upload_thumb" maxlength="100" /></td>
      </tr>
      <tr id="upload_data_preview">
        <td class="avskey"><?php echo JText::_('PREVIEW'); ?></td>
        <td><input type="file" name="upload_preview" maxlength="100" /></td>
      </tr>
      <tr id="data_token">
        <td class="avskey"><?php echo JText::_('TOKEN'); ?></td>
        <td><input type="text" name="token" size="60" /></td>
      </tr>
      <tr id="data_dvr">
        <td class="avskey"><?php echo JText::_('DVR'); ?></td>
        <td><?php echo AllVideoShareUtils::ListBoolean('dvr'); ?></td>
      </tr>
      <tr id="data_thirdparty">
        <td class="avskey"><?php echo JText::_('THIRD_PARTY_EMBEDCODE'); ?></td>
        <td><textarea name="thirdparty" rows="6" cols="50" ></textarea></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('DESCRIPTION'); ?></td>
        <td><?php echo AllVideoShareFallback::getEditor('description'); ?></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('SELECT_A_CATEGORY'); ?></td>
        <td><?php echo $this->category; ?></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('ACCESS');?></td>
        <td><?php echo $this->access; ?></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('FEATURED'); ?></td>
        <td><?php echo AllVideoShareUtils::ListBoolean('featured'); ?></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('PUBLISH'); ?></td>
        <td><?php echo AllVideoShareUtils::ListBoolean('published'); ?></td>
      </tr>
    </table>
    <?php AllVideoShareFallback::initPanel(JText::_('SEO_SETTINGS'), 'seosettingstab', true); ?>
    <table class="admintable">
      <tr>
        <td class="avskey"><?php echo JText::_('META_KEYWORDS'); ?></td>
        <td><textarea name="tags" rows="3" cols="50" ></textarea></td>
      </tr>
      <tr>
        <td class="avskey"><?php echo JText::_('META_DESCRIPTION'); ?></td>
        <td><textarea name="metadescription" rows="6" cols="50" ></textarea></td>
      </tr>
    </table>
    <?php AllVideoShareFallback::endTabs(); ?>
    <input type="hidden" name="boxchecked" value="1">
    <input type="hidden" name="option" value="com_allvideoshare" />
    <input type="hidden" name="view" value="videos" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="user" value="<?php echo $this->user; ?>" />
    <?php echo JHTML::_( 'form.token' ); ?>
  </form>
</div>
<script type="text/javascript">
var form            = document.adminForm;
var type            = document.getElementById("type");
var videoExtensions = ['flv', 'mp4' , '3g2', '3gp', 'aac', 'f4b', 'f4p', 'f4v', 'm4a', 'm4v', 'mov', 'sdp', 'vp6', 'smil'];
var imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
var isAllowed       = true;
changeType('url');

if(<?php echo substr(JVERSION,0,3); ?> != '1.5') {
	Joomla.submitbutton = submitbutton;
}
	
function submitbutton(pressbutton){
	if(pressbutton == 'save' || pressbutton == 'apply') {
		if(valForm() == false) return;
	
	
		var method = type.options[type.selectedIndex].value;
		
		if(method == 'cdn_upload') {
		
			// Create a new FormData object.
			var formData = new FormData(document.forms.namedItem("adminForm"));
			// Set up the request.
			var xhr = new XMLHttpRequest();
			// Open the connection.
			xhr.open('POST', document.getElementsByName('cdn_url')[0].value, true);
			// Set header so the called script knows that it's an XMLHttpRequest
			xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
			// Set up a handler for when the request finishes.
			xhr.onload = function () {
			  if (xhr.status === 200) {
				// File(s) uploaded.
				var response = JSON.parse(xhr.responseText);
				
				if (response.hasOwnProperty('success') && response.hasOwnProperty('video') && response.hasOwnProperty('thumb') && response.hasOwnProperty('preview') && response.success == 1)
				{
					document.getElementsByName('video')[0].value = response.video;
					document.getElementsByName('thumb')[0].value = response.thumb;
					document.getElementsByName('preview')[0].value = response.preview;
					document.getElementsByName('type')[0].value = 'lighttpd';
					document.getElementsByName('cdn_video')[0].value = '';
					document.getElementsByName('cdn_thumb')[0].value = '';
					document.getElementsByName('cdn_preview')[0].value = '';
					
					submitform( pressbutton );	
					return;
				}
				else
				{
					document.getElementById('dim').style.display = "none";
					alert('<?php echo JText::_( 'CDN_UPLOAD_FAILED', true); ?>');
					return;
				}
				
			  } else {
				document.getElementById('dim').style.display = "none";
				alert('<?php echo JText::_( 'CDN_UPLOAD_FAILED', true); ?>');
				return;
			  }
			};
			
			document.getElementById('dim').style.display = "block";
			// Send the Data.
			xhr.send(formData);
			 
		}
		else
		{
			submitform( pressbutton );	
			return;
		}
	}
	else
	{
		submitform( pressbutton );	
		return;
	}
	
	
}


function valForm() {
	var method = type.options[type.selectedIndex].value;
	
	if(form.title.value == '') {
       	alert( "<?php echo JText::_( 'TITLE_FIELD_SHOULD_NOT_BE_EMPTY', true); ?>" );
       	return false;
	}
	
	if(method == 'cdn_upload') {
		if(form.cdn_url.value == '') {
			alert( "<?php echo JText::_( 'CDN_URL_FIELD_SHOULD_NOT_BE_EMPTY', true); ?>" );
			return false;
		}
		if(form.cdn_username.value == '') {
			alert( "<?php echo JText::_( 'CDN_USERNAME_FIELD_SHOULD_NOT_BE_EMPTY', true); ?>" );
			return false;
		}
		if(form.cdn_password.value == '') {
			alert( "<?php echo JText::_( 'CDN_PASSWORD_FIELD_SHOULD_NOT_BE_EMPTY', true); ?>" );
			return false;
		}
		if(form.cdn_video.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_A_VIDEO', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('VIDEO', form.cdn_video.value, videoExtensions);
			if(isAllowed == false) 	return false;
		}
		if(form.cdn_thumb.value) {
       		isAllowed = checkExtension('THUMB', form.cdn_thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
		if(form.cdn_preview.value) {
			isAllowed = checkExtension('PREVIEW', form.cdn_preview.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	}
	else if(method == 'upload') {
		if(form.upload_video.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_A_VIDEO', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('VIDEO', form.upload_video.value, videoExtensions);
			if(isAllowed == false) 	return false;
		}
		
		if(form.upload_hd.value) {
			isAllowed = checkExtension('HD VIDEO', form.upload_hd.value, videoExtensions);
			if(isAllowed == false) 	return false;
		}		
		
		if(form.upload_thumb.value) {
       		isAllowed = checkExtension('THUMB', form.upload_thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
		
		if(form.upload_preview.value) {
			isAllowed = checkExtension('PREVIEW', form.upload_preview.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	} else if(method == 'url') {
		if(form.video.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_A_VIDEO', true); ?>" );
       		return false;
	    } else {
			isAllowed = checkExtension('VIDEO', form.video.value, videoExtensions);
			if(isAllowed == false) 	return false;
		}
		
		if(form.hd.value) {
			isAllowed = checkExtension('HD VIDEO', form.hd.value, videoExtensions);
			if(isAllowed == false) 	return false;
		}		
		
		if(form.preview.value) {
			isAllowed = checkExtension('PREVIEW', form.preview.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	} else if(method == 'rtmp') {
		if(form.streamer.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_THE_STREAMER_PATH', true); ?>" );
       		return false;
	    }
	} else if(method == 'thirdparty') {
		if(form.thirdparty.value == '') {
       		alert( "<?php echo JText::_( 'YOU_MUST_ADD_ANY_THIRD_PARTY_EMBEDCODE', true); ?>" );
       		return false;
	    }
	}	
	
	if(method != 'upload' && method != 'youtube') {
		if(form.thumb.value) {
       		isAllowed = checkExtension('THUMB', form.thumb.value, imageExtensions);
			if(isAllowed == false) 	return false;
		}
	}
		
	if(form.category.value == '') {
		alert( "<?php echo JText::_( 'YOU_HAVE_NOT_SELECTED_ANY_CATEGORY_FOR_THE_VIDEO', true); ?>" );
       	return false;
	}
}

function checkExtension(type, filePath, validExtensions) {
	var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();

    for(var i = 0; i < validExtensions.length; i++) {
        if(ext == validExtensions[i]) return true;
    }

    alert(type + ' :   The file extension ' + ext.toUpperCase() + ' is not allowed!');
    return false;	
}

function changeType(typ) {

	
	document.getElementById('data_cdn_url').style.display               = "none";
	document.getElementById('data_cdn_username').style.display           = "none";
	document.getElementById('data_cdn_password').style.display           = "none";
	document.getElementById('upload_cdn_video').style.display           = "none";
	document.getElementById('upload_cdn_thumb').style.display           = "none";
	document.getElementById('upload_cdn_preview').style.display         = "none";
	
	document.getElementById('url_data_video').style.display              = "none";
	document.getElementById('url_data_hd').style.display                 = "none";
	document.getElementById('url_data_thumb').style.display              = "none";
	document.getElementById('url_data_preview').style.display            = "none";
	document.getElementById('upload_data_video').style.display           = "none";
	document.getElementById('upload_data_hd').style.display              = "none";
	document.getElementById('upload_data_thumb').style.display           = "none";
	document.getElementById('upload_data_preview').style.display         = "none";
	document.getElementById('data_streamer').style.display               = "none";
	document.getElementById('data_token').style.display                  = "none";
	document.getElementById('data_dvr').style.display                    = "none";
	document.getElementById('data_thirdparty').style.display             = "none";
	document.getElementById('avs_help').style.display                    = "none";
    switch(typ) {
		case 'url' :
			document.getElementById('url_data_video').style.display      = "";
			document.getElementById('url_data_hd').style.display         = "";
			document.getElementById('url_data_thumb').style.display      = "";
			document.getElementById('url_data_preview').style.display    = "";
			break;
			
		case 'cdn_upload':
			
			document.getElementById('data_cdn_url').style.display       = "";
			document.getElementById('data_cdn_username').style.display   = "";
			document.getElementById('data_cdn_password').style.display   = "";
			document.getElementById('upload_cdn_video').style.display   = "";
			document.getElementById('upload_cdn_thumb').style.display   = "";
			document.getElementById('upload_cdn_preview').style.display = "";
			break;
			
		case 'upload':
			document.getElementById('upload_data_video').style.display   = "";
			document.getElementById('upload_data_hd').style.display      = "";
			document.getElementById('upload_data_thumb').style.display   = "";
			document.getElementById('upload_data_preview').style.display = "";
			document.getElementById('avs_help').style.display            = "";
			break;
		case 'youtube'  :
		case 'highwinds':
		case 'lighttpd' :
			document.getElementById('url_data_video').style.display      = "";
			document.getElementById('url_data_thumb').style.display      = "";
			document.getElementById('url_data_preview').style.display    = "";
			break;
		case 'rtmp':
			document.getElementById('url_data_video').style.display      = "";
			document.getElementById('url_data_thumb').style.display      = "";
			document.getElementById('url_data_preview').style.display    = "";
			document.getElementById('data_streamer').style.display       = "";
			document.getElementById('data_token').style.display          = "";
			break;
		case 'bitgravity':
			document.getElementById('url_data_video').style.display      = "";
			document.getElementById('url_data_thumb').style.display      = "";
			document.getElementById('url_data_preview').style.display    = "";
			document.getElementById('data_dvr').style.display            = "";
			break;
		case 'thirdparty':
			document.getElementById('url_data_thumb').style.display      = "";
			document.getElementById('data_thirdparty').style.display     = "";
			break;
	}	
}


</script>