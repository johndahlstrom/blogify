// This method will adjust CSS on the fly
var responsiveDesign = function() {
  'use strict';
  var width = $(window).width();
  if (width < 600) {
    $('#content').css({'margin': '0'});
    $('#sidebar').css({'width': '100%', 'float': 'left', 'box-shadow': '0px 0px 10px #ccc', 'padding': '10px 0 0 0', 'background': '#FFF', 'border-top': '1px solid #ccc', 'border-bottom': '1px solid #ccc'});
    $('.entry*').css({'border-left': '0 !important', 'border-right': '0 !important'});
    $('#meta-wrapper').css({'border': '0', 'border-top': '1px solid #ccc', 'width': '100%', 'border-bottom': '1px solid #ccc'});
    $('.entry-meta-next-previous').css({'border': '0', 'border-top': '1px solid #ccc', 'width': '100%', 'border-bottom': '1px solid #ccc'});
    $('#post').css({'width': '100%'});
    console.log('yea');
  }
  else {
    $('#content').css({'margin': '2em 0 0 0'});
    $('#sidebar').css({'width': '25%', 'float': 'right', 'box-shadow': '0px 0px 0px #FFF', 'background': '0', 'border': '0', 'padding': '0'});
    $('.entry*').css({'border-left': '1px solid #ccc !important', 'border-right': '1px solid #ccc !important'});
    $('#meta-wrapper').css({'width': '75%', 'border-left': '1px solid #ccc', 'border-right': '1px solid #ccc'});
    $('.entry-meta-next-previous').css({'width': '100%', 'border-left': '1px solid #ccc', 'border-right': '1px solid #ccc'});
    $('#post').css({'width': '75%'});
  }
}

// Run on load
$(document).ready(responsiveDesign);

// Bind to resize event
$(window).resize(responsiveDesign);

