document.addEventListener("DOMContentLoaded",()=>{var e,t,n;document.querySelector(".post-template")&&(t=(e=document.querySelector("#post-content p")).innerHTML.substring(0,1),n=e.innerHTML.substring(1),e.innerHTML='<span class="sr-only">'+t+"</span>"+n,document.querySelector("#post-content-dropcap").innerHTML=t)}),document.addEventListener("DOMContentLoaded",()=>{document.querySelector("#post-content")&&(document.querySelector("#post-content").style.minHeight=document.querySelector("#metadata").offsetHeight+"px")}),document.addEventListener("DOMContentLoaded",()=>{fetch("https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=Watchmaker&api_key=eae3e31423356ac400ac5c429a5b855e&format=json&limit=1").then(e=>e.json()).then(e=>{var e=(track_info=e.recenttracks.track[0]).artist["#text"],t=track_info.name,n=document.createElement("img"),o=(n.src=track_info.image[3]["#text"],n.alt=t+" by "+e,document.createElement("div")),r=document.createElement("em"),t=(r.innerHTML=t,document.createElement("span")),e=(t.innerHTML=e,o.appendChild(r),o.appendChild(t),document.createDocumentFragment());e.appendChild(n),e.appendChild(o),document.querySelector("footer #listening").appendChild(e)})});
//# sourceMappingURL=scripts.js.map