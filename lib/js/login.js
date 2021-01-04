window.onload = function() {
    document.getElementById("loginform").onsubmit = function() {
        return plausi(document.getElementsByTagName("input"))        
    };
};