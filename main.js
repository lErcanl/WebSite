@@ -1,50 +0,0 @@

$(document).ready(function(){

    var name=$("#usernamee").val();
        if (name) {
          var kayityazi=document.querySelector(".login-konum");
          kayityazi.style.visibility="hidden";


        }
        else{
           kayityazi=document.querySelector(".login-konum");
          kayityazi.style.visibility="visible";
        }
});




function giriss(){
    let giris=  document.querySelector(".giris");
    giris.style.visibility="visible";

}
function kapat(){
  let kapat=document.querySelector(".giris");
  let kapat2=document.querySelector(".kay�t");
        kapat.style.visibility="hidden";
      kapat2.style.visibility="hidden";

}
function kay�tt(){
  let kayit=document.querySelector(".kay�t");
      kayit.style.visibility="visible";


}
function changeunderline(){

    let underline=document.querySelector(".hoverr");

    underline.style.textDecoration="underline";


}
function deleteunderline(){
  let deleteunderline=document.querySelector(".hoverr");
  deleteunderline.style.textDecoration="none";

}