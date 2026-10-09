const menuButton=document.querySelector('.menu-button');
const menu=document.querySelector('.nav-links');
const downloadDialog=document.querySelector('#download-dialog');
function closeMenu(){menu.classList.remove('open');menuButton.setAttribute('aria-expanded','false');menuButton.setAttribute('aria-label','Open navigation')}
menuButton.addEventListener('click',()=>{const isOpen=menu.classList.toggle('open');menuButton.setAttribute('aria-expanded',String(isOpen));menuButton.setAttribute('aria-label',isOpen?'Close navigation':'Open navigation')});
menu.querySelectorAll('a').forEach(link=>link.addEventListener('click',closeMenu));
document.querySelectorAll('[data-download]').forEach(button=>button.addEventListener('click',event=>{closeMenu();if(document.body.dataset.downloadReady !== 'true'){event.preventDefault();downloadDialog.showModal()}}));
document.addEventListener('click',event=>{if(!menu.contains(event.target)&&!menuButton.contains(event.target))closeMenu()});
downloadDialog.addEventListener('click',event=>{if(event.target===downloadDialog){const rect=downloadDialog.getBoundingClientRect();if(event.clientX<rect.left||event.clientX>rect.right||event.clientY<rect.top||event.clientY>rect.bottom)downloadDialog.close()}});
document.addEventListener('keydown',event=>{if(event.key==='Escape'&&menu.classList.contains('open')){closeMenu();menuButton.focus()}});
window.matchMedia('(max-width:800px)').addEventListener('change',closeMenu);
if(document.body.dataset.openDownload === 'true' && document.body.dataset.downloadReady !== 'true'){downloadDialog.showModal()}
