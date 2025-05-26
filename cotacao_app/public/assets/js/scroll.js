/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/scroll.js ***!
  \********************************/
window.addEventListener('load', function () {
  ajustarAlturaLista();
});
window.addEventListener('resize', function () {
  ajustarAlturaLista();
});
function ajustarAlturaLista() {
  var list_container = document.querySelector('.list-container');
  if (list_container) {
    var body = document.querySelector('body');
    var main = document.querySelector('main');
    var header = document.querySelector('header');
    var footer = document.querySelector('footer');
    var nav = document.querySelector('nav');
    var list_header = document.querySelector('.list-header');
    var list_scroll = document.querySelector('.list-scroll');
    var list_alert = document.querySelector('.list-alert');
    var styles = window.getComputedStyle(list_container);
    var paddingTop = parseFloat(styles.paddingTop);
    var paddingBottom = parseFloat(styles.paddingBottom);
    var availableHeight = window.innerHeight - header.offsetHeight - nav.offsetHeight - list_header.offsetHeight - paddingTop - paddingBottom - footer.offsetHeight;
    if (list_alert) {
      availableHeight = availableHeight - list_alert.offsetHeight;
    }
    /*
                          - nav.getBoundingClientRect().offsetHeight
                          - footer.getBoundingClientRect().offsetHeight
                          - list_header.getBoundingClientRect().offsetHeight;
    */
    console.log("windows", window.innerHeight);
    //console.log("windows", window.offsetHeight)
    console.log("body", body.getBoundingClientRect().height);
    console.log("header", header.getBoundingClientRect().height);
    console.log("nav", nav.getBoundingClientRect().height);
    console.log("footer", footer.getBoundingClientRect().height);
    console.log("list_header: ", list_header.getBoundingClientRect().height);
    //console.log("list_alert: ", list_alert.getBoundingClientRect().height);

    console.log("body", body.offsetHeight);
    console.log("header", header.offsetHeight);
    console.log("nav", nav.offsetHeight);
    console.log("footer", footer.offsetHeight);
    console.log("list_header: ", list_header.offsetHeight);
    //console.log("list_alert: ", list_alert.offsetHeight);
    //console.log("list_header: ", list_header.padi);

    console.log("availableHeight", availableHeight);
    list_scroll.style.maxHeight = "".concat(availableHeight, "px");
    "\n";
  }
}
/******/ })()
;