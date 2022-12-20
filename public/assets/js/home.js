/*----- arrow button ------*/
document.addEventListener('scroll', () => {
    //alert("scroll");
    const arrow = document.getElementById('arrow-up')
  
    if(window.scrollY > 600) {
      arrow.classList.add('visible');
      arrow.classList.remove('invisible');
    } else {
      arrow.classList.remove('visible');
      arrow.classList.add('invisible');
    }
  });

/*------ modal button ------*/
$(".modal-button").click(function( ){
  let trickId = $(this).attr('data-trick');
  console.log(trickId);
  $("#trickId").val(trickId);

});

