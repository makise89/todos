


//追加するスペースを出現

const todoAdd = document.getElementById('todo-add');
const check = document.querySelector('.add');

todoAdd.addEventListener('click',()=>{
    if(check.textContent === "追加"){
    document.getElementById('new-task').style.display="block";
    check.textContent="閉じる";
}else if(check.textContent==="閉じる"){
    document.getElementById('new-task').style.display="none";
    check.textContent="追加";
}
});


//新しいタスクを追加する処理

const submit = document.getElementById('submit');

submit.addEventListener('click', async ()=>{
    const title = document.getElementById('task-title').value;

//fetchの処理

try{
    const response = await fetch('/task/add',{
        method:'post',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body:JSON.stringify({title:title})
    });
    const data = await response.json();
    const ul = document.getElementById('lists');
    const li = document.createElement('li');
    li.className=data.id;
    const count = document.querySelector('.lists').children.length+1;
    li.innerHTML=`<p class="no">${count}</p>
    <p class="taskName">${data.title}</p>
    <p class="createdData">${data.createdAt}</p>
    <p class="priority">☆</p>
    <p class="check"><input type="checkbox" id="check" class="${data.id}"></p>`;
    ul.appendChild(li);

    //リセット処理
    document.getElementById('task-title').value = '';
    document.getElementById('new-task').style.display="none";
    document.querySelector('.add').textContent="追加";

    //エラー処理
}catch(error){
    console.log(error);
}   
});


//タスク完了処理

document.getElementById('lists').addEventListener('click',async (e)=>{
    if(e.target.tagName === 'INPUT'){
        //btnを無効化

        document.querySelectorAll('li input[type="checkbox"]').forEach(cd => cd.disabled = true);

        const id = e.target.className;
        const li = e.target.closest('li');
        
        li.remove();
    
        await fetch('/task/remove',{
        method:'post',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body:JSON.stringify({id:id}),
        });

        //btnを有効化
        document.querySelectorAll('li input[type="checkbox"]').forEach(cd => cd.disabled = false);
    }
});




//優先順位有効の処理
document.querySelectorAll('.priority').forEach((data)=>{
    data.addEventListener('click',async(e)=>{
        if(e.target.textContent==='☆'){
        e.target.textContent="★";
        const id = e.target.closest('li').className;
        const lists = document.getElementById('lists');
        lists.insertBefore(e.target.closest('li'),lists.firstChild);
        const res = await fetch('/priorityOn',{
            method:'post',
            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body:JSON.stringify({id:id})
        });
        }else{
            e.target.textContent="☆";
            const lists = document.getElementById('lists');
            lists.insertBefore(e.target.closest('li'),lists.lastChild);
            const id = e.target.closest('li').className;
            const res = await fetch('/priorityOn',{
                method:'post',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body:JSON.stringify({id:id})
            });
        }
        
    });
})



//サイドメニューを出現する処理
document.querySelector('.menu').addEventListener('click',()=>{
    document.querySelector('.menu').classList.toggle('active');
    document.querySelector('nav').classList.toggle('active');
});