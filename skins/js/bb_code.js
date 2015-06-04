function tag(text1, text2) 
{

    if ((document.selection)) 
    { 
        document.getElementById('mess').focus(); 

        document.post.document.selection.createRange().text = 
        text1+document.post.document.selection.createRange().text + text2; 

    } else if(document.getElementById('mess').selectionStart != undefined) { 
        var element = document.getElementById('mess'); 
        var str = element.value; 
        var start = element.selectionStart; 
        var length = element.selectionEnd - element.selectionStart; 
        element.value = str.substr(0, start) + text1 + str.substr(start, length) 
        + text2 + str.substr(start + length); 

    } else document.getElementById('mess').value += text1 + text2; 
}
  