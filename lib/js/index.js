window.onload = function() {
    document.getElementById("uploadform").onsubmit = function() {
        return plausi(document.getElementsByTagName("input"))        
    };
};