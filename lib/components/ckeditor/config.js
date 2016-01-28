/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/


// PACKAGER_RENAME( CKEDITOR.config )
CKEDITOR.editorConfig = function( config )
{
    config.toolbar = 'MyToolBar';
    //config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html?type=Images';
    //config.filebrowserImageBrowseUrl = '/hbpanel/public/images?type=Image&path=Userfiles/Image&editor=FCK';
    //config.filebrowserBrowseUrl = '/browser/browse.php?type=Images';
    //config.filebrowserUploadUrl = '/uploader/upload.php';
    //iPhoneWS/IClubBar/hbpanel/lib/components/ckeditor
      // config.filebrowserBrowseUrl : '/iPhoneWS/IClubBar/hbpanel/lib/components/ckfinder/ckfinder.php';
     // config.filebrowserBrowseUrl = '/iPhoneWS/IClubBar/hbpanel/lib/components/ckeditor/ckfinder/ckfinder.php?type=Images';
   // config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
      
         config.filebrowserImageUploadUrl = 'http://70.84.58.40/iPhone/schadehulp/lib/components/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
                             
        // alert( config.filebrowserBrowseUrl); return false;
    
    config.toolbar_MyToolBar =
    [
        ['Source'],
        ['Cut','Copy','Paste','PasteText','','-','Scayt'],
        ['Find','Replace','-','SelectAll','RemoveFormat'],
	    ['Format','Font','FontSize'],
        ['Bold','Italic','Strike'],
        ['','','']
    ];
    //config.stylesCombo_stylesSet = 'my_styles:http://192.168.32.150/B2B/css/style.js';
   //config.contentsCss = 'http://192.168.32.150/B2B/css/style.css';
};
/*
CKEDITOR.replace( 'editor1',
    {
        filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });

  */