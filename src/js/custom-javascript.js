/*
  File Name: custom-javascript.js
  Author: Leonardo da Costa
  Description: Custom Javascript.
*/

//
// Custom JavaScript
// --------------------------------------------------

(function ($) {

  $(document).ready(function() {

    $('.brochure-view-cnt').click(function () {
      // Get brochure SKU
      let brochureSkuPrint = this.getAttribute("data-sku-print");
      let brochureSkuDigital = this.getAttribute("data-sku-digital");
    
      // Get brochure name
      let brochureName = this.getAttribute("data-name");
  
      // Gt redirect url
      let brochureRedirect = this.getAttribute("data-redirect");
  
      // // Fill SKU fields with brochure SKU
      $("#hidden_sku_print").val(brochureSkuPrint);
      $("#hidden_sku_digital").val(brochureSkuDigital);
    
      // Fill Details field with brochure name
      $("#input_2_35").val(brochureName);    
  
      // Open modal with reqeust form
      $('#exampleModalCenter').modal();
  
      // Fill redirect url
      $("#input_2_38").val(brochureRedirect);    
  
      // Update modal title
      $('#exampleModalLongTitle').html( brochureName );
    });
  
    $('#gform_2').submit(function ( e ) {
  
      // Get brochure SKUs
      const brochureSkuPrint = $('#hidden_sku_print').val()
      const brochureSkuDigital = $('#hidden_sku_digital').val()
  
      // If print brochure
      if ( $('#input_2_39').val() === 'Yes' ) {      
  
        $("#input_2_34").val(brochureSkuPrint);
  
      } else if ( $('#input_2_39').val() === 'No' ) {
        
        $("#input_2_34").val(brochureSkuDigital);
  
        location.href = $("#input_2_38").val();      
      }
  
    });

    // lightGallery Init
    const $lightGallery = $("#lightgallery");
    
    $lightGallery.lightGallery({
      hideBarsDelay : 0,
      touch: false
    });  

    // Open Drug Facts label when coming FAQ page
    if ( document.referrer === 'https://kaopectate2020.jmfdev.com/faqs/' ) $lightGallery[0].children[2].click();
    if ( document.referrer === 'https://kaopectate.com/faqs/' ) $lightGallery[0].children[2].click();

  });

})(jQuery);