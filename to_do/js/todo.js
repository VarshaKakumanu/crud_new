req = new XMLHttpRequest();
req.open("GET", "https://jsonplaceholder.typicode.com/posts", true);
req.send();

req.onreadystatechange = function(){
  if(req.readyState == 4 && req.status == 200){
      
    //
    var output = req.responseText;
    var a = JSON.parse(output);
    var html ='';

    for(var i=0;i<a.length;i++){
     
       html+='<div class="card mx-n2" style="width: 18rem;">';
       html+='<div class="card-body">';
       html+='<h5 class="card-title">'+a[i].title+'</h5>';
       html+='<h6 class="card-subtitle mb-2 text-muted">'+a[i].id+'</h6>';
       html+='<p class="card-text">'+a[i].body+'</p>';
       html+='</div>';
       html+='</div>';
    }
    document.getElementById("dis").innerHTML = html;
  }
}

