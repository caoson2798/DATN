

// xu ly collapse
$("#collapseExample").on("show.bs.collapse", function (e) {
  // do something...
  // $('#icon-arrow').addClass('fa-chevron-right').removeClass('fa-chevron-down');
  if ($("#icon-arrow").hasClass("fa-chevron-right")) {
    $("#icon-arrow")
      .addClass("fa-chevron-down")
      .removeClass("fa-chevron-right");
  }
});

$("#collapseExample").on("hide.bs.collapse", function (e) {
  // do something...
  if ($("#icon-arrow").hasClass("fa-chevron-down")) {
    $("#icon-arrow")
      .addClass("fa-chevron-right")
      .removeClass("fa-chevron-down");
  }
});

$("#collapseExample1").on("show.bs.collapse", function (e) {
  // do something...
  // $('#icon-arrow').addClass('fa-chevron-right').removeClass('fa-chevron-down');
  if ($("#icon-arrow1").hasClass("fa-chevron-right")) {
    $("#icon-arrow1")
      .addClass("fa-chevron-down")
      .removeClass("fa-chevron-right");
  }
});

$("#collapseExample1").on("hide.bs.collapse", function (e) {
  // do something...
  if ($("#icon-arrow1").hasClass("fa-chevron-down")) {
    $("#icon-arrow1")
      .addClass("fa-chevron-right")
      .removeClass("fa-chevron-down");
  }
});
