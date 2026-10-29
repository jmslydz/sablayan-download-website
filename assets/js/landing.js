const menuButton=document.querySelector('.menu-button');
const menu=document.querySelector('.nav-links');
function closeMenu(){menu.classList.remove('open');menuButton.setAttribute('aria-expanded','false');menuButton.setAttribute('aria-label','Open navigation')}
menuButton.addEventListener('click',()=>{const isOpen=menu.classList.toggle('open');menuButton.setAttribute('aria-expanded',String(isOpen));menuButton.setAttribute('aria-label',isOpen?'Close navigation':'Open navigation')});
menu.querySelectorAll('a').forEach(link=>link.addEventListener('click',closeMenu));
document.addEventListener('click',event=>{if(!menu.contains(event.target)&&!menuButton.contains(event.target))closeMenu()});
document.addEventListener('keydown',event=>{if(event.key==='Escape'&&menu.classList.contains('open')){closeMenu();menuButton.focus()}});
window.matchMedia('(max-width:800px)').addEventListener('change',closeMenu);
