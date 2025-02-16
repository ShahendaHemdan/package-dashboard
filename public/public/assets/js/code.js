// ****************calender********************
$(document).ready(function () {
  $("#con-calender").simpleCalendar({
    fixedStartDay: 0, // begin weeks by sunday
    disableEmptyDetails: true,
    events: [
      {
        startDate: new Date("01 August 2020 12:48 GMT").toISOString(),
        endDate: new Date("15 August 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
      {
        startDate: new Date("01 September 2020 12:48 GMT").toISOString(),
        endDate: new Date("01 September 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
      {
        startDate: new Date("01 September 2020 12:48 GMT").toISOString(),
        endDate: new Date("01 September 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
      {
        startDate: new Date("01 September 2020 12:48 GMT").toISOString(),
        endDate: new Date("01 September 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
      {
        startDate: new Date("01 September 2020 12:48 GMT").toISOString(),
        endDate: new Date("01 September 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
      {
        startDate: new Date("01 September 2020 12:48 GMT").toISOString(),
        endDate: new Date("01 September 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
      {
        startDate: new Date("01 September 2020 12:48 GMT").toISOString(),
        endDate: new Date("01 September 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
      {
        startDate: new Date("01 September 2020 12:48 GMT").toISOString(),
        endDate: new Date("01 September 2020 14:48 GMT").getTime(),
        summary: "bla bla",
      },
    ],
  });
});

// start slick cursol
$(".responsive").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  autoPlay: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function () {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
//trigger mixitUp
var mixer = mixitup(".contain");
var mixer = mixitup(containEl);
var mixer = mixitup(containEl, {
  selectors: {
    target: ".mix",
  },
  animation: {
    duration: 300,
  },
});
//
function readURLL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#blah").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
//
// upload fils
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(".up-load").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
