
// slicknav-script

  $(function(){
    $('#menu').slicknav();
  });

// slicknav-script

// WOW-script

new WOW().init();

// WOW-script

// owl-carousel script


$('.Saying_slider').slick({
  dots: false,
  arrows:true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.Blog_slider').slick({
  dots: false,
  arrows:true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$(document).ready(function() {

  $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;
    
    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  })

  openAllPanels = function(aId) {
    console.log("setAllPanelOpen");
    $(aId + ' .panel-collapse:not(".in")').collapse('show');
  }
  closeAllPanels = function(aId) {
    console.log("setAllPanelclose");
    $(aId + ' .panel-collapse.in').collapse('hide');
  }
     
});
//plugin bootstrap minus and plus


$('.brandsSlider').slick({
  dots: false,
  arrows:false,
  infinite: true,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.say_slider').slick({
  dots: false,
  infinite: false,
  arrows:true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


// quantity start
var QtyInput = (function () {
var $qtyInputs = $(".qty-input");
if (!$qtyInputs.length) {
return;
}
var $inputs = $qtyInputs.find(".product-qty");
var $countBtn = $qtyInputs.find(".qty-count");
var qtyMin = parseInt($inputs.attr("min"));
var qtyMax = parseInt($inputs.attr("max"));
$inputs.change(function () {
var $this = $(this);
var $minusBtn = $this.siblings(".qty-count--minus");
var $addBtn = $this.siblings(".qty-count--add");
var qty = parseInt($this.val());
  if (isNaN(qty) || qty <= qtyMin) {
  $this.val(qtyMin);
  $minusBtn.attr("disabled", true);
  } else {
  $minusBtn.attr("disabled", false);

  if(qty >= qtyMax){
  $this.val(qtyMax);
  $addBtn.attr('disabled', true);
  } else {
  $this.val(qty);
  $addBtn.attr('disabled', false);
  }
}
});

$countBtn.click(function () {
var operator = this.dataset.action;
var $this = $(this);
var $input = $this.siblings(".product-qty");
var qty = parseInt($input.val());

if (operator == "add") {
qty += 1;
if (qty >= qtyMin + 1) {
$this.siblings(".qty-count--minus").attr("disabled", false);
}

if (qty >= qtyMax) {
$this.attr("disabled", true);
}
} else {
qty = qty <= qtyMin ? qtyMin : (qty -= 1);

if (qty == qtyMin) {
$this.attr("disabled", true);
}

if (qty < qtyMax) {
$this.siblings(".qty-count--add").attr("disabled", false);
}
}

$input.val(qty);
});
})();
// quantity end

$('.owl-carousel').owlCarousel({
  loop:true,
  margin:0,
  nav:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:1
      }
  }
})


$(function() {
    
    $('.c-form-e').submit(function(e) {
        e.preventDefault();
        var action = $(this).attr('action');
        $.ajax({
            method: "POST",
            url: action,
            data: new FormData(this),
            cache: false,
            processData: false,
            contentType: false,
            error: function() {
                alert('Something went wrong!');
            },
            success: (data) => {
                if(data.status == 'success') {
                    alert(data.message)
                    this.reset();
                }
            },
        });
    });
});