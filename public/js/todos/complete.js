
//チェックボックスにチェックを入れる処理
document.querySelectorAll('.check input[type="checkbox"]').forEach((data)=>{
    data.checked=true;
});



//リストを復元する処理
document.getElementById('lists').addEventListener('click',async(e)=>{
    if(e.target.tagName === 'INPUT'){
        

        const li = e.target.closest('li');
    
            
        const id = li.querySelector('input[type="checkbox"]').className;
        li.remove();
        
        fetch('/task/restore',{
            method:'post',
            headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body:JSON.stringify({id:id}),
                });
}});        
        
        










