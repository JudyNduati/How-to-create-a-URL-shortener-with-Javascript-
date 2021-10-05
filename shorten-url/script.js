const form = document.querySelector(".wrapper form"),
originalURL = form.querySelector("input"),
shortenBtn = form.querySelector("form button"),
blurEffect = document.querySelector(".blur-effect"),
popupBox = document.querySelector(".popup-box"),
infoBox = popupBox.querySelector(".info-box"),
form2 = popupBox.querySelector("form"),
shortenURL = popupBox.querySelector("form .short-url"),
copyIcon = popupBox.querySelector("form .copy-icon"),
saveBtn = popupBox.querySelector("button");

form.onsubmit = (e)=>{
    e.preventDefault();
}

shortenBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/url-controller.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            if(data.length <= 5){
                blurEffect.style.display = "block";
                popupBox.classList.add("show");

                //paste your url here. Like this: codingnepalweb.com/
                let domain = "localhost/url/"; 
                shortenURL.value = domain + data;
                copyIcon.onclick = ()=>{
                    shortenURL.select();
                    document.execCommand("copy");
                }

                saveBtn.onclick = ()=>{
                    form2.onsubmit = (e)=>{
                        e.preventDefault();
                    }

                    let xhr2 = new XMLHttpRequest();
                    xhr2.open("POST", "php/save-url.php", true);
                    xhr2.onload = ()=>{
                        if(xhr2.readyState == 4 && xhr2.status == 200){
                            let data = xhr2.response;
                            if(data == "success"){
                                location.reload();
                            }else{
                                infoBox.classList.add("error");
                                infoBox.innerText = data;
                            }
                        }
                    }
                    let shorten_url1 = shortenURL.value;
                    let hidden_url = data;
                    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr2.send("short_url="+shorten_url1+"&hidden_url="+hidden_url);
                }
            }else{
                alert(data);
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}