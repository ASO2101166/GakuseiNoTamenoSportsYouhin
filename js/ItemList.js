$(function() {
    var Accordion = function(el, multiple) {
      this.el = el || {};
      this.multiple = multiple || false;
  
      // Variables privadas
      var links = this.el.find('.link');
      // Evento
      links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }
  
    Accordion.prototype.dropdown = function(e) {
      var $el = e.data.el;
        $this = $(this),
        $next = $this.next();
  
      $next.slideToggle();
      $this.parent().toggleClass('open');
  
      if (!e.data.multiple) {
        $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
      };
    } 
  
    var accordion = new Accordion($('#accordion'), false);
  });
let count = 9;
function mottomiru(genre_code){
  count += 9;
  const data = {
    genre_code: genre_code,
    count: count
  }
  fetch('php/ItemSelectAjax.php', {
      method: "POST",
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
  })
  .then((response) => {
      if(!response.ok) {
          throw new Error(`HTTP error: ${response.status}`);
      }   
      return response.json()
  })
  .then(res => {
      console.log(res); // やりたい処理
      document.querySelector('.list-container').innerHTML = res;
  })
  .catch(error => {
      console.log(error); // エラー表示
  });
  console.log(JSON.stringify(data));
}