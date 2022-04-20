$(window).scroll(function () {
  var scrollPos = $(document).scrollTop();
  if (scrollPos > 150) {
    $("header").addClass("sticky-fixed");
  } else if (scrollPos < 140) {
    $("header").removeClass("sticky-fixed");
  }
});

(function () {
  //Show Modal
  $("#reservationModal").on("show.bs.modal", function (e) {
    console.log("show");
    $(".banner").addClass("modal-blur");
    $("section").addClass("modal-blur");
    $("header").addClass("modal-blur");
  });

  //Remove modal
  $("#reservationModal").on("hide.bs.modal", function (e) {
    console.log("hide");
    $(".banner").removeClass("modal-blur");
    $("section").removeClass("modal-blur");
    $("header").removeClass("modal-blur");
  });
})();


