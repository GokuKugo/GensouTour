// localStorage.setItem("maintext","Saddle up for an unforgettable musical expedition with Gensou Tour, the premier music extravaganza galloping across Japan! This tour brings together a stellar cast of Japan's most beloved singers and bands, ready to unleash a corral full of chart-topping hits and electrify audiences with their live performances. Gensou Tour promises a boot-stompin' good time, filled with the infectious energy and heartfelt storytelling that music is famous for. Whether you're a die-hard fan or just looking to experience a taste of Japanese music magic, Gensou Tour guarantees an evening of pure, unadulterated fun. So polish your Stetsons, dust off your dancing boots, and get ready to mosey on down to Gensou Tour – where Japanese hospitality meets the heart and soul of music!");
if(!localStorage.visited){
    localStorage.setItem("maintext","Saddle up for an unforgettable musical expedition with Gensou Tour, the premier music extravaganza galloping across Japan! This tour brings together a stellar cast of Japan's most beloved singers and bands, ready to unleash a corral full of chart-topping hits and electrify audiences with their live performances. Gensou Tour promises a boot-stompin' good time, filled with the infectious energy and heartfelt storytelling that music is famous for. Whether you're a die-hard fan or just looking to experience a taste of Japanese music magic, Gensou Tour guarantees an evening of pure, unadulterated fun. So polish your Stetsons, dust off your dancing boots, and get ready to mosey on down to Gensou Tour – where Japanese hospitality meets the heart and soul of music!");
    localStorage.visited = true;
}
localStorage.getItem("maintext","Saddle up for an unforgettable musical expedition with Gensou Tour, the premier music extravaganza galloping across Japan! This tour brings together a stellar cast of Japan's most beloved singers and bands, ready to unleash a corral full of chart-topping hits and electrify audiences with their live performances. Gensou Tour promises a boot-stompin' good time, filled with the infectious energy and heartfelt storytelling that music is famous for. Whether you're a die-hard fan or just looking to experience a taste of Japanese music magic, Gensou Tour guarantees an evening of pure, unadulterated fun. So polish your Stetsons, dust off your dancing boots, and get ready to mosey on down to Gensou Tour – where Japanese hospitality meets the heart and soul of music!");
document.getElementById('mainp').innerHTML=localStorage.getItem("maintext");
var clickCounter=0;
function maintext()
{
    clickCounter++;
    if (clickCounter%2==0) {
        document.getElementById('adminf').style.display="none";
        document.getElementById('editbtn').innerText="Edit";
    }
    else{
        document.getElementById('adminf').style.display="initial";
        document.getElementById('editbtn').innerText="Close";
        document.getElementById("inp").value=document.getElementById("mainp").innerHTML;
    }
}
function changetext(){

    localStorage.setItem("maintext",document.getElementById('inp').value);
    document.getElementById("mainp").innerHTML= document.getElementById('inp').value;

}
