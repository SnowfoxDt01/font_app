
// script.js - minimal interactions
document.addEventListener('click', function(e){
  if(e.target.matches('.nav-item')) {
    document.querySelectorAll('.nav-item').forEach(x=>x.classList.remove('active'));
    e.target.classList.add('active');
  }
});
