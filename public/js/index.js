var currTheme = localStorage.getItem('theme')
var root = document.querySelector('html')


if(currTheme === '' || !currTheme || currTheme === null){
    localStorage.setItem('theme', 'ligth')
    currTheme = localStorage.getItem('theme')
    root.setAttribute('data-theme', currTheme)
}
else{
    root.setAttribute('data-theme', currTheme)
}

var btnLigth = document.querySelector('#switchLigth');
var btnDark = document.querySelector('#switchDark');

btnLigth.addEventListener('click', function(){
    localStorage.setItem('theme', 'ligth');
    root.setAttribute('data-theme', 'ligth');
});
btnDark.addEventListener('click', function(){
    localStorage.setItem('theme', 'dark');
    root.setAttribute('data-theme', 'dark');
});


