const todoAdd = document.getElementById('todo-add');
const todoMain = document.getElementById('todo-main');
const newTask = document.getElementById('new-task');

const todoLists = [];

console.log('読み込みました。');
todoAdd.addEventListener('click',()=>{
    console.log('クリック');
    newTask.style.display="none";
});
