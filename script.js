let btn=document.querySelector('#btn');
let sidebar=document.querySelector('.sidebar');
// let searchbtn=document.querySelector('.bx-search');
let listItem = document.querySelectorAll('.list-Item');


btn.onclick=function(){
    sidebar.classList.toggle('active');
 
}

// searchbtn.onclick=function(){
//     sidebar.classList.toggle('active');
 
// }

function activelink(){
    listItem.forEach(item => 
        item.classList.remove('active'));
        this.classList.add('active');
}

listItem.forEach(item => 
    item.onclick = activelink);
