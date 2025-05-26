
  window.addEventListener('load', () => {
    ajustarAlturaLista();
  })

  window.addEventListener('resize', () => {
    ajustarAlturaLista();
  })

  function ajustarAlturaLista() {
    const list_container = document.querySelector('.list-container');
    if (list_container) {
    const body = document.querySelector('body');
    const main = document.querySelector('main');
    const header = document.querySelector('header');
    const footer = document.querySelector('footer');
    const nav = document.querySelector('nav');
    const list_header = document.querySelector('.list-header');
    const list_scroll = document.querySelector('.list-scroll');
    const list_alert = document.querySelector('.list-alert');

    
    const styles = window.getComputedStyle(list_container);

    const paddingTop = parseFloat(styles.paddingTop);
    const paddingBottom = parseFloat(styles.paddingBottom);

    let availableHeight = window.innerHeight
                          - header.offsetHeight
                          - nav.offsetHeight
                          - list_header.offsetHeight
                          
                          - paddingTop
                          - paddingBottom
                          - footer.offsetHeight
                          ;
    if (list_alert) {
        availableHeight = availableHeight
                                - list_alert.offsetHeight
                                ;
    }
    /*
                          - nav.getBoundingClientRect().offsetHeight
                          - footer.getBoundingClientRect().offsetHeight
                          - list_header.getBoundingClientRect().offsetHeight;
*/
    console.log("windows", window.innerHeight)  
    //console.log("windows", window.offsetHeight)
    console.log("body", body.getBoundingClientRect().height)                     
    console.log("header", header.getBoundingClientRect().height)
    console.log("nav", nav.getBoundingClientRect().height)
    console.log("footer", footer.getBoundingClientRect().height)
    console.log("list_header: ", list_header.getBoundingClientRect().height);
    //console.log("list_alert: ", list_alert.getBoundingClientRect().height);


    console.log("body", body.offsetHeight)                     
    console.log("header", header.offsetHeight)
    console.log("nav", nav.offsetHeight)
    console.log("footer", footer.offsetHeight)
    console.log("list_header: ", list_header.offsetHeight);
    //console.log("list_alert: ", list_alert.offsetHeight);
    //console.log("list_header: ", list_header.padi);

    console.log("availableHeight", availableHeight);
    
    list_scroll.style.maxHeight = `${availableHeight}px`;
`
`  }
  }
